<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class PurchaseData extends Eloquent {
	public $timestamps = true;

	protected $table = 'purchases';
	protected $primaryKey = 'id';
	protected $fillable = ['device_id', 'purchase_id', 'purchase_name', 'price'];
}