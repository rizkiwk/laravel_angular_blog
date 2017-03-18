<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
	protected $table 		= 'accounts';
	protected $primaryKey 	= 'account_id';
	protected $connection 	= 'mysql';

	const CREATED_AT 		= 'created_at';
	const UPDATED_AT 		= 'updated_at';

	public function storeCallbackID($data) {

	}
}
