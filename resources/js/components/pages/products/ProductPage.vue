<script setup>
import {onMounted} from "vue";
import Logo from "@/components/logo/Logo.vue";
import NavbarItem from "@/components/items/NavbarItem.vue";
import Navbar from "@/components/navbar/Navbar.vue";
import {NAME_FIELDS_PRODUCT_TABLE} from "@/constants/productHeadersForTable.js";
import {useProductStore} from "@/stores/productStore.js";
import {setFirstLetterCapital} from "@/helpers.js";
import {useRouter} from "vue-router";
import {DotLoader} from "vue3-spinner";

const router = useRouter();

const productStore = useProductStore();

onMounted(() => {
    productStore.fetchProducts();
})
</script>

<template>
    <div class="container">
        <div class="navigation-part">
            <div class="container">
                <Logo/>
                <div class="logo-text basic-fount">
                    Enterprise Resource Planning
                </div>
            </div>
            <NavbarItem :path="{name: 'products'}">
                Продукты
            </NavbarItem>
        </div>
        <div class="content-part" >
            <Navbar/>
            <div class="container" v-if="productStore.products">
                <CustomTable>
                    <template #thead>
                        <tr>
                            <th key="{{ fieldName.name }}" v-for="fieldName in NAME_FIELDS_PRODUCT_TABLE">{{ fieldName.name }}</th>
                        </tr>
                    </template>
                    <template #tbody>
                            <tr v-for="item in productStore.products" key="{{ item.id }}"
                                @click="router.push({name: 'products.show', params: {productId: item.id}})"
                            >
                                <td v-for="fieldName in NAME_FIELDS_PRODUCT_TABLE">
                                <span v-if="Array.isArray(item[fieldName.field])">
                                    <span v-for="currentItem in item[fieldName.field]">
                                        {{ setFirstLetterCapital(currentItem.name) + ': ' + currentItem.value }}
                                        <br>
                                    </span>
                                </span>
                                    <span v-else>
                                        {{ item[fieldName.field] }}
                                </span>
                                </td>
                            </tr>
                    </template>
                </CustomTable>
                <div style="margin: 17px 18px 17px auto;">
                    <router-link :to="{ name: 'products.create'}">
                        <CustomButton>Добавить</CustomButton>
                    </router-link>
                </div>
            </div>
            <div class="loader-container"  v-else >
                <DotLoader color="#333" />
            </div>
        </div>
    </div>
    <router-view/>
</template>

<style scoped>
.container {
    width: 100%;
    display: flex;
}

.navigation-part {
    min-height: 100vh;
    position: fixed;
    width: 180px;
    background-color: #374050;
}

.content-part {
    width: 100%;
    margin-left: 180px
}

.logo-text {
    margin-top: 7px;
    margin-left: 12px;
    color: #FFF;
}

.loader-container {
    height: 80%;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
