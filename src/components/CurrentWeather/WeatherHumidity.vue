<template>
  <div class="humidity">
    <img class="humidity__icon" src="../../assets/images/humidity.svg" alt="humidity" />
    <p class="humidity__text">
      {{ cityWeatherData?.current?.humidity }}%
    </p>
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapState} from "vuex";

export default defineComponent({
  name: 'WeatherHumidity',

  computed: {
    ...mapState([
      'cityWeatherData',
    ]),
  },
});
</script>

<style scoped>
.humidity{
  display: flex;
  align-items: center;
  gap: 10px;
}

.humidity{
  font-size: 18px;
}
</style>