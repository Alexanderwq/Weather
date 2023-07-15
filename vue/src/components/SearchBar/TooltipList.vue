<template>
  <div class="search-tooltip">
    <TooltipGeoUnit
      v-for="(city, index) in citiesList"
      :key="index"
      :city="city"
    />
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapState} from "vuex";
import TooltipGeoUnit from "./TooltipGeoUnit.vue";

export default defineComponent({
  name: 'TooltipList',

  components: {
    TooltipGeoUnit,
  },

  computed: {
    ...mapState('search', [
        'citiesList',
    ]),
  },
})
</script>

<style scoped>
  .search-tooltip{
    position: absolute;
    bottom: 0;
    left: 0;
    background: #fff;
    transform: translateY(calc(100% + 10px));
    width: 100%;
    border-radius: 6px;
    padding: 10px 5px;
    z-index: 50;
  }
</style>