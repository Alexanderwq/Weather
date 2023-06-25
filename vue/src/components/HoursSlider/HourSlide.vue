<template>
  <div class="hour-slide">
    <img :src="icon" class="hour-slide__img" alt="icon" />
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
    icon: {
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
  .hour-slide__temp{
    position: relative;
  }
  .hour-slide__temp:after {
    position: absolute;
    content: '';
    top: 2px;
    right: -10px;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    border: 2px solid #03a9f4;
  }
  .hour-slide__img{
    max-width: 45px;
  }
</style>

