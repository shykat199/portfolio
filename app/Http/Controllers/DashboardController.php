<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'old_pass' => 'required',
            'new_pass' => 'required|min:8',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->old_pass, $user->password)) {

            return back()->withErrors(['old_pass' => 'The old password is incorrect.']);
        }

        $user->email = $request->email;
        $user->password = Hash::make($request->new_pass);
        $user->save();

        toast('Profile has been updated successfully.','success');
        return back();
    }

}
