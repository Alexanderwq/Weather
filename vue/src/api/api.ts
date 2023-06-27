import axios from "axios";
import CityWeather from "../models/CityWeather";

export default {
    getCityWeather(city: string): Promise<CityWeather> {
        return axios.post('/get_weather_city',
            JSON.stringify({
                    city,
            }),
            {
                headers: {
                    'Content-Type': 'application/json'
                }
            }
        ).then(res => res.data);
    },
}