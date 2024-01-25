<!-- SweetAlertDelete.vue -->

<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import Icon from "@/Components/Icon.vue";

const props = defineProps(['id', 'route']);

console.log('Props', props);

const isDeleting = ref(false);

const handleDelete = async () => {
    try {
        isDeleting.value = true;
        await router.post(route(props.route, { id: props.id }));

        showSuccessAlert();
    } catch (error) {
        console.error('Error deleting item:', error.message);
        showErrorAlert();
    } finally {
        isDeleting.value = false;
    }
};

const showConfirmation = () => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        if (result.isConfirmed) {
            handleDelete();
        }
    });
};

const showSuccessAlert = () => {
    Swal.fire({
        title: 'Deleted!',
        text: 'Your file has been deleted.',
        icon: 'success',
    });
};

const showErrorAlert = () => {
    Swal.fire({
        title: 'Error!',
        text: 'An error occurred while deleting the file.',
        icon: 'error',
    });
};
</script>

<template>
    <div>
        <button type="button" class="btn btn-danger btn-sm ml-1" @click="showConfirmation" title="Delete">
            <Icon name="trash-white" />
            <span v-if="isDeleting"> Deleting...</span>
        </button>
    </div>
</template>
