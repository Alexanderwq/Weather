<template>
  <div class="search-bar">
    <input v-model="text" type="text" class="search-bar__input" placeholder="Введите название города" />
    <button class="search-bar__button" @click="searchCity(text)">
      Поиск
    </button>
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapActions} from "vuex";

export default defineComponent({
  name: 'SearchBar',

  data() {
    return {
      text: '',
    };
  },

  methods: {
    ...mapActions([
        'getCityWeather',
    ]),

    searchCity(city: string) {
      if (this.text.length < 3) {
        return alert('Введите больше 3 символов');
      }
      this.getCityWeather(city);
    },
  },
});
</script>

<style scoped>
  .search-bar{
    background: #03a9f4;
    border-radius: 6px;
    padding: 20px;
    margin-bottom: 40px;
    display: flex;
    gap: 20px;
    align-items: center;
  }

  .search-bar__input{
    border: none;
    outline: none;
    border-radius: 6px;
    padding: 5px 10px;
  }

  .search-bar__button{
    border-radius: 6px;
    color: #000;
    padding: 5px 10px;
    background: #fff;
    cursor: pointer;
    border: none;
  }
</style>