<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Province;
use App\Models\City;

class AdminController extends Controller
{
   
    public function dashboard(){
        if(auth()->user()->roles()->pluck('id')->implode(', ') == '2'){
            return redirect()->route('admin.get_profile');
        }else{
            return view('admin.dashboard.dashboard'); 
        }
        
    }
    public function users(){
        $users = User::latest()->get();
        return view('admin.users.users', compact('users')); 
    }
    public function clients(){
        $clients = RoleUser::where('role_id', 2)->get();
        return view('admin.clients.clients', compact('clients')); 
    }
    public function client(User $user){
        return view('admin.clients.client', compact('user')); 
    }
    public function set_status(Request $request, User $user){
        $user->update([
            'status' => $request->input('status'),
            'remarks' => $request->input('remarks'),
        ]);
        return response()->json(['success' => 'Successfully updated!']);
    }
    public function reports(){
        return view('admin.reports.reports'); 
    }
    
}
