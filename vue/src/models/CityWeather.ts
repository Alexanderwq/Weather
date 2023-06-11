import CityLocation from "./CityLocation";
import CurrentWeather from "./CurrentWeather";
import WeatherDayData from "./WeatherDayData";

export default interface CityWeather{
    current: CurrentWeather,
    location: CityLocation,
    forecast: {
        forecastday: WeatherDayData[],
    }
}
