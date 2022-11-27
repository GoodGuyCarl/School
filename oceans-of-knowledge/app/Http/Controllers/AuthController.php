<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller {

    public function home(){
        return view('welcome');
    }

    public function index(){
        return view('login');
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
        return view('register');
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

        return redirect('login');
    }

    public function create(array $data){
        return User::create([
            'firstname' => $data['firstname'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function profile(){
        if (Auth::check()){
            return view('profile');
        }
        return redirect('/login');
    }

    public function signout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
