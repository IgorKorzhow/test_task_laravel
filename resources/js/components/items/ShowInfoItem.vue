<script setup>

</script>

<template>
    <div class="container basic-fount">
        <div class="field">
            <slot name="fieldName" />
        </div>
        <div class="value">
            <slot name="fieldValue" />
        </div>
    </div>
</template>

<style scoped>
.container {
    display: flex;
}

.field {
    width: 60px;
    margin: 18px 28px 0 12px;

}

.value {
    color: #FFFFFF;
    margin-top: 18px;
}
</style>
