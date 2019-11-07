<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApiTokenController extends Controller
{
    /**
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function update(Request $request)
    {
        $token = Str::random(80);

        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return ['token' => $token];
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (User::where('email', $request->get('email'))->exists()) {

            $user = User::where('email', $request->get('email'))->first();
            $auth = Hash::check($request->get('password'), $user->password);
            if ($user && $auth) {
                $user->rollApiKey();

                return response()->json([
                    'error' => false,
                    'data' => $user,
                    'message' => 'Authorization Successful!',
                ], 200);
            }
        }

        return response()->json([
            'message' => 'Unauthorized, check your credentials.',
        ], 401);
    }

    public function register(Request $request) {
        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(80),
        ]);

        return response()->json([
            'error' => false,
            'data' => $user,
        ], 200);
    }
}
