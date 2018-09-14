<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class SearchAdsData extends Eloquent {
	public $timestamps = false;

	protected $table = 'searchads';
	protected $primaryKey = 'id';
	protected $fillable = ['device_id', 'campaign_name', 'campaign_id', 'adgroup_name', 'adgroup_id', 'keyword'];
}