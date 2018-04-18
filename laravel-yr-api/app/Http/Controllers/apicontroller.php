<?php

namespace App\Http\Controllers;

use App\Forecast;
use Illuminate\Http\Request;
use Parser;

class apicontroller extends Controller
{
    public function forecast(Request $request)
    {
        //Grab the XML file based on the URL given (Probably deserves it's own function/command/job)
        	$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_URL => "http://www.yr.no/place/" . substr($request->path(), 13) . "/forecast.xml"));
			$forecast = curl_exec($ch);
			curl_close($ch);
        
        //Parse the xml file into a php array for easy storing
        $forecastArray = Parser::xml($forecast);
        
        //Make the model and store it
foreach($forecastArray['forecast']['tabular']['time'] as $forecastTime){
	$forecast = new Forecast();
	$forecast->country = $forecastArray['location']['country'];
	$forecast->city = $forecastArray['location']['name'];
	$forecast->from = $forecastTime['@from'];
	$forecast->to = $forecastTime['@to'];
	$forecast->temp = $forecastTime['temperature']['@value'];
	$forecast->windDir = $forecastTime['windDirection']['@name'];
	$forecast->windSpeed = $forecastTime['windSpeed']['@name'];
	$forecast->pressure = $forecastTime['pressure']['@value'];

	$forecast->save();
}

//dd($forecastArray);
$forecast = $forecastArray;
        return view('forecast.show', compact('forecast'));
    }
}
