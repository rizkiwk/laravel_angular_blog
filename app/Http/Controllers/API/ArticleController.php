<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{

	public function storeData(Request $request) {
		$title 			= $request->input('title');
		$description 	= $request->input('description');
		$author_id 		= $request->input('uid');

		$articleModel					= new Article;
		$articleModel->user_id			= $author_id;
		$articleModel->article_title	= $title;
		$articleModel->article_text		= $description;
		$articleStore					= $articleModel->save();

		if (!$articleStore) {
			// Return data json.
			return response()->json([
				'success' => 0, 
				'message' => 'Failed store data article.'
			]);
		}

		// Return data json.
		return response()->json([
			'success' => 1, 
			'data' => $articleStore,
			'message' => 'Success store data article.'
		]);

		return response()->json(['status' => $articleStore]);
	}

	public function getListData(Request $request) {
		$userID 		= $request->input('uid');
		$viewType 		= $request->input('view_type');
		$articleModels 	= new Article;

		if (empty($userID)) {
			$articles = $articleModels
					    ->orderBy('created_at')
					    ->take(10)
					    ->get();
		} else {
			$articles = $articleModels
					  	->where('user_id', $userID)
					  	->orderBy('created_at')
					  	->take(10)
					  	->get();
		}

		// Check if error articles.
		if (!$articles) {
			// Return data json.
			return response()->json([
				'success' => 0, 
				'message' => 'Failed get all data article.'
			]);
		}

		if (!empty($viewType) && $viewType == 'thumbnail') {
			$articles['article_text']	= $articles['article_text']; 
		}

		// Return data json.
		return response()->json([
			'success' => 1, 
			'data' => $articles,
			'message' => 'Success get all data article.'
		]);
	}

	public function getDetailData(Request $request) {
		
	}

}
