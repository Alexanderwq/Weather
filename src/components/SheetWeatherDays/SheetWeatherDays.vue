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
import WeatherList from "@/components/SheetWeatherDays/WeatherList.vue";

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
  }

  .sheet-days__title{
    font-size: 18px;
    font-weight: bold;
  }
</style>