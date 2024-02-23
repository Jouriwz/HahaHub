<template>
    <div class="p-6">
        <button
            @click="showCreateForm = true"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4"
        >
            Add New Tag
        </button>
        <div v-if="showCreateForm" class="mb-4">
            <input
                type="text"
                v-model="newTagName"
                placeholder="Enter Tag Name"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            >
            <button
                @click="createTag"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-2"
            >
                Save
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="tag in tags" :key="tag.id" class="border-t">
                    <td class="px-4 py-2">{{ tag.name }}</td>
                    <td class="px-4 py-2">
                        <button
                            @click="editTag(tag)"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded"
                        >
                            Edit
                        </button>
                        <button
                            @click="deleteTag(tag.id)"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>


<script>
export default {
    props: {
        tags: Array,
    },
    data() {
        return {
            showCreateForm: false,
            newTagName: '',
        };
    },
    methods: {
        createTag() {
            this.$inertia.post('/tags', { name: this.newTagName }).then(() => {
                this.showCreateForm = false;
                this.newTagName = '';
            });
        },
        editTag(tag) {
            const newName = prompt('Enter new name for the tag:', tag.name);
            if (newName && newName !== tag.name) {
                this.$inertia.put(`/tags/${tag.id}`, { name: newName });
            }
        },
        deleteTag(id) {
            if (confirm('Are you sure you want to delete this tag?')) {
                this.$inertia.delete(`/tags/${id}`);
            }
        },
    },
};
</script>
