<?php

namespace App\Http\Controllers;

use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{

	public function store(Request $request) {
		$article 	= new Article;

		$article->save();
	}

	public function delete(Request $request) {

	}

	public function get(Request $request) {

	}

	public function getAll(Request $request) {

	}

}
