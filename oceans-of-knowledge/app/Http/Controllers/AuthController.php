<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller {

    public function home(){
        if (Auth::check()){
            return redirect('/profile');
        }
        else {
            return view('users/welcome');
        }
    }

    public function index(){
        if (Auth::check()){
            return redirect('/profile');
        }
        else {
            return view('users/login');
        }
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/profile')
                ->with('success', 'You are successfully logged in!');
        }
        return redirect('/login')->with('message', 'Login details are invalid');
    }

    public function signup(){
        return view('users/register-user');
    }

    public function register(Request $request){
        $request->validate([
            'firstname' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        $data = $request->all();
        $check = $this->create($data);

        return redirect('login')->with('register_success', 'Successfully registered!');
    }

    public function create(array $data){
        return User::create([
            'role' => $data['role'],
            'firstname' => $data['firstname'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'year_level' => $data['year_level'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function signout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
    public function register_teacher(){
        return view('users/register-teacher');
    }
}
