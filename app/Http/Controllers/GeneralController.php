<?php

namespace App\Http\Controllers;

use App\Model\Gif;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Cookie;
use Illuminate\Support\Facades\Http;

class GeneralController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function dashboard(){
        return view('dashboard');
    }
    public function reg(){
        return view('auth.register');
    }
    public function register(Request $r){
        try{
            $response = Http::post('http://localhost/ApiBrowser/public/api/user/register',[
                'email' => $r->email,
                'password' => $r->password,
                'name'=>$r->name
            ]);

            if($response->json()['errNum'] == 'S000') {
                return redirect()->route('getLogin')->with([
                    'alert-type'=>'success',
                    'message'=>'you registered'
                ]);
            }
            else
                return redirect()->back()->with(['message'=>$response->json()['msg']]);
        }catch (\Exception $ex){
            return redirect()->back()->with(['message'=>$ex->getMessage()]);
        }
    }
    public function log(){
        return view('auth.login');
    }
    public function login(Request $r){
        try{
            $response = Http::post('http://localhost/ApiBrowser/public/api/user/login',[
                'email' => $r->email,
                'password' => $r->password,
            ]);
            $res=$response->json();
            if($response->json()['errNum'] == 'S000') {
                $token=$res['user']['api_token'];
                $cookie = Cookie::make('token', $token, 120);
                Cookie::queue($cookie);
                return redirect()->route('dashboard')->with([
                    'alert-type'=>'success',
                    'message'=>'login success'
                ]);
            }
            else
                return redirect()->back()->with(['message'=>$response->json()['msg']]);
        }catch (\Exception $ex){
            return redirect()->back()->with(['message'=>$ex->getMessage()]);
        }
    }
    public function logout(){
        try {
            $token = Cookie::get('token');
            $response = Http::withHeaders(["auth-token" => $token])->post('localhost/ApiBrowser/public/api/user/logout');
            $cookie = Cookie::forget('token');
            return redirect()->route('getLogin');
        }catch (\Exception $ex){
            return redirect()->back()->with(['message'=>$ex->getMessage()]);
        }
    }

   public function search(Request $request){
       $token = Cookie::get('token');
       $response = Http::withHeaders(["auth-token" => $token])->post('http://localhost/ApiBrowser/public/api/user/search',[
           'keyword' => $request->keyword,
       ]);
      $data=$response->json()['search'];

       return view('search')->with(['data'=>$data]);

   }



}
