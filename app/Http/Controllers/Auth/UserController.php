<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Config;
use App\Token;
use Request as Requests;

class UserController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $d = Token::find(1);
        //dd($d->toArray());
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            //'name' => 'required|max:255',
            ////'email' => 'required|email|max:255|unique:users'
            'email' => 'required|email|max:255',
            //'password' => 'required|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return view('auth.login')->withErrors($validator->errors());
        }
        $user = User::where('email', $request->email)->first();
        if ($user->exists()) {
            $password = $user->password;
            $input_password = $request->password;
            if (Hash::check($input_password, $password)) {
                $user_id = $user->id;
                $cache = Config::get('cache.default');
                if ($cache == 'redis') {

                } else {
                    $result['_token'] = $this->createToken($user_id);
                    return redirect()->route('admin');
                }
            } else {
                return view('auth.login')->withErrors('The password confirmation does not match.');
            }
        } else {
            return view('auth.login')->withErrors('The email does not match.');
        }
    }

    protected function createToken($user_id)
    {
        $userToken = new Token();
        $data = time() . rand();
        $token = sha1($data);
        $userToken->user_id = $user_id;
        $userToken->token = $token;
        $userToken->user_ip = Requests::getClientIp();
        $userToken->created_at = date('Y-m-d H:i:s', time());
        $userToken->last_access_at = date('Y-m-d H:i:s', time());
        $userToken->save();
        return $userToken;
    }

    public function destory(Request $request, $id){
        $userToken = Token::findOrFail($id);
        if ($userToken) {
            $userToken->delete();
            return view('auth.login');
        }
    }
}
