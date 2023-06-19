<template>
  <Swiper
      class="hours-slider"
      :slides-per-view="'auto'"
      :grab-cursor="true"
  >
    <SwiperSlide
      v-for="(data, index) in getHoursForSlider"
      :key="index"
    >
      <HourSlide
          :time="data.time"
          :temp="data.temp_c"
      />
    </SwiperSlide>
  </Swiper>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import HourSlide from "./HourSlide.vue";
import {mapGetters} from "vuex";
import {Swiper, SwiperSlide} from 'swiper/vue';
import 'swiper/css';

export default defineComponent({
  name: 'HoursSlider',
  components: {
    HourSlide,
    Swiper,
    SwiperSlide,
  },

  computed: {
    ...mapGetters([
        'getHoursForSlider',
    ]),
  },
})
</script>

<style scoped>
  .hours-slider{
    max-width: 350px;
    align-self: center;
  }
  .swiper-slide{
    max-width: 50px;
    padding: 0 20px;
  }
</style>