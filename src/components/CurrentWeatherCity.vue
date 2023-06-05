<template>
  <div class="weather-sheet-current">
    <p class="weather-sheet-current__city">
      {{ cityWeatherData?.location?.name }}
    </p>
    <p class="weather-sheet-current__date">
      Сейчас {{ getLocalTime }}
    </p>
    <p class="weather-sheet-current__temperature">
      {{ getTemperature }}
    </p>
    <p class="weather-sheet-current__wind-speed">
      {{ getWindSpeed }} м/с
    </p>
    <p class="weather-sheet-current__humidity">
      {{ cityWeatherData?.current?.humidity }}%
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

    getLocalTime(): string {
      const date = new Date(this.cityWeatherData?.location?.localtime)
      return date.toLocaleTimeString().slice(0, 5)
    },

    getTemperature(): string {
      const temperature = this.cityWeatherData?.current?.temp_c;
      const plus: string = (temperature > 0) ? '+' : '';
      return plus + '' + Math.round(temperature);
    },

    getWindSpeed(): number {
      return Math.round(this.cityWeatherData?.current?.wind_kph / 3.6);
    },
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
    color: #fff;
  }

  .weather-sheet-current__city,
  .weather-sheet-current__date,
  .weather-sheet-current__temperature{
    grid-column: 1/6;
  }

  .weather-sheet-current__temperature{
    position: relative;
    justify-self: left;
    font-weight: bold;
  }

  .weather-sheet-current__temperature:after{
    position: absolute;
    content: '';
    top: 2px;
    right: -10px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    border: 2px solid #fff;
  }
</style>