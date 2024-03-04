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
                    <Tag :videoTags="video.tags" :allTags="allTags" :videoId="video.id" @assign-tag="handleAssignTag" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Tag from '../Tag/Tag.vue';

export default {
    components: {
        Tag,
    },
    props: {
        videos: Array,
        allTags: Array, // Ensure allTags is accepted as a prop
    },
    methods: {
        videoUrl(path) {
            return '/storage/' + path;
        },
        handleAssignTag({ videoId, tagId }) {
            this.$inertia.post(`/videos/${videoId}/tags`, { tagId });
        },
    },
};
</script>

<style scoped>
/* Your styles here */
</style>
