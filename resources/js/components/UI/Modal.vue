<script>
export default {
    name: 'Modal',
}
</script>

<script setup>
import {ref} from "vue";
import { onClickOutside } from '@vueuse/core'

const target = ref(null)
const emit = defineEmits(['closeModal'])

onClickOutside(target, () => emit('closeModal'))
</script>

<template>
    <div class="modal">
        <div class="modal-content" ref="target">
            <div class="modal-content-container">
                <slot name="body" />
            </div>
            <div style="margin-left: auto">
                <slot name="navigation" />
            </div>
        </div>
    </div>
</template>

<style scoped>
.modal {
    display: block;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    display: flex;
    background: #374050;
    margin: 10% auto;
    padding: 18px 5px;
    width: 50%;
    min-height: 50%;
}

.modal-content-container {
    width: 70%;
    padding: 0 12px;
}
</style>
