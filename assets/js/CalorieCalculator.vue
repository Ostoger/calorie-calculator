<template>
  <div class="calculator-container">
    <div class="calculator-title">
      <h2>Calorie Calculator</h2>
    </div>
    <div class="calculator-total">
      {# here gonna be total #}
    </div>
  </div>
</template>

<script>
export default {
  name: "CalorieCalculator"
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
    }

    .calculator-title {
        width: 100%;
        text-align: center;
        height: 10%;
    }
</style>