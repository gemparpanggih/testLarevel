<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function actionRegister(Request $request)
    {
        $email = User::where('email', $request->email)->first();
        if ($email) {
            session()->flash('error', 'Email is already exists.');

            return redirect('/register');
        }

        if ($request->password == $request->confirm_password) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            session()->flash('success', 'Berhasil Membuat Akun!');

            return redirect('/register');

        } else {
            session()->flash('error', 'Ada yang salah nich!');

            return redirect('/register');
        }
    }

    public function loginView()
    {
        if (Auth::check()) {
            return redirect('/admin');
        } else {
            return view('login');
        }
    }
    public function indexView()
    {
        if (Auth::check()) {
            return redirect('/admin');
        } else {
            return view(
                'welcome'
            );
        }
    }

    public function registerView()
    {
        if (Auth::check()) {
            return redirect('/admin');
        } else {
            return view(
                'register'
            );
        }
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::Attempt($data)) {
            if (auth()->user()->role == 'admin') {
                return redirect('/admin');
            } else {
                return redirect('/');
            }
        } else {
            session()->flash('error', 'Email atau Password Salah');

            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flash('success', 'Berhasil Logout');
        return redirect('/');
    }

    public function index()
    {
        return view('user.tabel', [
            'users' => User::all(),
            'title' => 'User'
        ]);
    }

    public function hapus($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect('/tabel');
    }
}
