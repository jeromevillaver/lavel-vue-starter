<script setup>
import { ref } from 'vue';
import Mobile from '../Pages/Partials/Mobile.vue';
import Topbar from '../Pages/Partials/Topbar.vue';
import Sidenav from '../Pages/Partials/Sidenav.vue';
import Switcher from '../Pages/Partials/Switcher.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <Mobile />
        <Topbar />
        <div class="flex overflow-hidden">
            <Sidenav />
            <div class="content">
                <main>
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
