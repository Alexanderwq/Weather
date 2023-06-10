<template>
  <li class="weather-day">
    <p class="weather-day__week">
      {{ getWeek }}
    </p>
    <p class="weather-day__date">
      {{ getDate }}
    </p>
    <p class="weather-day__temp">
      {{ getTemp }}
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
    getWeek(): string {
      const weekDays: string[] = [
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

    getDate(): string {
      const months: string[] = [
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

    getTemp(): string {
      const temperature = this.weatherData.day.maxtemp_c;
      const plus: string = (temperature > 0) ? '+' : '';
      return plus + '' + Math.round(temperature);
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
    display: flex;
    flex-direction: column;
    align-items: start;
  }

  .weather-day__week{
    font-weight: bold;
    text-transform: uppercase;
  }

  .weather-day__temp{
    position: relative;
    font-weight: bold;
  }

  .weather-day__temp:after{
    position: absolute;
    content: '';
    top: 2px;
    right: -10px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    border: 2px solid #fff;
  }
</style>