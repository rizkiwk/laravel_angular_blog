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

	public function authRegister() {

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
