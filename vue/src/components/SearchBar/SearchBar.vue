<template>
  <div class="search-bar">
    <div class="search-bar-wrapper-input">
      <input v-model="search" type="text" class="search-bar__input" placeholder="Введите название города" />
      <TooltipList
        v-if="visibleSearchTooltip"
      />
    </div>
    <button class="search-bar__button" @click="searchCity(search)">
      Поиск
    </button>
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapActions, mapMutations, mapState} from "vuex";
import TooltipList from "./TooltipList.vue";

export default defineComponent({
  name: 'SearchBar',

  components: {
    TooltipList,
  },

  computed: {
    ...mapState('search', {
      searchFromStore: 'search',
    }),
    ...mapState('search', [
        'citiesList',
    ]),

    visibleSearchTooltip(): boolean {
      return this.citiesList.length !== 0 && this.search.length > 3;
    },

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
      this.setSearch('')
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
    border-radius: 0 0 6px 6px;
    padding: 20px;
    margin-bottom: 40px;
    display: flex;
    gap: 20px;
    align-items: center;
    border: rgba(10,37,64,0.1);
    box-shadow: 0 0 2px 0 rgba(0,8,50,0.04),0 2px 4px 0 rgba(0,8,50,0.04),0 3px 12px 1px rgba(0,8,50,0.08);
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

  .search-bar-wrapper-input{
    position: relative;
  }
</style>