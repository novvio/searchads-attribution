<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class PurchaseModel extends Eloquent {
	public $timestamps = true;
	const UPDATED_AT = null;

	protected $table = 'purchases';
	protected $primaryKey = 'id';
	protected $fillable = ['device_id', 'purchase_id', 'purchase_name', 'price'];
	protected $hidden = ['id', 'device_id', 'updated_at'];
}