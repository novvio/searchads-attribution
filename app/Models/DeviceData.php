<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class DeviceData extends Eloquent {
	public $timestamps = true;

	protected $table = 'devices';
	protected $primaryKey = 'id';
	protected $fillable = ['device_id', 'country', 'attribution_channel'];
	protected $hidden = ['id', 'device_id', 'updated_at'];
}