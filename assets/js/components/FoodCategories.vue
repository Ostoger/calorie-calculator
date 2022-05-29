<template>
    <div class="food-categories-container">
        <h4>Food Categories</h4>
        <div class="food-categories">
            <div id="food-categories-block">
                <ul class="food-categories-list">
                    <li id="food-categories-links" v-for="foodCategory in foodCategories">
                        <a class="categories-links" href="#" v-on:click="getFoodsList(foodCategory)"> {{ foodCategory }} </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "foodCategories",
    props: {
        foodCategories: {
            type: Array,
            required: true
        }
    },
    methods: {
        async getFoodsList(foodCategory) {
            try {
                const response = await fetch('/calorie-calculator/get-category-foods', {
                    method: 'POST',
                    headers: {
                         'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                            'categoryName': foodCategory,
                            'pageNumber': 1
                        }
                    ),
                });

                const result = await response.json();
                console.log(result);

            } catch (e) {
                console.error(e);
            }
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
