<script>
export default {
    name: "CustomTable"
}
</script>
<template>
    <table class="basic-fount custom-table">
        <thead>
            <slot name="thead" />
        </thead>
        <tbody>
            <slot name="tbody" />
        </tbody>
    </table>
</template>

<style>
.custom-table {
    width: 630px;
    color: #6E6E6F !important;
    border-collapse: collapse;
}
.custom-table tbody tr:hover td {
    transition: 0.5s ease-in-out;
    cursor: pointer;
    background-color: #e4e4e4;
}

.custom-table tr th {
    font-weight: 400;
    text-align: left;
    text-transform: uppercase;
    padding: 9px 18px;
}

.custom-table tr td {
    border: none;
    background: #FFFFFF;
    padding: 22px 18px;
    border-top: 1px solid #C4C4C4;
    border-bottom: 1px solid #C4C4C4;;

}
</style>
