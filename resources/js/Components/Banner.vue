<script setup>
import { defineProps, onMounted } from 'vue';

const props = defineProps({
    flashMessages: {
        type: Object,
        default: () => ({}),
    },
});

const getBannerClass = (type) => {
    const typeMap = {
        success: 'flash-message__success',
        info: 'flash-message__info',
        danger: 'flash-message__danger',
        warning: 'flash-message__warning',
        light: 'flash-message__light',
        secondary: 'flash-message__secondary',
        dark: 'flash-message__dark',
    };

    return `flash-message ${typeMap[type] || 'flash-message__default'}`;
};

const handleRemoveMessage = (type) => {
    props.flashMessages[type] = '';
};

onMounted(() => {
    // Clear messages after 5 seconds
    for (const type in props.flashMessages) {
        if (props.flashMessages[type]) {
            setTimeout(() => {
                handleRemoveMessage(type);
            }, 5000);
        }
    }
});

</script>

<template>
    <div>
        <div v-for="(message, type) in props.flashMessages" :key="type">
            <div :class="getBannerClass(type)" v-if="message && type">
                <button type="button" class="close">x</button>
                <strong>{{ message }}</strong>
            </div>
        </div>
    </div>
</template>


<style scoped>
.flash-message {
    padding: 10px;
    margin-bottom: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 4px;
}

.flash-message__success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.flash-message__info {
    background-color: #d1ecf1;
    color: #0c5460;
    border: 1px solid #bee5eb;
}

.flash-message__danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.flash-message__warning {
    background-color: #fff3cd;
    color: #856404;
    border: 1px solid #ffeeba;
}

/* Light Theme */
.flash-message__light {
    background-color: #fff3cd;
    color: #856404;
    border: 1px solid #ffeeba;
}

/* Dark Theme */
.flash-message__dark {
    background-color: #343a40;
    color: #adb5bd;
    border: 1px solid #212529;
}

/* Secondary Theme */
.flash-message__secondary {
    background-color: #d1ecf1;
    color: #0c5460;
    border: 1px solid #bee5eb;
}


.flash-message__default {
    background-color: #f0f0f0;
    color: #333;
    border: 1px solid #ccc;
}

.flash-message__text {
    margin: 0;
}

.flash-message__close {
    cursor: pointer;
}
</style>
