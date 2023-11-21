<script setup>
import {STATUSES} from "@/constants/statuses.js";
import Basket from "@/components/logo/Basket.vue";
import {useProductStore} from "@/stores/productStore.js";
import {useRoute, useRouter} from 'vue-router';
import {onMounted, ref} from "vue";
import validationError from "@/components/UI/ValidationError.vue";
import Cross from "@/components/logo/Cross.vue";

const router = useRouter();
const route = useRoute();

const productStore = useProductStore();

const isLoadedProduct = ref(false);

const closeModalHandler = () => router.push({name: 'products'});

onMounted(async () => {
    await productStore.fetchProductById(route.params.productId);
    isLoadedProduct.value = true
})
</script>

<template>
    <Modal @close-modal="closeModalHandler">
        <template #navigation>
            <Cross @click="closeModalHandler" />
        </template>
        <template #body v-if="isLoadedProduct">
            <div class="title">
                Редактировать {{ productStore.changedProduct.name }}
            </div>
            <form @submit.prevent="productStore.updateProduct(closeModalHandler)">
                <ValidationError v-if="productStore.validationErrors.permissionError">
                    {{ productStore.validationErrors.permissionError }}
                </ValidationError>
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
                <div style="margin-bottom: 41px">
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
