<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ExampleData extends Eloquent {
	public $timestamps = false;

	protected $primaryKey = 'id';
	protected $table = 'example';
	protected $fillable = ['name'];
}