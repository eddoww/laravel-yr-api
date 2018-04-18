<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model {
	protected $fillable = [
		'title',
		'body',
		'from',
		'to',
		'eventType',
		'type',

    ];
}
