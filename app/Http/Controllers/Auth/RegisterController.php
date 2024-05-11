<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function viewRegister()
    {
        return view('Auth.Register');
    }

    public function prosesRegister(Request $request)
    {
        try {
            $validasiData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);
            $validasiData['password'] = Hash::make($validasiData['password']);
            User::create($validasiData);
            $request->session()->flash('success','Registration successful!');
            return redirect('/');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors(['registration_error' => 'Registration failed. Please tyr again']);
        }
    }
}
