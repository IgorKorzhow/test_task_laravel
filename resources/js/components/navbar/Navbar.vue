<script setup>

</script>

<template>
    <div class="navbar-block">
        <div class="left-flex-block">
            <a class="link selected-link basic-fount" href="#">Продукты</a>
        </div>
        <div class="right-flex-block basic-fount">
            Иванов Иван Иванович
        </div>
    </div>
</template>

<style scoped>
.left-flex-block {
    display: flex;
}

.right-flex-block {
    display: flex;
    align-items: center;
    margin-left: auto;
    margin-right: 31px;
}

.navbar-block {
    width: 100%;
    display: flex;
    align-items: center;
    background: #FFF;
    padding: 25px 0 20px 0;
    height: 15px;
}

.link {
    position: relative;
    margin: 0 11px;
    text-decoration: none;
    text-transform: uppercase;
    color: #ED1C24;
}

.selected-link::before,
.selected-link::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 3px;
    background-color: #ED1C24;
    bottom: -22px;
    left: 0;
}
</style>
