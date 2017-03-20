<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

	protected $user;

	public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

	public function authRegister(Request $request) {
		$data['name'] 			= $request->input('name');
		$data['email'] 			= $request->input('email');
		$data['password'] 		= $request->input('password');
		$data['re_password'] 	= $request->input('password_confirmation');

		$userModel = new User;
		$userModel->name 		= $data['name'];
		$userModel->email 		= $data['email'];
		$userModel->password 	= bcrypt($data['password']);
		$userStore				= $userModel->save();

        if ($userStore) {
        	// Return data json.
        	return response()->json([
				'success' => 1, 
				'data' => $userStore,
				'message' => 'Success authentication registration.'
			]);
        }

        // Return data json.
		return response()->json([
			'success' => 0, 
			'message' => 'Failed authentication registration.'
		]);
	}

	public function authLogin(Request $request) {
		$email 		= $request->input('email');
		$password 	= $request->input('password');
		if (Auth::attempt(['email' => $email, 'password' => $password], true)) {
            // Authentication passed...
            // return redirect()->intended('dashboard');
            
            Auth::guard('web')->login(Auth::user());

            if (Auth::check()) {
            	// Return data json.
				return response()->json([
					'success' => 1, 
					'data' => Auth::user(),
					'message' => 'Success authentication login.'
				]);
            }
        }

        // Return data json.
		return response()->json([
			'success' => 0, 
			'message' => 'Failed authentication login.'
		]);
	}

	public function authLogout() {
		Auth::logout();
	}

}
