<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class AuthController extends Controller
{
    function register(RegisterUserRequest $request) {
        $validated = $request->validated();

        try {
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            return redirect()
            ->route('showLogin')
            ->with('success', 'Usuario creado exitosamente. Por favor, inicie sesión.');

        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Ocurrió un error en el proceso de crear usuario: ' . $e->getMessage()])->withInput();
        }
    }
}
