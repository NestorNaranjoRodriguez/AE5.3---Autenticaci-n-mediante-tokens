<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Registro;

class UserController extends Controller
{

    public function showForm()
    {
        return view('form_user');
    }


    public function login(Request $request)
    {
   
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); 
            return redirect()->intended('/dashboard')
                             ->with('success', '¡Inicio de sesión exitoso!');
        }

      
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users'],
            'password' => ['required','string','min:6','confirmed'],
        ]);

        $user = \App\Models\User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Guardar en tabla 'registros' en lugar de fichero
        Registro::create([
            'nombre'   => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        \Auth::login($user);

        return redirect()->route('welcome')->with('success', '¡Registro exitoso! Bienvenido.');
    }

    public function logout(Request $request)
    {
        \Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // ya no se escribe en fichero; los datos se guardaron en la tabla 'registros' al registrarse

        return redirect('/')->with('success', 'Has cerrado sesión correctamente.');
    }
}
