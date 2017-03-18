<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Account;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function signup(Request $request) {
		$fullname 	= $request->input('fullname');
		$email 		= $request->input('email');
		$phone 		= $request->input('phone');
		$phone 		= $request->input('password');

		// Store data to Account.
		$accountData['account_name'] 		= $fullname;
		$accountData['account_email'] 		= $email;
		$accountData['account_phone'] 		= $phone;
		$accountData['account_birthdate'] 	= '';
		$accountStoreID						= DB::table('accounts')->insertGetId($accountData);

		if ($accountStoreID != false) {
			// Store data to User.
			$userModel 	= new User;
			$userModel->account_id 	= $accountStoreID;
			$userModel->user_name 	= $fullname;
			$userModel->user_email 	= $email;
			$userStoreData			= $userModel->save();

			if ($userStoreData != false) {
				// Return data json.
				return response()->json([
					'success' => 1, 
					'data' => $userStoreData,
					'message' => 'Success register user.'
				]);
			}
		}

		// Return data json.
		return response()->json([
			'success' => 0, 
			'message' => 'Failed register user.'
		]);
	}

	public function delete(Request $request) {

	}

	public function get(Request $request) {

	}

	public function getAll(Request $request) {

	}
}
