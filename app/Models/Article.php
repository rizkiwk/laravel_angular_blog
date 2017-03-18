<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table 		= 'articles';
	protected $primaryKey 	= 'article_id';
	protected $connection 	= 'mysql';

	const CREATED_AT 		= 'created_at';
	const UPDATED_AT 		= 'updated_at';
}
