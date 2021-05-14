<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Model\Gif;
use App\Model\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use Auth;


class AuthController extends Controller
{
    use GeneralTrait;

    public function register(Request $r){
        try {
        $rules = [
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'name'=>'required',
        ];
        $validator = Validator::make($r->all(), $rules);

        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $user=User::create([
           'name'=>$r->name,
            'email'=>$r->email,
            'password'=>$r->password
        ]);
        return $this->returnData('user',$user);
        }catch (\Exception $ex){
            return $this->returnError($ex->getCode(),$ex->getMessage());
        }

    }

    public function login(Request $r){
        try {
            $rules = [
                'email' => 'required',
                'password' => 'required'
            ];
            $validator = Validator::make($r->all(), $rules);
            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            $data=$r->only(['email','password']);
            $token=Auth::guard('user-api')->attempt($data);

            if($token == null){
                return $this->returnError('e001','data not match to any results');
            }
            $user=Auth::guard('user-api')->user();
            $user->api_token=$token;
            return $this->returnData('user',$user);
        }catch (\Exception $ex){
            return $this->returnError($ex->getCode(),$ex->getMessage());
        }
    }

public function logout(Request $request)
{
    $token = $request->header('auth-token');
    if ($token) {
        try {
            JWTAuth::setToken($token)->invalidate(); //logout
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return $this->returnError('', 'some thing went wrongs');
        }
        return $this->returnSuccessMessage('Logged out successfully');
    } else {
        $this->returnError('', 'some thing went wrongs');
    }

}

    public function search(Request $request)
    {
        try{
        $keyword = isset($request->keyword) && $request->keyword != '' ? $request->keyword : null;
        if ($keyword != null) {
            $gifs = Gif::select('name','description');
            $gifs = $gifs->search($keyword, null, true);
            $gifs = $gifs->orderBy('id', 'desc')->get();
            return $this->returnData('search',$gifs);
        }
            return $this->returnData('search','NO Data Reach');


    }catch (\Exception $ex){
        return $this->returnError($ex->getCode(),$ex->getMessage());
    }
    }



}
