<script setup>
import {useProductStore} from "@/stores/productStore.js";

const productStore = useProductStore();

const emits = defineEmits(['closeModal'])
</script>

<template>
    <Modal @close-modal="$emit('closeModal')">
        <div class="title">
            Добавить продукт
        </div>
    </Modal>
</template>

<style scoped>
</style>
