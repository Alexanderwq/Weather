<template>
  <div class="weather-sheet-current">
    <WeatherCity
      class="weather-sheet-current-city"
    />
    <LocalTime
      class="weather-sheet-current-time"
    />
    <WeatherTemperature
      class="weather-sheet-current-temperature"
    />
    <WindSpeed />
    <WeatherHumidity />
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import WeatherHumidity from "./WeatherHumidity.vue";
import WeatherTemperature from "./WeatherTemperature.vue";
import LocalTime from "./LocalTime.vue";
import WeatherCity from "./WeatherCity.vue";
import WindSpeed from "./WindSpeed.vue";

export default defineComponent({
  name: 'CityCurrentWeather',

  components: {
    WindSpeed,
    WeatherHumidity,
    WeatherTemperature,
    LocalTime,
    WeatherCity,
  },
})
</script>

<style scoped>
  .weather-sheet-current{
    display: grid;
    grid-template-columns: repeat(4, auto) 1fr;
    column-gap: 20px;
    color: #fff;
  }

  .weather-sheet-current-city,
  .weather-sheet-current-time,
  .weather-sheet-current-temperature{
    grid-column: 1/6;
  }
</style>