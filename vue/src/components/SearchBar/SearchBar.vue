<template>
  <div class="search-bar">
    <input v-model="search" type="text" class="search-bar__input" placeholder="Введите название города" />
    <button class="search-bar__button" @click="searchCity(search)">
      Поиск
    </button>
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapActions, mapMutations, mapState} from "vuex";

export default defineComponent({
  name: 'SearchBar',

  computed: {
    ...mapState('search', {
      searchFromStore: 'search',
    }),

    search: {
      get(): string {
        return this.searchFromStore;
      },
      set(value): void {
        this.setSearch(value);
      },
    }
  },

  methods: {
    ...mapMutations('search', [
        'setSearch',
    ]),
    ...mapActions([
        'getCityWeather',
    ]),
    ...mapActions('search', [
        'searchCities',
    ]),

    searchCity(city: string) {
      const NOT_FOUND_CODE = 1006;

      if (this.search.length < 3) {
        return alert('Введите больше 3 символов');
      }
      this.getCityWeather(city)
          .catch((error) => {
            if (error.response?.data.error.code === NOT_FOUND_CODE) {
              alert('Город не найден')
            } else{
              alert('Произошла ошибка при получении города!')
            }
          });
    },
  },

  watch: {
    search(newValue) {
      if (newValue.length >= 3) {
        this.searchCities(newValue);
      }
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