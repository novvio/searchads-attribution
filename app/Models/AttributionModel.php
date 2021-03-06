<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class AttributionModel extends Eloquent {
	public $timestamps = true;

	protected $table = 'attributions';
	protected $primaryKey = 'id';
	protected $fillable = ['device_id', 'campaign_name', 'campaign_id', 'adgroup_name', 'adgroup_id', 'keyword'];
	protected $hidden = ['id', 'device_id', 'updated_at'];
}