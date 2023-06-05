<template>
  <div class="weather-sheet-current__date">
    Сейчас {{ getLocalTime }}
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapState} from "vuex";

export default defineComponent({
  name: 'LocalTime',

  computed: {
    ...mapState([
        'cityWeatherData',
    ]),
    getLocalTime(): string {
      const date = new Date(this.cityWeatherData?.location?.localtime)
      return date.toLocaleTimeString().slice(0, 5)
    },
  },
})
</script>