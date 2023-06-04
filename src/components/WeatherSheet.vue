<template>
  <div class="weather-sheet">
    <div class="weather-sheet-day">
      <p class="weather-sheet-day__date">
        {{ cityWeatherData?.location?.name }}
      </p>
      <p class="weather-sheet-day__temperature">
        {{ cityWeatherData?.current?.temp_c }}
      </p>
    </div>
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapActions} from "vuex";
import CityWeather from "@/models/CityWeather";

export default defineComponent({
  name: 'WeatherSheet',

  data() {
    return {
      cityWeatherData: {} as CityWeather,
    }
  },

  methods: {
    ...mapActions([
        'getCityWeather',
    ]),
  },

  async created() {
    this.cityWeatherData = await this.getCityWeather();
  },
})
</script>

<style scoped>
  .weather-sheet{
    display: grid;
    grid-template-columns: 1fr 1fr;
    justify-content: center;
    background: #03a9f4;
    border-radius: 8px;
    padding: 20px;
  }
</style>
