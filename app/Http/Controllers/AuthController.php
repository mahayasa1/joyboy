<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 🔹 Halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 🔹 Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            // Ambil role sesudah login
            $role = Auth::user()->role;

            if ($role === 'admin') {
                return redirect()->route('dashboard')->with('success', 'Selamat datang, Admin!');
            } elseif ($role === 'user') {
                return redirect()->route('landing-page')->with('success', 'Selamat datang, ' . $user->nama_lengkap . '!');
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors(['role' => 'Role tidak valid.']);
            }
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    // 🔹 Halaman register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // 🔹 Proses register
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'nama_lengkap' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        // Default role = user
        $user = User::create([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('landing-page')->with('success', 'Registrasi berhasil!');
    }

    // 🔹 Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Berhasil logout.');
    }
}
