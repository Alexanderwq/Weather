<template>
  <li class="weather-day">
    <p class="weather-day__week">
      {{ getWeek }}
    </p>
    <p class="weather-day__date">
      {{ getDate }}
    </p>
    <p class="weather-day__temp">
      {{ weatherData.day.maxtemp_c }}
    </p>
  </li>
</template>

<script lang="ts">
import {defineComponent, PropType} from "vue";
import WeatherDayData from "@/models/WeatherDayData";

export default defineComponent({
  name: 'WeatherDay',
  props: {
    weatherData: {
      type: Object as PropType<WeatherDayData>,
      required: true,
    },
  },

  computed: {
    getWeek() {
      const weekDays = [
          'Пн',
          'Вт',
          'Ср',
          'Чт',
          'Пт',
          'Сб',
          'Вс',
      ];

      return weekDays[new Date(this.weatherData.date).getDay()];
    },

    getDate() {
      const months = [
          'января',
          'февраля',
          'марта',
          'апреля',
          'мая',
          'июня',
          'июля',
          'августа',
          'сентября',
          'октября',
          'ноября',
          'декабря',
      ];

      const currentDate = new Date(this.weatherData.date);

      return currentDate.getDate() + ' ' + months[currentDate.getMonth()];
    },
  },
})
</script>

<style scoped>
  .weather-day{
    padding: 10px;
    border-radius: 8px;
    box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
    background: #03a9f4;
    color: #fff;
  }

  .weather-day__week{
    font-weight: bold;
    text-transform: uppercase;
  }
</style>