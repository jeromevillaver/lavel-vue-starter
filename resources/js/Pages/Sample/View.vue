<script setup>
import { router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    samples: Object,
});

const form = useForm({
    id: props.samples?.id,
    sample: props.samples?.sample,
});

const saveSample = () => {
    let _route = props.samples?.id ? route('sample.update', { id: props.samples.id }) : route('sample.store');

    form.post(_route, {
        preserveScroll: true,
    });
};

</script>

<template>
    <div>
        <AuthenticatedLayout title="Samples">
            <div class=" intro-y box  mx-auto max-w-screen-xl mt-10">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Sample Form
                    </h2>
                </div>
                <div class="intro-y box mt-5">
                    <div id="horizontal-form" class="p-5">
                        <div class="preview">
                            <div class="form-inline">
                                <label for="horizontal-form-1" class="form-label sm:w-20">Sample</label>
                                <input v-model="form.sample" type="text" class="form-control" placeholder="Sample">
                            </div>
                            <div class="sm:ml-20 sm:pl-5 mt-5">
                                <button type="submit" class="btn btn-primary" @click.prevent="saveSample"
                                    :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>

    </div>
</template>
