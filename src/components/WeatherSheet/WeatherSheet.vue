<template>
  <div class="weather-sheet">
    <CurrentWeatherCity />
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import CurrentWeatherCity from "@/components/CurrentWeather/CurrentWeatherCity.vue";

export default defineComponent({
  name: 'WeatherSheet',
  components: {
    CurrentWeatherCity,
  },
})
</script>

<style scoped>
  .weather-sheet{
    display: grid;
    grid-template-columns: 1fr;
    justify-content: center;
    background: #03a9f4;
    border-radius: 8px;
    padding: 20px;
  }
</style>
