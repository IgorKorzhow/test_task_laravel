<script setup>
defineProps(
    {
        'path': Object
    }
)
</script>

<template>
    <router-link class="item" :to="path">
        <slot/>
    </router-link>
</template>

<style scoped>
.item {
    margin: 13px 90px 0 34px;
    color: rgba(255, 255, 255, 0.70);
    font-family: Roboto, serif;
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: 11px;
    text-decoration: none;
    transition: 0.3s ease-in-out color;
}

.item:hover {
    color: #FFFFFF;
}
</style>
