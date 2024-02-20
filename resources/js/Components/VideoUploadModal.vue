<template>
        <Modal :show="isModalOpen" @close="isModalOpen = false">
            <Upload />
        </Modal>
        <button @click="isModalOpen = true">Upload Video</button>
</template>

<script setup>
import { ref } from 'vue';
import Modal from './Modal.vue';
import Upload from './Upload.vue';

const isModalOpen = ref(false);
</script>
