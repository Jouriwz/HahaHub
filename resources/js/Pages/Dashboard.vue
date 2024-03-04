<script setup>
import { defineProps } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import VideoListComponent from '../Components/Video/VideoList.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    videos: Array,
    allTags: Array,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-12">
            <VideoListComponent :videos="props.videos" :allTags="props.allTags" />
        </div>
    </AuthenticatedLayout>
</template>
