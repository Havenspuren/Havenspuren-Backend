<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   
    public function index()
    {
    }

    public function showLoginForm()
    {   
        return view('loginForm');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        return Auth::attempt($credentials) ? redirect('/') : back()->withErrors(['email' => 'E-Mail oder Password sind inkorrekt!'])->onlyInput('email');
        
    }

    public function logout(Request $request) {

        auth()->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Du wurdest erfolgreich ausgeloggt!');

    }

    public function store(Request $request)
    {   
        /*
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $cookie = cookie('myCookie', $token);

        if (!$request->expectsJson()) {

            return redirect()->route('routes.index')->withCookie($cookie) ;       
        } 

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201)->withCookie($cookie);
        */
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
