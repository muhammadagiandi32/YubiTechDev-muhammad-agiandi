<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $response = Http::post(env('HTTP_URL') . 'auth/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);
        if ($response['http_status_code'] == 200) {
            // return redirect()->back()->with('success',  $response['message']);
            Cookie::queue('X-AUTH-TOKEN', $response['access_token'], $response['expires_in']);
            Cookie::queue('USER', json_encode($response['user']), $response['expires_in']);

            return redirect()->route('user-index');
        }
    }
    public function logout()
    {
        //
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . request()->cookie('X-AUTH-TOKEN')
        ])->post(env('HTTP_URL') . 'auth/logout');
        Cookie::queue(Cookie::forget('X-AUTH-TOKEN'));
        Cookie::queue(Cookie::forget('USER'));

        return redirect('auth/login');
    }
    public function register(Request $request)
    {
        return view('auth.register');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd(env('HTTP_URL') . 'auth/register');
        $response = Http::post(env('HTTP_URL') . 'auth/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);
        if ($response['http_status_code'] == 201) {
            return redirect()->back()->with('success',  $response['message']);
        }
        $errors = [];
        foreach (json_decode($response['error']) as $error) {
            $errors =  $error;
        }
        return redirect()->back()->with('errors',  $errors);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
