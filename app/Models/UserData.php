<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class UserData extends Eloquent {
	public $timestamps = false;

	protected $table = 'applications';
	protected $primaryKey = 'id';
	protected $fillable = ['api_key', 'app_name', 'package_name', 'appstore_id'];
	protected $hidden = ['id'];
}