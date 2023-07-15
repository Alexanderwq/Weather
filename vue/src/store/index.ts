import { createStore} from "vuex";
import api from "../api/api";
import CityWeather from "../models/CityWeather";
import search from "./modules/search";

export default createStore({
    modules: {
        search,
    },

    state: {
        cityWeatherData: {} as CityWeather,
        showPreloader: false,
    },
    getters: {
        getFormattedTime: () => (time: Date) => {
            const hour = ('0' + time.getHours()).slice(-2);
            const min = ('0' + time.getMinutes()).slice(-2);

            return hour + ':' + min;
        },

        getHoursForSlider(state, getters) {
            const hoursCount = 24;
            const currentLocalTime = state.cityWeatherData.location.localtime
            const hours = state.cityWeatherData.forecast.forecastday
                .map(day => day.hour)
                .flat();

            return hours
                .filter(hourData => new Date(hourData.time) > new Date(currentLocalTime))
                .map(hourData => {
                    return {
                        ...hourData,
                        time: getters.getFormattedTime(new Date(hourData.time))
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
        async getCityWeather({ commit }, city: string) {
            commit('setPreloader', true);
            commit('setCityWeatherData', await api.getCityWeather(city));
            commit('setPreloader', false);
        },
    },
});