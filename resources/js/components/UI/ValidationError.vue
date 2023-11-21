<script>
export default {
    name: 'ValidationError',
}
</script>

<template>
    <span class="basic-fount">
        <slot />
    </span>
</template>

<style scoped>
span {
    color: red;
    line-height: normal
}
</style>
