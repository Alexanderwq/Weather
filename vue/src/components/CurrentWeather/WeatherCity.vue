<template>
  <div class="city">
    {{ cityWeatherData.location.name }}
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapState} from "vuex";

export default defineComponent({
  name: 'WeatherCity',

  computed: {
    ...mapState([
        'cityWeatherData',
    ]),
  },
})
</script>

<style scoped>
  .city{
    font-size: 20px;
    font-weight: bold;
  }
</style>