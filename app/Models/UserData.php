<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class UserData extends Eloquent {
	public $timestamps = false;

	protected $table = 'applications';
	protected $primaryKey = 'id';
	protected $fillable = ['api_key'];
	protected $hidden = ['id'];
}