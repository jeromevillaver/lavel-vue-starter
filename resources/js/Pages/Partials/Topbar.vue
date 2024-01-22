<script setup>
import { ref, onMounted } from 'vue';
import logo from '/resources/dist/images/logo.svg'
import userProfile from '/resources/dist/images/users/user.svg'
import Icon from "@/Components/Icon.vue";
import { router } from "@inertiajs/vue3";


import profile5 from '/resources/dist/images/profile-5.jpg'
import profile7 from '/resources/dist/images/profile-7.jpg'
import profile11 from '/resources/dist/images/profile-11.jpg'
import profile12 from '/resources/dist/images/profile-12.jpg'
import profile1 from '/resources/dist/images/profile-1.jpg'


const showLogoutOption = ref(true);


const logout = () => {
    showLogoutOption.value = false;

    router.post(route("logout"), { redirect: { name: 'login' } });
};


const userName = ref('');

onMounted(() => {
    userName.value = document.querySelector("meta[name='user-name']").getAttribute('content');
});

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
                    <!-- <ol class="breadcrumb breadcrumb-light">
                        <li class="breadcrumb-item"><a href="#">Application</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol> -->
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                    <div class="search hidden sm:block">
                        <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                        <!-- <i data-lucide="search" class="search__icon dark:text-slate-500"></i> -->
                        <Icon name="search" class="search__icon dark:text-slate-500 w-5 h-5" />
                    </div>
                    <a class="notification notification--light sm:hidden" href=""> <i data-lucide="search"
                            class="notification__icon dark:text-slate-500"></i> </a>

                </div>
                <!-- END: Search -->
                <!-- BEGIN: Notifications -->
                <div class="intro-x dropdown mr-4 sm:mr-6">
                    <!-- <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                        aria-expanded="false" data-tw-toggle="dropdown">
                        <Icon name="alert" class="w-5 h-5" />
                    </div> -->
                    <!-- Your component template -->
                    <!-- <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                        aria-expanded="false" data-tw-toggle="dropdown">
                        <Icon name="bell" />
                    </div>

                    <div class="notification-content pt-2 dropdown-menu">
                        <div class="notification-content__box dropdown-content">
                            <div class="notification-content__title">Notifications</div>
                            <div class="cursor-pointer relative flex items-center ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" :src="profile5">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Christian Bale</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">06:05 AM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a
                                        reader will be distracted by the readable content of a page when looking at its
                                        layout. The point of using Lorem </div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" :src="profile7">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">06:05 AM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of
                                        the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s
                                        standard dummy text ever since the 1500</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" :src="profile12">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Robert De Niro</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem
                                        Ipsum is not simply random text. It has roots in a piece of classical Latin
                                        literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" :src="profile1">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Morgan Freeman</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem
                                        Ipsum is not simply random text. It has roots in a piece of classical Latin
                                        literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" :src="profile11">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">06:05 AM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem
                                        Ipsum is not simply random text. It has roots in a piece of classical Latin
                                        literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
                                <div class="font-medium">{{ userName }}</div>
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
