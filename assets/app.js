/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

import { createApp } from "vue";
import CalorieCalculator from './js/components/CalorieCalculator.vue';
import {createPinia} from "pinia/dist/pinia";

const pinia = createPinia();

const calorieCalculator = createApp(CalorieCalculator);
calorieCalculator.use(pinia);
calorieCalculator.mount('#calorie-calculator');

// start the Stimulus application
//import './bootstrap';
