<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class UserModel extends Eloquent {
	public $timestamps = false;

	protected $table = 'users';
	protected $primaryKey = 'id';
	protected $fillable = ['username', 'password'];
	protected $hidden = ['password'];
}