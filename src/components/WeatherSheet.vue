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

</style>
