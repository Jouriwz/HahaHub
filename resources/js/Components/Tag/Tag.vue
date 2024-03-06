<template>
    <div class="tags flex flex-wrap">
        <!-- Select Tag Dropdown -->
        <select @change="assignTagToVideo($event)">
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
