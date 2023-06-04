<template>
  <div>
    <WeatherSheet />
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import WeatherSheet from "@/components/WeatherSheet.vue";

export default defineComponent({
  name: 'App',
  components: {
    WeatherSheet,
  },
})
</script>

<style src="../src/assets/css/reset.css"></style>
