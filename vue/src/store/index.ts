import { createStore} from "vuex";
import api from "../api/api";
import CityWeather from "../models/CityWeather";

export default createStore({
    state: {
        cityWeatherData: {} as CityWeather,
        showPreloader: false,
    },
    getters: {
        getHoursForSlider(state) {
            const hoursCount = 24;
            const hours = state.cityWeatherData.forecast.forecastday
                .map(day => day.hour)
                .flat();

            return hours
                .filter(hourData => new Date(hourData.time) > new Date())
                .map(hourData => {
                    const date = new Date(hourData.time);
                    const hour = ('0'+date.getHours()).slice(-2);
                    const min = ('0'+date.getMinutes()).slice(-2);

                    return {
                        ...hourData,
                        time: hour + ':' + min,
                    }
                })
                .slice(0, hoursCount);
        },
    },
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