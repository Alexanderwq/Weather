import axios from "axios";
import CityWeather from "../models/CityWeather";

export default {
    getCityWeather(): Promise<CityWeather> {
        return axios.post('/get_current_weather',
            JSON.stringify({
                    city: 'Ярославль',
            }),
            {
                headers: {
                    'Content-Type': 'application/json'
                }
            }
        ).then(res => res.data);
    },
}