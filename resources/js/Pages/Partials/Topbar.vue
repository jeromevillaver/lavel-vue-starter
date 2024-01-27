<script setup>
import { ref, onMounted } from 'vue';
import logo from '/resources/dist/images/logo.svg'
import userProfile from '/resources/dist/images/users/user.svg'
import Icon from "@/Components/Icon.vue";
import { router } from "@inertiajs/vue3";




const showLogoutOption = ref(true);


const logout = () => {
    showLogoutOption.value = false;

    router.post(route("logout"), { redirect: { name: 'login' } });
};


</script>

<template>
    <div>
        <div
            class="top-bar-boxed h-[70px] md:h-[65px] z-[51] border-b border-white/[0.08] mt-12 md:mt-0 -mx-3 sm:-mx-8 md:-mx-0 px-3 md:border-b-0 relative md:fixed md:inset-x-0 md:top-0 sm:px-8 md:px-10 md:pt-10 md:bg-gradient-to-b md:from-slate-100 md:to-transparent dark:md:from-darkmode-700">
            <div class="h-full flex items-center">
                <!-- BEGIN: Logo -->
                <a href="" class="logo -intro-x hidden md:flex xl:w-[180px] block">
                    <img alt="Midone - HTML Admin Template" class="logo__image w-6" :src="logo">
                    <span class="logo__text text-white text-lg ml-3"> Enigma </span>
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                    <div class="search hidden sm:block">
                        <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                        <Icon name="search" class="search__icon dark:text-slate-500 w-5 h-5" />
                    </div>
                    <a class="notification notification--light sm:hidden" href="">
                        <Icon name="search" class="search__icon dark:text-slate-500" />
                    </a>

                </div>
                <!-- END: Search -->
                <!-- BEGIN: Notifications -->
                <div class="intro-x dropdown mr-4 sm:mr-6">

                </div>
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                        role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <img alt="User" :src="userProfile">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul
                            class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                            <li class="p-2">
                                <div class="font-medium">{{ $page.props.auth.user.name }}</div>
                                <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">Admin</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5">
                                    <Icon name="user" class="w-4 h-4 mr-2 " /> &nbsp;&nbsp; Profile
                                </a>
                            </li>
                            <li v-if="showLogoutOption">
                                <a @click="logout" class="dropdown-item hover:bg-white/5 cursor-pointer">
                                    <Icon name="log-off" class="w-4 h-4 mr-2 " /> &nbsp;&nbsp; Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- END: Account Menu -->
            </div>
        </div>
    </div>
</template>
