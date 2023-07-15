<template>
  <div class="weather-sheet">
    <CurrentWeatherCity />
    <HoursSlider />
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import CurrentWeatherCity from "../CurrentWeather/CurrentWeatherCity.vue";
import HoursSlider from "../HoursSlider/HoursSlider.vue";

export default defineComponent({
  name: 'WeatherSheet',
  components: {
    CurrentWeatherCity,
    HoursSlider,
  },
})
</script>

<style scoped>
  .weather-sheet{
    display: grid;
    grid-template-columns: 1fr 2fr;
    justify-content: center;
    background: #03a9f4;
    border-radius: 8px;
    padding: 20px;
    border: rgba(10,37,64,0.1);
    box-shadow: 0 0 2px 0 rgba(0,8,50,0.04),0 2px 4px 0 rgba(0,8,50,0.04),0 3px 12px 1px rgba(0,8,50,0.08);
  }
</style>
