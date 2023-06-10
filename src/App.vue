<template>
  <div class="content">
    <WeatherSheet />
    <SheetWeatherDays />
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import WeatherSheet from "@/components/WeatherSheet/WeatherSheet.vue";
import SheetWeatherDays from "@/components/SheetWeatherDays/SheetWeatherDays.vue";

export default defineComponent({
  name: 'App',
  components: {
    WeatherSheet,
    SheetWeatherDays,
  },
})
</script>

<style src="../src/assets/css/reset.css"></style>
<style scoped>
  .content{
    max-width: 900px;
    margin: 0 auto;
  }
</style>
<style>
body {
  background: #eceef2;
}
</style>