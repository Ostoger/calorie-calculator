<template>
    <div class="calculator-container">
        <div class="calculator-title calculator-modules">
            <h2>Calorie Calculator</h2>
        </div>
        <div v-if="isFoodAdded" class="calculator-modules">
            <TotalCalories></TotalCalories>
        </div>
        <div class="calculator-search-box calculator-modules">
            <CalculatorSearchBox></CalculatorSearchBox>
        </div>
        <div v-if="isCategoryChosen" class="calculator-modules">
            <SelectableFoods
                :selectable-foods="selectableFoods"
            ></SelectableFoods>
        </div>
        <div class="food-categories calculator-modules">
            <FoodCategories
                :food-categories="foodCategories"
                @selectable-foods="setSelectableFoods"
            ></FoodCategories>
        </div>
    </div>
</template>
<script>

import TotalCalories from "./TotalCalories";
import CalculatorSearchBox from "./CalculatorSearchBox";
import FoodCategories from "./FoodCategories";
import SelectableFoods from "./SelectableFoods";
import controlApi from "../api/control";

export default {
    name: "CalorieCalculator",
    components: {TotalCalories, CalculatorSearchBox, FoodCategories, SelectableFoods},
    data() {
        return {
            foodCategories: [],
            selectableFoods: null,
        }
    },
    created() {
       this.getFoodCategories();
    },
    computed: {
      isCategoryChosen() {
          return this.selectableFoods !== null;
      }
    },
    methods: {
        isFoodAdded() {
            return this.store.foodAddedCounter > 0;
        },
        getFoodCategories() {
            controlApi.postData('/calorie-calculator/get-food-categories')
                .then(foodCategoriesList => {
                    this.foodCategories = foodCategoriesList;
                })
                .catch(error => console.log(error));
        },
        setSelectableFoods(selectableFoods) {
            this.selectableFoods = selectableFoods;
        }
    },
}
</script>

<style>
.calculator-container {
    display: flex;
    width: 60%;
    height: 100%;
    justify-content: center;
    flex-wrap: wrap;
    align-content: start;
    background-color: #edf6ed;
}

.calculator-modules {
    width: 100%;
}

.calculator-title {
    text-align: center;
    height: 5%;
}

.calculator-search-box {
    height: 6%;
    margin-top: 5%;
}
</style>