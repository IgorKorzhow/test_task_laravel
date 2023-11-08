<script setup>

import Cross from "@/logo/Cross.vue";
</script>

<template>
    <div class="modal">
        <div class="modal-content">
            <div class="modal-content-container">
                <article class="title">
                    Добавить продукт
                </article>
            </div>
            <Cross style="margin-left: auto" />
        </div>
    </div>
</template>

<style scoped>
.modal {
    display: block;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    display: flex;
    background: #374050;
    margin: 15% auto;
    padding: 18px 5px;
    width: 80%;
}

.modal-content-container {
    padding: 0 12px;
}

.title {
    margin: 30px 0;
    font-size: 20px;
    color: #FFFFFF;
}
</style>
