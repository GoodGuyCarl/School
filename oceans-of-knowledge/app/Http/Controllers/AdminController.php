<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard() {
        if(Auth::check() && Auth::user()->role == 1){
            return view('admin/dashboard');
        }
        else {
            return redirect('/login');
        }
    }
    public function records(){
        if(Auth::check() && Auth::user()->role == 1){
            $users = DB::table('users')->where('role', '=', 0)->get();
            return view('admin/records', ['users' => $users]);
        }
        elseif(Auth::check() && Auth::user()->role == 2){
            $users = DB::table('users')->where('year_level', '=', Auth::user()->year_level)->where('role', 0)->get();
            return view('admin/records', ['users' => $users]);
        }
        else {
            return redirect('/login');
        }
    }
    public function edit($id){

        $user = User::find($id);
        if(Auth::user()->role==1)
            return view('admin/edit-profile', ['user' => $user]);
        else {
            return redirect('/login');
        }
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->fill([
            'firstname' => $request->firstname,
            'surname' => $request->surname,
            'year_level' => $request->year_level,
            'vaccination_status' => $request->vaccination_status,
            'enrollment_date' => $request->enrollment_date,
        ]);
        $user->save();

        return redirect('/records')->with('message', 'Record successfully updated!');
    }
    public function delete_staff($id){
        $user = User::find($id);

        $user->delete();

        return redirect('/staff')->with('message', 'Record successfully deleted!');
    }
    public function delete_student($id){
        $user = User::find($id);

        $user->delete();

        return redirect('/records')->with('message', 'Record successfully deleted!');
    }
    public function staff(){
        if(Auth::check() && Auth::user()->role == 1){
            $users = DB::table('users')->where('role', '=', 2)->get();
            return view('admin/records', ['users' => $users]);
        }
        else {
            return redirect('/login');
        }
    }
}
