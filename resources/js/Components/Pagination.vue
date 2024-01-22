<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    data: Object,
    is_json: Boolean,
});
const emit = defineEmits(["page"]);

function changePage(link) {
    let page = props.data.current_page;
    if (link.label === "Next &raquo;") {
        page = props.data.current_page + 1;
    } else if (link.label === "&laquo; Previous") {
        page = props.data.current_page - 1;
    } else {
        page = link.label;
    }

    emit("page", page);
}
</script>

<template>
    <div v-if="data?.links.length > 3" class="container mt-3">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-3">
                <template v-if="data?.from && data?.to && data?.total">
                    Showing {{ data.from }}-{{ data.to }} of {{ data.total }}
                </template>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-7 text-end mt-2">
                <nav aria-label="Table navigation">
                    <div v-if="data?.links.length > 3">
                        <div class="btn-group">
                            <template v-for="(link, key) in data?.links">
                                <button v-if="link.url === null" :key="'null-' + key" class="btn btn-outline-secondary"
                                    v-html="link.label"></button>
                                <button v-else v-if="is_json === true" :key="'json-' + key"
                                    class="btn btn-outline-secondary" :class="{ 'btn btn-primary': link.active }"
                                    @click.prevent="changePage(link)" v-html="link.label"></button>
                                <a v-else :key="'else-' + key" :href="link.url" class="btn btn-outline-secondary"
                                    :class="{ 'btn btn-primary': link.active }" v-html="link.label"></a>
                            </template>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>


