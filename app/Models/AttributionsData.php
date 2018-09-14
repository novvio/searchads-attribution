<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class AttributionsData extends Eloquent {
	public $timestamps = false;

	protected $table = 'attributions';
	protected $primaryKey = 'id';
	protected $fillable = ['device_id', 'campaign_name', 'campaign_id', 'adgroup_name', 'adgroup_id', 'keyword'];
}