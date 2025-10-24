<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class AuthController extends Controller
{
    public function showLogin () {
        if (!is_null(session('user'))) {
            return redirect()->route('tasks.index');
        }

        return view('login');
    }

    public function showRegister () {
        if (!is_null(session('user'))) {
            return redirect()->route('tasks.index');
        }

        return view('register');
    }

    public function register(RegisterUserRequest $request) {
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

    public function login(LoginUserRequest $request) {
        $validated = $request->validated();

        try {
            $user = User::where('email', $validated['email'])->first();

            if (!$user) {
                return back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
            }

            if (!$user || !Hash::check($validated['password'], $user->password)) {
                return back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
            }

            session(['user' => $user]);

            return redirect()->route('tasks.index')->with('success', '¡Bienvenido!');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Ocurrió un error al intentar iniciar sesión: ' . $e->getMessage()])->withInput();
        }
    }

    public function logout () {
        # Cerrar sesión
        session()->forget('user');
        return redirect()->route('showLogin');
    }
}
