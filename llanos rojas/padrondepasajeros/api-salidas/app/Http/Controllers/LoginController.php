<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Firebase\JWT\JWT;
class LoginController extends Controller{
    public function login(Request $request)
    {
        $user=User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return responce()->json([
                'mensaje'=>'no hay user o contra correcta'

            ],401);
        }
        $key=env(JWT_SECRET);
        $alg=env(JWT_ALGORITHM);
        $payload=[
            'iat'=>time(),
            'exp'=>time()+3600,
            'data'=>['id'=>$user->id,'email'=>$user->email]
        ];
        $token=JWT::encode($payload,$key,$alg);
        return responce ()->json(['token'=>$token,'type'=>'bearer'],200);
    }

}
