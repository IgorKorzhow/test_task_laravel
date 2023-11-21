<script setup>
import {STATUSES} from "@/constants/statuses.js";
import Basket from "@/components/logo/Basket.vue";
import {useProductStore} from "@/stores/productStore.js";
import {useRouter} from 'vue-router';
import validationError from "@/components/UI/ValidationError.vue";
import Cross from "@/components/logo/Cross.vue";
import {onBeforeMount} from "vue";

const router = useRouter();
const productStore = useProductStore();

onBeforeMount(() => {
    productStore.initializeNewProduct();
});

const closeModalHandler = () => {
    productStore.freshProductInfo();
    router.push({name: 'products'});
}
</script>

<template>
    <Modal @close-modal="closeModalHandler">
        <template #navigation>
            <Cross @click="closeModalHandler" />
        </template>
        <template #body>
            <div class="title">
                Добавить продукт
            </div>
            <form @submit.prevent="productStore.storeProduct(closeModalHandler)">
                <div class="form-group">
                    <CustomLabel for="article">Артикул</CustomLabel>
                    <CustomInput id="article" v-model="productStore.changedProduct.article"/>
                    <ValidationError v-if="productStore.validationErrors.article">
                        {{ productStore.validationErrors.article[0] }}
                    </ValidationError>
                </div>
                <div class="form-group">
                    <CustomLabel for="name">Название</CustomLabel>
                    <CustomInput id="name" v-model="productStore.changedProduct.name"/>
                    <ValidationError v-if="productStore.validationErrors.name">
                        {{ productStore.validationErrors.name[0] }}
                    </ValidationError>
                </div>
                <div class="form-group">
                    <CustomLabel>Статус</CustomLabel>
                    <CustomSelect
                        :options="STATUSES"
                        :model-value="productStore.changedProduct.status"
                        @update:model-value="newValue => productStore.changedProduct.status = newValue"
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
                <div v-for="(attribute, index) in productStore.changedProduct.data" :key="index" class="container">
                    <div class="form-group attributes-container">
                        <CustomLabel :for="index + 'name'">Название</CustomLabel>
                        <CustomInput :id="index + 'name'" v-model="attribute.name"/>
                    </div>
                    <div class="form-group attributes-container">
                        <CustomLabel :for="index + 'value'">Значение</CustomLabel>
                        <CustomInput :id="index + 'value'" v-model="attribute.value"/>
                    </div>
                    <div class="basket-container">
                        <Basket @click="productStore.deleteAttributeFromProductData(index)"/>
                    </div>
                </div>
                <LinkButton @click="productStore.addAttributeToProductData">+ Добавить атрибут</LinkButton>
                <div>
                    <CustomButton>Добавить</CustomButton>
                </div>
            </form>
        </template>
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
