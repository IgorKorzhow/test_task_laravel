<script setup>
import {onMounted} from "vue";
import Logo from "@/components/logo/Logo.vue";
import NavbarItem from "@/components/items/NavbarItem.vue";
import Navbar from "@/components/navbar/Navbar.vue";
import {NAME_FIELDS_PRODUCT_TABLE} from "@/constants/properyHeaders.js";
import {useProductStore} from "@/stores/productStore.js";
import {useAppStore} from "@/stores/appStore.js";
import CreateProductForm from "@/components/pages/products/CreateProductModal.vue";

const productStore = useProductStore();
const appStore = useAppStore();

onMounted(() => {
    productStore.fetchProducts();
})
</script>

<template>
    <div v-if="appStore.isShowModal">
        <CreateProductForm @close-modal="appStore.closeModal()" />
    </div>
    <div class="container">
        <div class="navigation-part">
            <div class="container">
                <Logo />
                <div class="logo-text basic-fount">
                    Enterprise Resource Planning
                </div>
            </div>
            <NavbarItem />
        </div>
        <div style="width: 100%">
            <Navbar />
            <div class="container">
                <CustomTable :data="productStore.products" :fieldNames="NAME_FIELDS_PRODUCT_TABLE"/>
                <div style="margin: 17px 18px 17px auto;">
                    <CustomButton @click="appStore.openModal">Добавить</CustomButton>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.container {
    width: 100%;
    display: flex;
}

.navigation-part {
    min-height: 100vh;
    width: 180px;
    background-color: #374050;
}

.logo-text {
    margin-top: 7px;
    margin-left: 12px;
    color: #FFF;
}
</style>
