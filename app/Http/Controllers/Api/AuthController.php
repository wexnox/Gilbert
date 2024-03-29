<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users', // Unique validation to prevent multiple users with same email.
            'password' => 'required|string|min:8|confirmed', // Confirmed validation to match the password confirmation.
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        // Use the sendResponse method for generating the response
        return $this->sendResponse(['token' => $token], 'User registered successfully');
    }

//    public function me()
//    {
//        $user = Auth::user();
//
//        return response()->json($user);
//    }
//
//    public function user(Request $request)
//    {
//        // Laravel's request helper can get the authenticated user using this method.
//        $user = $request->user();
//
//        // Return a subset of user's data that you want to expose.
//        return response()->json([
//            'name' => $user->name,
//            'email' => $user->email,
//        ]);
//    }

//    public function update(Request $request)
//    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|email|unique:users,email,' . Auth::id(), // Unique validation to prevent multiple users with same email, excluding the current user.
//            'password' => 'required|string|min:8|confirmed', // Confirmed validation to match the password confirmation.
//        ]);
//
//        $user = Auth::user();
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->password = Hash::make($request->password);
//        $user->save();
//
//        return response()->json(['message' => 'User updated successfully']);
//    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            // Use the sendError method for generating the error response
            return $this->sendError('The provided credentials are incorrect.', [], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        // Use the sendResponse method for generating the response
        return $this->sendResponse(['token' => $token], 'Login successful');
    }

    public function logout(Request $request)
    {
        Auth::user()->tokens()->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Using sendResponse to send the logout message
        return $this->sendResponse([], 'Logged out');
    }


}
