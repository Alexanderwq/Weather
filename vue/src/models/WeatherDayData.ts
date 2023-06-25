import ForecastDay from "./ForecastDay";
import HourData from "./HourData";

export default interface WeatherDayData{
    date: string,
    day: ForecastDay,
    hour: HourData[],
}