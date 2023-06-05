<template>
  <div class="content">
    <WeatherSheet />
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import WeatherSheet from "@/components/WeatherSheet/WeatherSheet.vue";

export default defineComponent({
  name: 'App',
  components: {
    WeatherSheet,
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