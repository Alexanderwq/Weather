<template>
  <div class="weather-sheet">
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
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapActions, mapState} from "vuex";

export default defineComponent({
  name: 'WeatherSheet',

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
  .weather-sheet{
    display: grid;
    grid-template-columns: 1fr;
    justify-content: center;
    background: #03a9f4;
    border-radius: 8px;
    padding: 20px;
  }

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
