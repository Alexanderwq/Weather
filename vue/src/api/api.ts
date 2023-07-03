import axios, {AxiosResponse} from "axios";
import CityWeather from "../models/CityWeather";

export default {
    getCityWeather(city: string): Promise<CityWeather> {
        return axios.post('/get_weather_city', { city },
            {
                headers: {
                    'Content-Type': 'application/json'
                }
            }
        ).then(res => res.data);
    },

    searchCities(city: string): Promise<AxiosResponse> {
        return axios.post('/search_cities', { city },
            {
                headers: {
                    'Content-Type': 'application/json'
                }
            }
        )
    }
}