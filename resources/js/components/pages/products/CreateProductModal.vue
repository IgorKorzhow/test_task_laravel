<script setup>
import {STATUSES} from "@/constants/statuses.js";
import Basket from "@/components/logo/Basket.vue";
import {useProductStore} from "@/stores/productStore.js";

const productStore = useProductStore();

const emits = defineEmits(['closeModal'])
</script>

<template>
    <Modal @close-modal="$emit('closeModal')">
        <div class="title">
            Добавить продукт
        </div>
        <form @submit.prevent="productStore.storeProduct(() => emits('closeModal'))">
            <div class="form-group">
                <CustomLabel for="article">Артикул</CustomLabel>
                <CustomInput id="article" v-model="productStore.createProduct.article" />
                <ValidationError v-if="productStore.validationErrors.article">
                    {{ productStore.validationErrors.article[0] }}
                </ValidationError>
            </div>
            <div class="form-group">
                <CustomLabel for="name">Название</CustomLabel>
                <CustomInput id="name" v-model="productStore.createProduct.name" />
                <ValidationError v-if="productStore.validationErrors.name">
                    {{ productStore.validationErrors.name[0] }}
                </ValidationError>
            </div>
            <div class="form-group">
                <CustomLabel>Статус</CustomLabel>
                <CustomSelect
                    :options="STATUSES"
                    :model-value="productStore.createProduct.status"
                    @update:model-value="newValue => productStore.createProduct.status = newValue"
                />
                <ValidationError v-if="productStore.validationErrors.status">
                    {{ productStore.validationErrors.status[0] }}
                </ValidationError>
            </div>
            <div class="form-group">
                <div class="basic-fount sub-title">
                    Атрибуты
                </div>
            </div>
            <div v-for="(attribute, index) in productStore.createProduct.data" :key="index" class="container">
                <div class="form-group attributes-container">
                    <CustomLabel :for="index + 'name'">Название</CustomLabel>
                    <CustomInput :id="index + 'name'" v-model="attribute.name" />
                </div>
                <div class="form-group attributes-container">
                    <CustomLabel :for="index + 'value'">Значение</CustomLabel>
                    <CustomInput :id="index + 'value'" v-model="attribute.value" />
                </div>
                <div class="basket-container">
                    <Basket @click="productStore.deleteAttributeFromCreateProduct(index)"/>
                </div>
            </div>
            <LinkButton @click="productStore.addAttributeToCreateProduct">+ Добавить атрибут</LinkButton>
            <div style="margin-bottom: 41px">
                <CustomButton>Добавить</CustomButton>
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

.container {
    width: 100%;
    display: flex;
    flex-direction: row;
}

.attributes-container {
    width: 45%;
    margin-right: 12px;
}

.basket-container {
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
</style>
