<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Parser;

class apicontroller extends Controller
{
    public function forecast(Request $request)
    {
        //Grab the XML file based on the URL given
        	$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_URL => "http://www.yr.no/place/" . substr($request->path(), 13) . "/forecast.xml"));
			$forecast = curl_exec($ch);
			curl_close($ch);
        
        //Parse the xml file into an php array for easy storing
        $forecastArray = Parser::xml($forecast);
        
        //Make the model and store it
        

//dd($forecastArray);
$forecast = $forecastArray;
        return view('forecast.show', compact('forecast'));
    }
}
