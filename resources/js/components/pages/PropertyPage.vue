<script setup>
import {onMounted, ref} from "vue";
import Logo from "@/components/logo/Logo.vue";
import NavbarItem from "@/components/items/NavbarItem.vue";
import Navbar from "@/components/navbar/Navbar.vue";
import CustomTable from "@/components/tables/Custom-Table.vue";
import CreateProductForm from "@/components/forms/property/CreateProductForm.vue";
import useProducts from "@/composables/products.js";
import {NAME_FIELDS_PRODUCT_TABLE} from "@/constants/properyHeaders.js";

const { products, getProducts } = useProducts()
onMounted(() => {
    getProducts()
})

const isShowCreateProductForm = ref(false);

function clickShowCreatePropertyBtn() {
    isShowCreateProductForm.value = !isShowCreateProductForm.value;
}
</script>

<template>
    <div v-if="isShowCreateProductForm">
        <CreateProductForm @close-modal="clickShowCreatePropertyBtn" />
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
                <CustomTable :data="products.data" :fieldNames="NAME_FIELDS_PRODUCT_TABLE"/>
                <div style="margin: 17px 18px 17px auto;">
                    <Button @click="clickShowCreatePropertyBtn">Добавить</Button>
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
