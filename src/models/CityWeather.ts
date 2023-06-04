import CityLocation from "@/models/CityLocation";
import CurrentWeather from "@/models/CurrentWeather";

export default interface CityWeather{
    current: CurrentWeather,
    location: CityLocation,
}
