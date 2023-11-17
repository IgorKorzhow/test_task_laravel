<script>
export default {
    name: "CustomTable"
}
</script>
<script setup>
import {setFirstLetterCapital} from "@/helpers.js";

defineProps(
    {
        data: {
            type: Array,
            required: true
        },
        fieldNames: {
            type: Array,
            required: true
        }
    }
);
</script>
<template>
    <table class="basic-fount">
        <thead>
            <tr>
                <th key="{{ fieldName.name }}" v-for="fieldName in fieldNames">{{ fieldName.name }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in data" key="{{ item.id }}">
                <td
                    v-for="fieldName in fieldNames"
                >
                    <span v-if="typeof item[fieldName.field] === 'object'">
                        <span v-for="currentKey in Object.keys(item[fieldName.field])">
                            {{ setFirstLetterCapital(currentKey) + ': ' + item[fieldName.field][currentKey] }}
                            <br>
                        </span>
                    </span>
                    <span v-else>
                            {{ item[fieldName.field] }}
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<style scoped>
table {
    width: 630px;
    color: #6E6E6F;
    border-collapse: collapse;
}
table tbody tr:hover td {
    transition: 0.5s ease-in-out;
    cursor: pointer;
    background-color: #e4e4e4;
}

tr th {
    font-weight: 400;
    text-align: left;
    text-transform: uppercase;
    padding: 9px 18px;
}

tr td {
    border: none;
    background: #FFFFFF;
    padding: 22px 18px;
    border-top: 1px solid #C4C4C4;
    border-bottom: 1px solid #C4C4C4;;

}
</style>
