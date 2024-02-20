<template>
    <form @submit.prevent="uploadVideo" class="flex flex-col space-y-4">
        <input type="file" @change="fileSelected" class="block w-full text-sm text-gray-500
      file:mr-4 file:py-2 file:px-4
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-violet-50 file:text-violet-700
      hover:file:bg-violet-100
    "/>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 transition duration-300 ease-in-out">Upload Video</button>
    </form>
</template>


<script>
export default {
    data() {
        return {
            video: null,
        };
    },
    methods: {
        fileSelected(event) {
            this.video = event.target.files[0];
        },
        async uploadVideo() {
            const formData = new FormData();
            formData.append('video', this.video);
            await this.$inertia.post(route('videos.store'), formData, {
                preserveState: true, // Prevents the page from fully reloading
            });
        },
    },
};
</script>


<style scoped>

</style>
