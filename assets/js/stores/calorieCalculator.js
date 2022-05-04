import {defineStore} from "pinia";

export const useCalorieCalculatorStore  = defineStore({
    id: "calorieCalculator",
    state: () => ({
        foodAddedCounter: 0
    }),
    actions: {
        increment(val = 1) {
            this.foodAddedCounter += val;
        },
    }
});