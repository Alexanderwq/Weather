<template>
  <div class="geo-unit">
    <p class="geo-unit__text" @click="getCity" >
      {{ city.name }}, {{ city.region }}
    </p>
  </div>
</template>

<script lang="ts">
import {defineComponent, PropType} from "vue";
import SearchCity from "../../models/SearchCity";
import {mapActions, mapMutations} from "vuex";

export default defineComponent({
  name: 'TooltipGeoUnit',
  props: {
    city: {
      type: Object as PropType<SearchCity>,
    }
  },

  methods: {
    ...mapMutations('search', [
        'setSearch',
    ]),
    ...mapActions([
        'getCityWeather',
    ]),

    getCity() {
      this.getCityWeather(this.city?.url)
      this.setSearch('')
    },
  },
})
</script>

<style scoped>
  .geo-unit__text{
    cursor: pointer;
    padding: 0 5px;
    border-radius: 5px;
  }

  .geo-unit__text:hover{
    background: #eceef2;
  }
</style>