<script>
export default {
    name: 'LinkButton',
}
</script>

<script setup>
</script>

<template>
        <a class="basic-fount button">
            <div class="container">
                <slot />
            </div>
        </a>
</template>

<style scoped>
.button {
    font-size: 9px;
    line-height: 5px;
    text-decoration: underline;
    cursor: pointer;

    color: #0FC5FF;
}

.container {
    display: inline-block;
    padding: 1px;
    border-bottom: 1px dashed #0FC5FF;
}
</style>
