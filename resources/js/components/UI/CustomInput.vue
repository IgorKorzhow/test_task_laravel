<script>
export default {
    name: 'CustomInput'
}
</script>

<script setup>
const props = defineProps([
    'modelValue'
]);

const emit = defineEmits(['update:modelValue']);

const updateValue = (event) => {
    emit('update:modelValue', event.target.value)
}
</script>

<template>
<input class="input" :value="modelValue" @input="updateValue"/>
</template>

<style scoped>
.input {
    border: none;
    height: 30px;
    box-sizing: border-box;
    border-radius: 5px;
    background: #FFFFFF;
}
</style>
