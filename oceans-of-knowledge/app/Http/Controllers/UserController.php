<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function profile()
    {
        if (Auth::check()) {
            if(Auth::user()->role != 1){
                $students = DB::table('users')->where('role', 1);
                if (Auth::user()->role == 0){
                    return view('users/profile');
                }
                else {
                    return view('users/profile', ['students' => $students]);
                }
            } else{
                return redirect('/dashboard');
            }
        } else {
            return redirect('/login');
        }
    }

    public function edit_profile()
    {
        if (Auth::check()) {
            return view('users/edit-profile');
        } else {
            return redirect('/login');
        }
    }

    public function update(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);

        $user->fill([
            'firstname' => $request->firstname,
            'surname' => $request->surname,
            'year_level' => $request->year_level,
            'vaccination_status' => $request->vaccination_status,
        ]);
        $user->save();

        return redirect('/profile')->with('message', 'Profile successfully updated!');
    }
}
