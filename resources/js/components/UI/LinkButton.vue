<script>
export default {
    name: 'LinkButton',
}
</script>

<script setup>
</script>

<template>
        <a class="basic-fount button">
            <slot>
            </slot>
        </a>
</template>

<style scoped>
.button {
    font-size: 9px;
    text-decoration: underline;

    cursor: pointer;

    color: #0FC5FF;
}
</style>
