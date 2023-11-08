<script setup>
import Modal from "@/modals/Modal.vue";
import Input from "@/UI/Input.vue";
import Label from "@/UI/Label.vue";
import Select from "@/UI/Select.vue";

</script>

<template>
    <Modal>
        <article class="title">
            Добавить продукт
        </article>
        <form>
            <div class="form-group">
                <Label for="article">Артикул</Label>
                <Input id="article"/>
            </div>
            <div class="form-group">
                <Label for="name">Название</Label>
                <Input id="name"/>
            </div>
            <div class="form-group">
                <Label for="state">Статус</Label>
                <Select/>
            </div>
        </form>
    </Modal>
</template>

<style scoped>
.title {
    margin: 30px 0;
    font-size: 20px;
    color: #FFFFFF;
}

.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 10px;
}

label {
    font-weight: bold;
    margin-bottom: 8px;
}

input {
    padding: 5px;
}
</style>
