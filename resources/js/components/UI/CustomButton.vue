<script>
export default {
    name: 'CustomButton'
}
</script>

<script setup>
</script>

<template>
    <button class="btn basic-fount"><slot></slot></button>
</template>

<style scoped>
.btn {
    cursor: pointer;
    padding: 9px 42px;
    background-color: #0FC5FF;
    border: none;
    border-radius: 6px;
    color: #FFFFFF;
    transition-duration: 0.3s;
}

.btn:hover {
    background-color: #12aae1;
}
</style>
