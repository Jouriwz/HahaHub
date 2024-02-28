<template>
    <div class="tags flex flex-wrap">
        <span v-for="tag in videoTags" :key="tag.id" class="bg-blue-500 text-white rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2">{{ tag.name }}</span>
        <!-- Select Tag Dropdown -->
        <select @change="assignTagToVideo($event)">
            <option value="">Voeg tag toe...</option>
            <option v-for="tag in allTags" :key="tag.id" :value="tag.id">{{ tag.name }}</option>
        </select>
    </div>
</template>

<script>
export default {
    props: {
        videoTags: Array,
        allTags: Array,
        videoId: Number,
    },
    methods: {
        assignTagToVideo(event) {
            const tagId = event.target.value;
            if (tagId) {
                this.$emit('assign-tag', { videoId: this.videoId, tagId });
                event.target.value = '';
            }
        },
    },
};
</script>


<style scoped>
/* Styles */
</style>
