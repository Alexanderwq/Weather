import ForecastDay from "@/models/ForecastDay";

export default interface WeatherDayData{
    date: string,
    day: ForecastDay,
    hour: string,
}