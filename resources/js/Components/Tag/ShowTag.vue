<script setup>
import { defineProps } from 'vue';

defineProps({
    videoTags: Array
});
</script>

<template>
    <div class="flex flex-wrap">
        <span v-for="tag in videoTags" :key="tag.id" class="mr-2 mb-2 bg-gray-200 text-gray-800 text-sm font-medium px-3 py-1 rounded-full">
            {{ tag.name }}
        </span>
    </div>
</template>
