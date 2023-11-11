<script>
export default {
    name: 'CustomSelect'
}
</script>

<script setup>
import {onMounted, reactive, ref} from "vue";

const props = defineProps({
    options: {
        type: Array,
        required: true,
    },
    default: {
        type: Object,
        required: false,
        default: 'Выберите стату'
    },
});

const isOpen = ref(false);

const selectedOption = reactive({
    name: "",
    value: ""
});

const emit = defineEmits(['input'])

onMounted(() => {
    emit('input', selectedOption.value);
});

const handleOnClickSelect = () => {
    isOpen.value = !isOpen.value;
};

const handleOnClickOption = (option) => {
    selectedOption.value = option;
    emit('input', selectedOption.value);
    isOpen.value = !isOpen.value;
};
</script>

<template>
    <div class="custom-select">
        <div class="selected" :class="{ open: isOpen }" @click="handleOnClickSelect">
            {{ selectedOption.name }}
        </div>
        <div class="items" :class="{ selectHide: !isOpen }">
            <div
                v-for="(option, index) of options"
                :key="index"
                @click="handleOnClickOption(option)"
            >
                {{ option.name }}
            </div>
        </div>
    </div>
</template>


<style scoped>
.custom-select {
    position: relative;
    width: 100%;
    text-align: left;
    outline: none;
    height: 47px;
    line-height: 47px;
}

.custom-select .selected {
    background-color: #0a0a0a;
    border-radius: 6px;
    border: 1px solid #666666;
    color: #fff;
    padding-left: 1em;
    cursor: pointer;
    user-select: none;
}

.custom-select .selected.open {
    border: 1px solid #ad8225;
    border-radius: 6px 6px 0px 0px;
}

.custom-select .selected:after {
    position: absolute;
    content: "";
    top: 22px;
    right: 1em;
    width: 0;
    height: 0;
    border: 5px solid transparent;
    border-color: #fff transparent transparent transparent;
}

.custom-select .items {
    color: #fff;
    border-radius: 0px 0px 6px 6px;
    overflow: hidden;
    border-right: 1px solid #ad8225;
    border-left: 1px solid #ad8225;
    border-bottom: 1px solid #ad8225;
    position: absolute;
    background-color: #0a0a0a;
    left: 0;
    right: 0;
    z-index: 1;
}

.custom-select .items div {
    color: #fff;
    padding-left: 1em;
    cursor: pointer;
    user-select: none;
}

.custom-select .items div:hover {
    background-color: #ad8225;
}

.selectHide {
    display: none;
}
</style>
