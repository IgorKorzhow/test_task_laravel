<script setup>
import Modal from "@/components/modals/Modal.vue";
import {STATUSES} from "@/constants/statuses.js";
import LinkButton from "@/components/UI/LinkButton.vue";
</script>

<template>
    <Modal>
        <div class="title">
            Добавить продукт
        </div>
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
                <Select>
                    <option v-for="status in STATUSES" value="{{status.value}}">
                        {{status.name}}
                    </option>
                </Select>
            </div>
            <div class="form-group">
                <div class="basic-fount sub-title">
                    Атрибуты
                </div>
                <div>
                    <LinkButton>+ Добавить атрибут</LinkButton>
                </div>
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

label {
    font-weight: bold;
    margin-bottom: 8px;
}

input {
    padding: 5px;
}
</style>
