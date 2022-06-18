<template>
    <div class="food-categories-container">
        <h4>Food Categories</h4>
        <div class="food-categories">
            <div id="food-categories-block">
                <ul class="food-categories-list">
                    <li id="food-categories-links" v-for="foodCategory in foodCategories">
                        <a class="categories-links" href="#" @click="getFoodsList(foodCategory)"> {{ foodCategory }} </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>

import controlApi from "../api/control";

export default {
    name: "foodCategories",
    props: {
        foodCategories: {
            type: Array,
            required: true
        }
    },
    methods: {
        getFoodsList(foodCategory) {
            controlApi.postData(
                '/calorie-calculator/get-category-foods',
                {
                    'categoryName': foodCategory,
                    'pageNumber': 1
                }).then(foodCategoryList => {
                this.$emit('selectableFoods', foodCategoryList)
            })
                .catch(error => console.log(error));
        }
    }
}

</script>
<style>
    .food-categories-container > h4 {
        padding-left: 20%;
        margin-top: 1%;
        margin-bottom: 1%;
    }

    .food-categories-container .food-categories{
        display: inline-block;
        width: 100%;
    }

    #food-categories-block {
        margin-left: 20%;
        margin-right: 20%;
    }

    .food-categories-list {
        align-content: start;
        column-count: 3;
        padding-left: 0;
        margin-top: 1%;
        width: 100%;
    }

    .categories-links {
        color: #013801;
    }

    ul {
        list-style-type: none;
    }

    #food-categories-links {
        margin-top: 5%;
    }
</style>
