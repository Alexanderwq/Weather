<template>
  <div class="content">
    <SearchBar />
    <template v-if="!showPreloader">
      <WeatherSheet />
      <SheetWeatherDays />
    </template>
    <MainPreloader class="preloader" v-else />
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import WeatherSheet from "./components/WeatherSheet/WeatherSheet.vue";
import SheetWeatherDays from "./components/SheetWeatherDays/SheetWeatherDays.vue";
import {mapActions, mapState} from "vuex";
import MainPreloader from "./components/Common/MainPreloader.vue";
import SearchBar from "./components/SearchBar/SearchBar.vue";

export default defineComponent({
  name: 'App',
  components: {
    WeatherSheet,
    SheetWeatherDays,
    MainPreloader,
    SearchBar,
  },

  computed: {
    ...mapState([
        'showPreloader',
    ]),
  },

  methods: {
    ...mapActions([
        'getCityWeather',
    ])
  },

  created() {
    this.getCityWeather('Ярославль')
        .catch(() => alert('Произошла ошибка'));
  },
})
</script>

<style src="./assets/css/reset.css"></style>
<style scoped>
  .content{
    max-width: 900px;
    margin: 0 auto;
    height: 100vh;
  }
</style>
<style>
  body {
    background: #eceef2;
  }
</style>