<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table 		= 'users';
	protected $primaryKey 	= 'user_id';
	protected $connection 	= 'mysql';

	const CREATED_AT 		= 'created_at';
	const UPDATED_AT 		= 'updated_at';
}
