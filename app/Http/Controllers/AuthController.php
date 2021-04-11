<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return back()->withErrors(['login' => true]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function apiLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return $this->getUnauthorizedResponse();
        }
        
        if (!Hash::check($request->password, $user->password)) {
            return $this->getUnauthorizedResponse();
        }
        
        $token = $user->createToken('token');

        return ['token' => $token->plainTextToken];
    }

    private function getUnauthorizedResponse(): JsonResponse
    {
        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }
}
