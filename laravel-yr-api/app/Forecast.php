<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model {
	protected $fillable = [
		'country',
		'city',
		'from',
		'to',
		'temp',
		'windDir',
		'windSpeed',
		'pressure',

    ];
}
