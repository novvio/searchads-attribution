<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class AppModel extends Eloquent {
	public $timestamps = false;

	protected $table = 'applications';
	protected $primaryKey = 'id';
	protected $fillable = ['api_key', 'app_name', 'package_name', 'appstore_id', 'user_id'];
	protected $hidden = ['id', 'user_id'];
}