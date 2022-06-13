<template>
    <div class="select-header">
        <h4>Select a Food</h4>
    </div>
    <div class="selectable-food-option">
        <div class="selectable-foods" v-for="selectableFood in getSelectableFoods.data">
            <a href="#" @click="">
                <p class="select-link-main"> {{ getFormattedHeader(selectableFood) }} </p>
                <p class="select-link-additional"> {{ this.getFormattedAdditional(selectableFood) }} </p>
            </a>
        </div>
    </div>
</template>

<script>

import { toRaw } from "vue";

export default {
    name: "SelectableFoods",
    props: {
        selectableFoods: {
            type: Object
        }
    },
    methods: {
        getFormattedHeader(selectableFood) {
            return selectableFood.name + ', ' + selectableFood.description;
        },
        getFormattedAdditional(selectableFood) {
            return Object.entries(selectableFood.additional).map(selectableFood =>  {
                return `${selectableFood[0]}: ${selectableFood[1]}`;
            }).join(', ');
        }
    },
    computed: {
        getSelectableFoods() {
            return toRaw(this.selectableFoods);
        }
    }
}
</script>

<style>
    .select-header > h4 {
        padding-left: 20%;
        margin-top: 1%;
        margin-bottom: 1%;
    }
    .select-link > h5, .select-link > h6 {
        margin-top: 2px;
        margin-bottom: 2px;
    }
    .selectable-food-option {
        margin-left: 20%;
        margin-right: 20%;
    }
    .selectable-foods {
        display: inline-block;
        background-color: #f7faf7;
        border-bottom: dashed #013801;
        width: 100%;
    }
    .selectable-foods:last-child {
        border-bottom: none;
    }
    .selectable-food-option {
        border: solid #086008;
    }
    .select-link-main {
        font-size: 14px;
        margin: 10px;
    }
    .select-link-additional {
        font-size: 12px;
        margin: 10px;
    }
</style>