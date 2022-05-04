<template>
    <div class="search-box">
        <form id="calorie-search-box">
            <input type="search" name="food_search" placeholder="Search for some food">
            <button>Search</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "CalculatorSearchBox"
}
</script>

<style scoped>

    #calorie-search-box {
        margin-left: 20%;
        margin-right: 20%;
    }

    #calorie-search-box > input {
        width: 85%;
    }

    #calorie-search-box > button {
        width: 15%;
    }

</style>