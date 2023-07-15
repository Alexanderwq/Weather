<template>
  <div class="local-time">
    Сейчас <b>{{ getLocalTime }}</b>
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapGetters, mapState} from "vuex";

export default defineComponent({
  name: 'LocalTime',

  computed: {
    ...mapState([
        'cityWeatherData',
    ]),
    ...mapGetters([
        'getFormattedTime',
    ]),

    getLocalTime(): string {
      return this.getFormattedTime(new Date(this.cityWeatherData.location.localtime))
    },
  },
})
</script>