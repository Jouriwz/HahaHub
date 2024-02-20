<script setup>
import { defineProps } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import VideoListComponent from '../Components/VideoList.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    videos: Array,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-12">
            <VideoListComponent :videos="props.videos" />
        </div>
    </AuthenticatedLayout>
</template>
