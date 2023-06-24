<template>
  <div class="hours-slider-wrapper">
    <Swiper
      :slides-per-view="6"
      :space-between="30"
      ref="slider"
      @swiper="onSwiper"
    >
      <SwiperSlide v-for="(data, index) in getHoursForSlider" :key="index">
        <HourSlide
            :time="data.time"
            :temp="data.temp_c"
        />
      </SwiperSlide>
    </Swiper>
    <div class="hours-slider__button_prev" @click="slidePrev">
      <img class="hours-slider__arrow_prev" src="/vue/src/assets/svg/arrow.svg" alt="arrow" />
    </div>
    <div class="hours-slider__button_next" @click="slideNext">
      <img class="hours-slider__arrow_next" src="/vue/src/assets/svg/arrow.svg" alt="arrow" />
    </div>
  </div>
</template>

<script lang="ts">
import {DefineComponent, defineComponent} from "vue";
import HourSlide from "./HourSlide.vue";
import {mapGetters} from "vuex";
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';

export default defineComponent({
  name: 'HoursSlider',
  components: {
    HourSlide,
    Swiper,
    SwiperSlide,
  },

  data() {
    return {
      options: {
        slidesPerView: 10,
      },
      swiper: {},
    };
  },

  computed: {
    ...mapGetters([
        'getHoursForSlider',
    ]),
  },

  methods: {
    slideNext() {
      (this.swiper as DefineComponent).slideNext()
    },
    slidePrev(){
      (this.swiper as DefineComponent).slidePrev()
    },
    onSwiper(swiper: DefineComponent) {
      this.swiper = swiper;
    },
  }
})
</script>

<style scoped>
  .hours-slider-wrapper{
    position: relative;
    align-self: center;
    max-width: 500px;
    width: 100%;
  }
  .hours-slider__button_prev,
  .hours-slider__button_next{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    z-index: 100;
  }
  .hours-slider__button_prev{
    left: -40px;
  }
  .hours-slider__arrow_prev{
    transform: rotate(270deg);
  }
  .hours-slider__arrow_next{
    transform: rotate(90deg);
  }
  .hours-slider__button_next{
    right: -40px;
  }
</style>