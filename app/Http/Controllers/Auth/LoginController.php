<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\PersonalDetail;
use App\Models\BusinessDetail;
use Auth;
use App\Notifications\TwoFactorCode;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath(){
		if(auth()->user()->roles()->pluck('id')->implode(', ') == '1'){;  
			return route('admin.dashboard');
		}else if(auth()->user()->roles()->pluck('id')->implode(', ') == '2'){
			return route('admin.profile', ['user' => auth()->user()->id]);
		}
    }

    public function facebookLogin(Request $request){

    	$checkUser = User::where('social_id',$request->uid)->first();

    	if($checkUser){
    		Auth::loginUsingId($checkUser->id, true);
    		return response()->json([
    			"status" => "success"
    		]);
    	}else{
    		$user = new User;
    		$user->social_id = $request->uid;
    		$user->email = $request->email;
    		$user->provider = "facebook";
    		$user->save();
			RoleUser::insert([
				'user_id' => $user->id,
				'role_id' => 2,
			]);
			PersonalDetail::create([
				'user_id' => $user->id,
				'name'	  => $request->displayName,
				'mobile_number' => $request->phoneNumber,
			]);
			BusinessDetail::create([
				'user_id' => $user->id,
			]);
			Auth::loginUsingId($checkUser->id, true);
    		return response()->json([
    			"status" => "success"
    		]);
			
    	}
    }

    public function googleLogin(Request $request){
    	$checkUser = User::where('social_id',$request->uid)->first();
    	if($checkUser){
    		Auth::loginUsingId($checkUser->id, true);
    		return response()->json([
    			"status" => "success"
    		]);
    	}else{
    		$user = new User;
    		$user->social_id = $request->uid;
    		$user->email = $request->email;
    		$user->provider = "google";
    		$user->save();
			RoleUser::insert([
				'user_id' => $user->id,
				'role_id' => 2,
			]);
			PersonalDetail::create([
				'user_id' => $user->id,
				'name'	  => $request->displayName,
				'mobile_number' => $request->phoneNumber,
			]);
			BusinessDetail::create([
				'user_id' => $user->id,
			]);
    		Auth::loginUsingId($user->id, true);
    		return response()->json([
    			"status" => "success"
    		]);
    	}
    }

	// protected function authenticated(Request $request, $user)
    // {
    //     $user->generateTwoFactorCode();
    //     $user->notify(new TwoFactorCode());
    // }
}
