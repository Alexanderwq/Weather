<template>
  <div class="hour-slide">
    <div class="hour-slide__time">
      {{ time }}
    </div>
    <div class="hour-slide__temp">
      {{ getFormattedTemp }}
    </div>
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";

export default defineComponent({
  name: 'HourSlide',
  props: {
    time: {
      type: String,
      required: true,
    },
    temp: {
      type: String,
      required: true,
    },
  },

  computed: {
    getFormattedTemp() {
      return Math.round(Number(this.temp));
    },
  },
})
</script>

<style scoped>
  .hour-slide{
    color: #03a9f4;
    background: #fff;
    font-weight: bold;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
  }
</style>

