<script setup>
import {useRouter, useRoute} from 'vue-router';
import {useProductStore} from "@/stores/productStore.js";
import {onMounted} from "vue";
import Pen from "@/components/logo/Pen.vue";
import Basket from "@/components/logo/Basket.vue";
import Cross from "@/components/logo/Cross.vue";
import { DotLoader } from "vue3-spinner";
import ShowInfoItem from "@/components/items/ShowInfoItem.vue";
import {setFirstLetterCapital} from "@/helpers.js";
import {NAME_FIELDS_PRODUCT_EDIT} from "@/constants/productKeysForEdit.js";

const router = useRouter();
const route = useRoute();

const productStore = useProductStore();

onMounted(() => {
    productStore.fetchProductById(route.params.productId)
});

const closeModalHandler = () => {
    productStore.freshProductInfo();
    router.push({name: 'products'}
    );
}

const deleteProductHandler = () => {
    if (confirm("Вы уверены в удалении?")) {
        productStore.deleteProductById(closeModalHandler);
    }
}
</script>

<template>
    <Modal @close-modal="closeModalHandler">
        <template #navigation>
            <div class="container">
                <router-link :to="{ name: 'products.edit', params: {productId: route.params.productId}}" >
                    <div class="navigation-block">
                        <Pen/>
                    </div>
                </router-link>
                <div class="navigation-block" @click="deleteProductHandler">
                    <Basket />
                </div>
                <div>
                    <Cross @click="closeModalHandler"/>
                </div>
            </div>
        </template>
        <template #body v-if="productStore.originalProduct">
            <div>
                <div class="title">
                    {{ productStore.originalProduct.name }}
                </div>
                <ShowInfoItem v-for="field in NAME_FIELDS_PRODUCT_EDIT">
                    <template #fieldName>
                        {{ field.name }}
                    </template>
                    <template #fieldValue>
                        <span v-if="Array.isArray(productStore.originalProduct[field.value])">
                            <span v-for="currentItem in productStore.originalProduct[field.value]">
                                {{ setFirstLetterCapital(currentItem.name) + ': ' + currentItem.value }}
                                <br>
                            </span>
                        </span>
                        <span v-else>
                            {{ productStore.originalProduct[field.value]}}
                        </span>
                    </template>
                </ShowInfoItem>
            </div>
        </template>
        <template #body v-else>
            <div class="loader-container">
                <DotLoader color="#FFF" />
            </div>
        </template>
    </Modal>
</template>

<style scoped>
.container {
    width: 100%;
    display: flex;
}

.navigation-block {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 4px 2px 2px;
    background-color: #000;
    opacity: 40%;
    width: 20px;
    height: 20px;
    cursor: pointer;
    box-sizing: border-box;
    padding: 4px;
}

.navigation-block:hover {
    transition: 0.3s ease-in-out;
    opacity: 1;
}

.loader-container {
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
