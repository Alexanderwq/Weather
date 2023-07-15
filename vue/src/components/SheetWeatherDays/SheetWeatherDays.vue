<template>
  <div class="sheet-days">
    <p class="sheet-days__title">
      Ближайшие дни
    </p>
    <WeatherList />
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import WeatherList from "./WeatherList.vue";

export default defineComponent({
  name: 'SheetWeatherDays',
  components: {
    WeatherList,
  },
})
</script>

<style scoped>
  .sheet-days{
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    margin-top: 40px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    border: rgba(10,37,64,0.1);
    box-shadow: 0 0 2px 0 rgba(0,8,50,0.04),0 2px 4px 0 rgba(0,8,50,0.04),0 3px 12px 1px rgba(0,8,50,0.08);
  }

  .sheet-days__title{
    font-size: 18px;
    font-weight: bold;
  }
</style>