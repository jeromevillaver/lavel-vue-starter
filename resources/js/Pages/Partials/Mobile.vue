<script setup>
import logo from '/resources/dist/images/logo.svg';
import Icon from "@/Components/Icon.vue";
import { ref, watch } from 'vue';
import { router } from "@inertiajs/vue3";

const isMenuOpen = ref(false);
const isSubmenuOpen = ref(false);
const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};


const toggleSubmenu = () => {
    isSubmenuOpen.value = !isSubmenuOpen.value;
    console.log('Submenu open value', isSubmenuOpen.value);
};

</script>

<!-- Mobile.vue -->
<template>
    <div>
        <div class="mobile-menu md:hidden ">
            <div class="mobile-menu-bar">
                <a :href="route('dashboard')" class="flex mr-auto pl-5">
                    <img alt="Midone - HTML Admin Template" class="w-8" :src="logo">
                </a>
                <a href="javascript:;" class="mobile-menu-toggler" @click="toggleMenu">
                    <Icon :name="isMenuOpen ? 'x-circle-white' : 'bars'" class="w-6 h-6 text-white transform -rotate-90" />
                    <p class="text-white">{{ isMenuOpen ? 'Close' : 'Menu' }}</p>
                </a>
            </div>

            <div v-if="isMenuOpen" class="pl-5">
                <div class="overflow-auto">
                    <!-- Your menu content goes here -->
                    <ul class="list-group py-2 text-white">
                        <!-- Dashboard Item -->
                        <li class="list-group-item-active">
                            <a :href="route('dashboard')" class="flex items-center hover:bg-cyan-800 cursor-pointer py-2">
                                <Icon name="home-white" class="mr-2" />
                                <span class="flex-grow ml-2">Dashboard</span>
                            </a>
                        </li>

                        <!-- Settings Item -->
                        <li class="mt-2 ">
                            <a href="javascript:;" @click="toggleSubmenu"
                                class="flex items-center hover:bg-cyan-800 cursor-pointer py-2">
                                <Icon name="gears-white" class="mr-2" />
                                <span class="flex-grow ml-2">Settings</span>
                                <!-- <div :class="{ 'rotate-180': isSubmenuOpen }" class="pr-5">
                                    <Icon name="arrow-down-white" />
                                </div> -->
                                <div :class="{ 'rotate-180': isSubmenuOpen }" class="mr-4">
                                    <Icon name="arrow-down-white" />
                                </div>

                            </a>
                            <div v-if="isSubmenuOpen" class="divide-y divide-gray-200">
                                <div class="py-4">
                                    <a :href="route('sample.index')"
                                        class="flex items-center hover:bg-cyan-800 cursor-pointer py-2">
                                        <Icon name="gear-white" class="mr-2" />
                                        <span class="flex-grow ml-2">Sample</span>
                                    </a>
                                </div>
                                <!-- Add more div elements as needed -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

