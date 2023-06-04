import axios from "axios";
import { url, apiKey } from "@/api/consts";
import CityWeather from "@/models/CityWeather";

export default {
    getCityWeather(): Promise<CityWeather> {
        return axios.get(url + '/forecast.json', {
            params: {
                key: apiKey,
                q: 'Ярославль',
                days: 10,
            },
        }).then(res => res.data);
    },
}