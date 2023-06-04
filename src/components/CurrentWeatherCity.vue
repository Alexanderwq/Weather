<template>
  <div class="weather-sheet-current">
    <p class="weather-sheet-current__city">
      {{ cityWeatherData?.location?.name }}
    </p>
    <p class="weather-sheet-current__date">
      Сейчас {{ cityWeatherData?.location?.localtime }}
    </p>
    <p class="weather-sheet-current__temperature">
      {{ cityWeatherData?.current?.temp_c }}
    </p>
    <p class="weather-sheet-current__wind-speed">
      {{ cityWeatherData?.current?.wind_kph }}
    </p>
    <p class="weather-sheet-current__humidity">
      {{ cityWeatherData?.current?.humidity }}
    </p>
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapActions, mapState} from "vuex";

export default defineComponent({
  name: 'CityCurrentWeather',

  computed: {
    ...mapState([
        'cityWeatherData',
    ]),
  },

  methods: {
    ...mapActions([
      'getCityWeather',
    ]),
  },

  created() {
    this.getCityWeather();
  },
})
</script>

<style scoped>
  .weather-sheet-current{
    display: grid;
    grid-template-columns: repeat(4, auto) 1fr;
    column-gap: 20px;
  }

  .weather-sheet-current__city,
  .weather-sheet-current__date,
  .weather-sheet-current__temperature{
    grid-column: 1/6;
  }
</style>