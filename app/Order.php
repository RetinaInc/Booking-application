<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $fillable = [
	    'roomid',
	    'arrives',
	    'departures',
	    'name',
	    'phone',
	];

}
