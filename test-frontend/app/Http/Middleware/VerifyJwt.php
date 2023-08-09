<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Token;

class VerifyJwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cookie = request()->cookie('X-AUTH-TOKEN');
        // dd($cookie);
        if (empty($cookie)) {
            return redirect()->route('logout');
            // Http::withHeaders([
            //     'accept' => 'application/json',
            //     'Authorization' => 'Bearer ' . request()->cookie('X-AUTH-TOKEN')
            // ])->post(env('HTTP_URL') . 'auth/logout');
        } else {
            try {
                //code...
                $token = new Token($cookie);
                // dd($token);
                JWTAuth::decode($token);
                return $next($request);
                // } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            } catch (\Throwable $th) {
                // throw $th;
                return redirect()->route('/');
            }
        }
    }
}
