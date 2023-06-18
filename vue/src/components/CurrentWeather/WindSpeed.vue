<template>
  <div class="wind-speed">
    <img class="wind-speed__icon" src="../../assets/images/wind.svg" alt="wind" />
    <p class="wind-speed__text">
      {{ getWindSpeed }} м/с
    </p>
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapState} from "vuex";

export default defineComponent({
  name: 'WindSpeed',

  computed: {
    ...mapState([
        'cityWeatherData',
    ]),
    getWindSpeed(): number {
      return Math.round(this.cityWeatherData.current.wind_kph / 3.6);
    },
  },
});
</script>

<style scoped>
  .wind-speed{
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .wind-speed__text{
    font-size: 18px;
  }
</style>