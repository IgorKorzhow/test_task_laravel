<script setup>
import Modal from "@/components/modals/Modal.vue";
import {STATUSES} from "@/constants/statuses.js";
import {reactive} from "vue";

const product = reactive({
    article: '',
    name: '',
});

</script>

<template>
    <Modal @close-modal="$emit('closeModal')">
        <div class="title">
            Добавить продукт
        </div>
        <form>
            <div class="form-group">
                <CustomLabel for="article">Артикул</CustomLabel>
                <CustomInput id="article" v-model="product.article" />
            </div>
            <div class="form-group">
                <CustomLabel for="name">Название</CustomLabel>
                <CustomInput id="name" v-model="product.name" />
            </div>
            <div class="form-group">
                <CustomLabel for="state">Статус</CustomLabel>
                <CustomSelect :options="STATUSES" />
            </div>
            <div class="form-group">
                <div class="basic-fount sub-title">
                    Атрибуты
                </div>
                <div>
                    <LinkButton>+ Добавить атрибут</LinkButton>
                </div>
            </div>
        </form>
    </Modal>
</template>

<style scoped>
.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 13px;
}

label {
    font-weight: bold;
    margin-bottom: 8px;
}

input {
    padding: 5px;
}
</style>
