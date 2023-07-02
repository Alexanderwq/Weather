import axios from "axios";
import CityWeather from "../models/CityWeather";
import SearchCity from "../models/SearchCity";

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

    searchCities(city: string): Promise<SearchCity[]> {
        return axios.post('/search_cities', { city },
            {
                headers: {
                    'Content-Type': 'application/json'
                }
            }
        )
    }
}