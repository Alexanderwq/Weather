import CityLocation from "@/models/CityLocation";
import CurrentWeather from "@/models/CurrentWeather";
import WeatherDayData from "@/models/WeatherDayData";

export default interface CityWeather{
    current: CurrentWeather,
    location: CityLocation,
    forecast: {
        forecastday: WeatherDayData[],
    }
}
