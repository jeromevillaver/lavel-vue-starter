<script setup>
import Icon from "@/Components/Icon.vue";
import { ref } from 'vue';
import { router } from "@inertiajs/vue3";

const isSubmenuOpen = ref(false);

const toggleSubmenu = () => {
    isSubmenuOpen.value = !isSubmenuOpen.value;
};

const activeItem = ref(null);

const setActive = (item) => {
    activeItem.value = item;
}

const isActive = (item) => {
    activeItem.value === item;
}

</script>
<template>
    <div>
        <nav class="side-nav">
            <ul>
                <li>
                    <a :href="route('dashboard')" :active="route().current('dashboard')"
                        :class="{ 'side-menu--active': isActive('settings') }" class="side-menu side-menu">
                        <div class="side-menu__icon">
                            <Icon name="home" />
                        </div>
                        <div class="side-menu__title"> Dashboard </div>
                    </a>

                </li>
                <li>
                    <a href="javascript:;" :class="{ 'side-menu--active': isActive('settings') }"
                        class="side-menu side-menu" @click="toggleSubmenu">
                        <div class="side-menu__icon">
                            <Icon name="gears" />
                        </div>
                        <div class="side-menu__title">
                            Settings
                            <div class="side-menu__sub-icon transform" :class="{ 'rotate-180': isSubmenuOpen }">
                                <Icon name="arrow-down" />
                            </div>
                        </div>
                    </a>
                    <ul class="side-menu__sub-open" v-show="isSubmenuOpen">
                        <li>
                            <a :href="route('sample.index')" :active="route().current('sample.index')"
                                :class="{ 'side-menu--active': isActive('settings') }" class="side-menu">
                                <div class="side-menu__icon">
                                    <Icon name="gear" />
                                </div>
                                <div class="side-menu__title"> Sample </div>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</template>
