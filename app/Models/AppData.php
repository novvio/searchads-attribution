<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class AppData extends Eloquent {
	public $timestamps = false;

	protected $table = 'applications';
	protected $primaryKey = 'id';
	protected $fillable = ['api_key'];
	protected $hidden = ['id', 'api_key'];
}