<template>
  <div class="temperature">
    {{ getTemperature }}
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapState} from "vuex";

export default defineComponent({
  name: 'WeatherTemperature',

  computed: {
    ...mapState([
        'cityWeatherData',
    ]),
    getTemperature(): string {
      const temperature = this.cityWeatherData.current.temp_c;
      const plus: string = (temperature > 0) ? '+' : '';
      return plus + '' + Math.round(temperature);
    },
  },
})
</script>

<style scoped>
  .temperature{
    position: relative;
    justify-self: left;
    font-weight: bold;
    font-size: 18px;
  }

  .temperature:after{
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