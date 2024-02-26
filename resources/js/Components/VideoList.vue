<template>
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-3 gap-4">
            <div v-for="video in videos" :key="video.id" class="max-w-sm rounded overflow-hidden shadow-lg bg-gray-600">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-gray-100">{{ video.name }}</div>
                </div>
                <video controls class="w-full">
                    <source :src="videoUrl(video.path)" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="px-6 py-4">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        videos: Array,
    },
    methods: {
        videoUrl(path) {
            return '/storage/' + path;
        },
    },
};
</script>

<style scoped>
/* You can add component-specific styles here */
</style>
