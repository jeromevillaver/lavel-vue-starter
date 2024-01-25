<script setup>
import { ref, watch, } from 'vue';
import { router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FlashBanner from '@/Components/Banner.vue';
import Pagination from '@/Components/Pagination.vue';
import moment from "moment";
import Icon from "@/Components/Icon.vue";
import SweetAlertDelete from '@/Components/SweetAlertDelete.vue';

const props = defineProps({
    samples: Object,
    flash: Object,
});

const flashMessages = ref(props.flash);

watch(() => props.flash, (newFlash) => {
    flashMessages.value = { ...flashMessages.value, ...newFlash };
});

const deleteRoute = 'sample.destroy';

</script>

<template>
    <AuthenticatedLayout title="Samples">
        <div class="grid grid-cols-12 gap-6 mt-5">

            <div class="intro-y col-span-12 lg:col-span-10">
                <FlashBanner :flashMessages="flashMessages" />
                <button type="button" class="btn btn-primary"
                    @click.prevent="router.get(route('sample.create'), {}, { preserveState: true })">
                    New Sample
                </button>
                <div class="intro-y box  mt-3">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                        <h2 class="font-medium text-base mr-auto">
                            Sample Table
                        </h2>
                    </div>
                    <div class="p-5" id="sample-table">
                        <div class="preview">
                            <div class="overflow-x-auto">
                                <table class="table table-auto">
                                    <thead>
                                        <tr>
                                            <th class="whitespace-nowrap uppercase">Title</th>
                                            <th class="whitespace-nowrap text-end uppercase">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="samples.data.length">
                                            <tr v-for="sample in samples.data" :key="sample.id">
                                                <td>
                                                    {{ sample.sample }}
                                                </td>
                                                <td class="text-end"
                                                    style="display: flex; gap: 8px; justify-content: flex-end;">
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        @click.prevent="router.get(route('sample.edit', { id: sample.id }), { preserveState: true })"
                                                        title="Edit">
                                                        <Icon name="pencil-white" />
                                                    </button>
                                                    <SweetAlertDelete :id="sample.id" :route="deleteRoute" />
                                                </td>
                                            </tr>
                                        </template>
                                        <template v-else>
                                            <tr class="text-gray-500 dark:text-gray-400">
                                                <td class="px-4 py-3 text-sm text-center italic" colspan="5">
                                                    No samples available.
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <Pagination :data="samples" />
            </div>
        </div>

    </AuthenticatedLayout>
</template>
