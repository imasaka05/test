<?php
/**
 * OpenWeatherMap-PHP-API — An php api to parse weather data from http://www.OpenWeatherMap.org .
 *
 * @license MIT
 *
 * Please see the LICENSE file distributed with this source code for further
 * information regarding copyright and licensing.
 *
 * Please visit the following links to read about the usage policies and the license of OpenWeatherMap before using this class.
 * @see http://www.OpenWeatherMap.org
 * @see http://www.OpenWeatherMap.org/about
 * @see http://www.OpenWeatherMap.org/copyright
 * @see http://openweathermap.org/appid
 */

use cmfcmf\OpenWeatherMap;
use cmfcmf\OpenWeatherMap\Exception as OWMException;

require('cmfcmf/OpenWeatherMap.php');

// Language of data (try your own language here!):
$lang = 'en';

// Units (can be 'metric' or 'imperial' [default]):
$units = 'metric';

// Get OpenWeatherMap object. Don't use caching (take a look into Example_Cache.php to see how it works).
$owm = new OpenWeatherMap();

// Example 1: Get forecast for the next 10 days for Berlin.
$lat = 35.0042;
$lon = 135.4601;
$coordinates = array("lat" => $lat, "lon" => $lon);

$forecast = $owm->getWeatherForecast($coordinates, $units, $lang, '02786acb97edb99d29b7e4623046b476', 7);
//echo "WeatherForecast<hr />\n";
//echo "City: " . $forecast->city->name;
//echo "<br />\n";
//echo "LastUpdate: " . $forecast->lastUpdate->format('d.m.Y H:i');
//echo "<br />\n";
//echo "<br />\n";

//$array = array('WF_date' => $forecast->time->day->format('d.m.Y'),'WF_city' => $forecast->city->name,'WF_Weather' => $forecast->weather,'WF_Temp' => $forecast ->temperature,'WF_MinTemp' => $forecast ->temperature->min,'WF_MaxTemp' => $forecast ->temperature->max);
//$array = array('WF_MinTemp' => $forecast->temperature->min);

print_r($forecast['forecasts:cmfcmf\OpenWeatherMap\Forecast:private'][0]);

/*
foreach($forecast as $weather) {
    // Each $weather contains a cmfcmf\ForecastWeather object which is almost the same as the cmfcmf\Weather object.
    // Take a look into 'Examples_Current.php' to see the available options.
    echo "Weather forecast at " . $weather->time->day->format('d.m.Y') . " from " . $weather->time->from->format('H:i') . " to " .  $weather->time->to->format('H:i');
    echo "<br />\n";
    echo "Temperature: " .$weather->temperature;
    echo "<br />\n";
    echo "Minimum: " . $weather->temperature->min;
    echo "<br />\n";
    echo "Max: " . $weather->temperature->max;
    echo "<br />\n";
    echo "Weather: " .$weather->weather;
    echo "<br />\n";
    echo "Precipation: " . $weather->precipitation->getDescription() . " (" . $weather->precipitation . ")";
    echo "<br />\n";
    echo "---";
    echo "<br />\n";
}

// Example 2: Get forecast for the next 3 days for Berlin.
/*
$forecast = $owm->getWeatherForecast('Berlin', $units, $lang, '', 3);
echo "EXAMPLE 2<hr />\n\n\n";

foreach($forecast as $weather) {
    echo "Weather forecast at " . $weather->time->day->format('d.m.Y') . " from " . $weather->time->from->format('H:i') . " to " .  $weather->time->to->format('H:i') . "<br />";
    echo $weather->temperature . "<br />";
    echo "---<br />";
}
*/