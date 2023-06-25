<template>
  <ul class="weather-list">
    <WeatherDay
      v-for="weatherDay in cityWeatherData.forecast.forecastday"
      :weather-data="weatherDay"
      :key="weatherDay.date"
    />
  </ul>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapState} from "vuex";
import WeatherDay from "./WeatherDay.vue";

export default defineComponent({
  name: 'WeatherList',
  components: {
    WeatherDay,
  },

  computed: {
    ...mapState([
        'cityWeatherData',
    ]),
  },
})
</script>

<style scoped>
  .weather-list{
    display: flex;
    gap: 25px;
    align-items: center;
  }
</style>