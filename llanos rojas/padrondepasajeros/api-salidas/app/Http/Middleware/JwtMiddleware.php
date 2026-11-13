<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
class JwtMiddleware{
    public function handle (Request $request, Closure $next){
        $authHeader=$request->header('Authorization');
        if(!$authHeader|| !str_starts_with ($authHeader,'Bearer')){
            return responce()->json([
                'mensaje'=>'token invalido'

            ],401);
        }
        $jwt=substr($authHeader,7);
        $key=env('JWT_SECRET');
        $alg=env('JWT_ALGORITHM');
        try{
            $decoded=JWT::decode($jwt, new Key($key,$alg));

        }catch(\Throwable $e){
            return responce()->json([
                'mensaje'=>'token invalido'

            ],401);

        }
        $request->attributes->add(['usuario'=>$decoded->data]);
        return $next ($request);

    }
}