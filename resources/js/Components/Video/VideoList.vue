<template>
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-4 gap-y-12 justify-items-center">
            <div v-for="video in videos" :key="video.id" class="w-full max-w-xs h-auto rounded overflow-hidden shadow-lg bg-gray-600">
                <div class="px-6 py-2">
                    <div class="font-bold text-xl text-gray-100">{{ video.name }}</div>
                </div>
                <video controls class="w-full h-64">
                    <source :src="videoUrl(video.path)" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <div class="flex px-6 py-2 space-x-2">
                    <div>
                        <Tag :videoTags="video.tags" :allTags="allTags" :videoId="video.id" @assign-tag="handleAssignTag" />
                    </div>
                    <div>
                        <ShowTag :videoTags="video.tags" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script>
import Tag from '../Tag/Tag.vue';
import ShowTag from "@/Components/Tag/ShowTag.vue";

export default {
    components: {
        ShowTag,
        Tag,
    },
    props: {
        videos: Array,
        allTags: Array,
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
