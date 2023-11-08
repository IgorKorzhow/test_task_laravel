<script setup>
import Logo from "@/logo/Logo.vue";
import NavbarItem from "@/items/NavbarItem.vue";
import Navbar from "@/navbar/Navbar.vue";
import CustomTable from "@/tables/Custom-Table.vue";
import Button from "@/UI/Button.vue";
import Modal from "@/modals/Modal.vue";
</script>

<template>
    <Modal />
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
                <CustomTable />
                <div style="margin: 17px 18px 17px auto;">
                    <Button>Добавить</Button>
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
    height: 100vh;
    width: 180px;
    background-color: #374050;
}

.logo-text {
    margin-top: 7px;
    margin-left: 12px;
    color: #FFF;
}
</style>
