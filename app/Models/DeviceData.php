<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class DeviceData extends Eloquent {
	public $timestamps = false;

	protected $table = 'devices';
	protected $primaryKey = 'id';
	protected $fillable = ['device_id', 'country', 'attribution_channel'];
}