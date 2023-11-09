<script>
export default {
    name: 'Select'
}
</script>
<script setup>

const isShowOptions = false;
</script>

<template>
    <div class="dropdown" @click="isShowOptions = !isShowOptions">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Доступен</button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="dropdownMenu1">
            <li><a class="dropdown-item" href="#">Доступен</a></li>
            <li><a class="dropdown-item" href="#">Недоступен</a></li>
        </ul>
    </div>
</template>


<style scoped>
#dropdownMenuButton1{
    width: 472px;
    text-align: left;
    background-color: #FFFFFF;
    color: black;
    font-size: 11px;
    position: relative;
}
#dropdownMenuButton1::after{
    right: 10px;
    top: 50%;
    position: absolute;
    top: 8px;
    content: '';
    display: block;
    width: 10px;
    height: 10px;
    border-left: 3px solid #C4C4C4;
    border-bottom: 3px solid #C4C4C4;
    transform: rotate(-45deg);
    border-top: unset;
    border-right: unset;
}
#dropdownMenu1{
    //display: none;
    top: -12px!important;
    border-top: none;
    width: 474px;
    padding-bottom: 0px;
    margin-left: -1px!important;
}
#dropdownMenu1 > li:hover a{
    background: #50A9FC;
}
.dropdown-item{
    padding: 0.25rem 12px;
    font-size: 11px;
}
.modal-content label{
    margin-bottom: 8px;
}
</style>
