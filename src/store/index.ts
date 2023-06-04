import { createStore} from "vuex";
import api from "@/api/api";
import CityWeather from "@/models/CityWeather";

export default createStore({
    state: {
        cityWeatherData: {} as CityWeather,
    },
    getters: {},
    mutations: {
        setCityWeatherData(state, data: CityWeather) {
            state.cityWeatherData = data;
        },
    },
    actions: {
        async getCityWeather({ commit }) {
            commit('setCityWeatherData', await api.getCityWeather());
        },
    },
});