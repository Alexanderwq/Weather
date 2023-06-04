import { createStore} from "vuex";
import api from "@/api/api";
import CityWeather from "@/models/CityWeather";

export default createStore({
    state: {},
    getters: {},
    mutations: {},
    actions: {
        async getCityWeather(): Promise<CityWeather> {
            return await api.getCityWeather();
        },
    },
});