<template>
    <div class="calculator-container">
        <div class="calculator-title calculator-modules">
            <h2>Calorie Calculator</h2>
        </div>
        <div v-if="isFoodAdded" class="calculator-total calculator-modules">
            <TotalCalories></TotalCalories>
        </div>
        <div class="calculator-search-box calculator-modules">
            <CalculatorSearchBox></CalculatorSearchBox>
        </div>
        <div class="food-categories calculator-modules">
            <FoodCategories></FoodCategories>
        </div>
    </div>
</template>
<script>

import TotalCalories from "./TotalCalories";
import CalculatorSearchBox from "./CalculatorSearchBox";
import FoodCategories from "./FoodCategories";

export default {
    name: "CalorieCalculator",
    components: {TotalCalories, CalculatorSearchBox, FoodCategories},
    methods: {
        isFoodAdded() {
            return this.store.foodAddedCounter > 0;
        }
    },
}
</script>

<style scoped>
.calculator-container {
    display: flex;
    width: 60%;
    height: 100%;
    justify-content: center;
    flex-wrap: wrap;
    align-content: start;
    background-color: #d9ead9;
}

.calculator-modules {
    width: 100%;
}

.calculator-title {
    text-align: center;
    height: 5%;
}

.calculator-total {
}

.calculator-search-box {
    height: 10%;
    margin-top: 5%;
}
</style>