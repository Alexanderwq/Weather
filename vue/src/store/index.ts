import { createStore} from "vuex";
import api from "../api/api";
import CityWeather from "../models/CityWeather";

export default createStore({
    state: {
        cityWeatherData: {} as CityWeather,
        showPreloader: false,
    },
    getters: {},
    mutations: {
        setCityWeatherData(state, data: CityWeather) {
            state.cityWeatherData = data;
        },
        setPreloader(state, value) {
            state.showPreloader = value;
        },
    },
    actions: {
        async getCityWeather({ commit }) {
            commit('setPreloader', true);
            commit('setCityWeatherData', await api.getCityWeather());
            commit('setPreloader', false);
        },
    },
});