<script>
export default {
    name: 'CustomSelect'
}
</script>

<script setup>
import {ref} from "vue";
import ExpandLogo from "@/components/logo/ExpandLogo.vue";
import {onClickOutside} from "@vueuse/core";

const props = defineProps({
    options: {
        type: Array,
        required: true,
    },
    modelValue: String,
});

const target = ref(null);
const isOpen = ref(false);

const selectedOption = ref(props.options.find(option => option.value === props.modelValue));

const emit = defineEmits(['update:modelValue'])

const handleOnClickSelect = () => {
    isOpen.value = !isOpen.value;
};

const handleOnClickOption = (option) => {
    selectedOption.value = option;
    isOpen.value = !isOpen.value;

    emit('update:modelValue', selectedOption.value.value)
};

onClickOutside(target, () => isOpen.value = false);
</script>
<template>
    <div class="custom-select basic-fount" ref="target">
        <div @click="handleOnClickSelect" class="select-container">
            <div class="selected-item-text">
                {{ selectedOption.name }}
            </div>
            <div class="expand_logo" :class="{'hide_expand_logo': isOpen}">
                <ExpandLogo />
            </div>
        </div>
            <div class="items" :class="{'show-options': isOpen}">
                <div
                    v-for="(option, index) of options"
                    :key="index"
                    :class="{'selected_option': option.value === selectedOption.value}"
                    @click="handleOnClickOption(option)"
                >
                    {{ option.name }}
                </div>
            </div>
    </div>
</template>

<style scoped>
.custom-select {
    font-weight: 300;
    color: black;

    background-color: #FFFFFF;
    border-radius: 5px;

    cursor: pointer;
}

.select-container {
    height: 30px;
    box-sizing: border-box;
    display: flex;
    justify-content: space-between;
}

.selected-item-text {
    margin: 10px 9px;
}

.selected_option {
    background: #50A9FC;
}

.expand_logo {
    margin: 5px;
}

.hide_expand_logo {
    display: none;
}

.custom-select .items div {
    padding: 9px;
}

.custom-select .items div:last-child {
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;

    padding: 9px;
}

.items {
    display: none;
}
.show-options {
    display: block;
}
</style>
