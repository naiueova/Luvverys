<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('landing-page.account.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view('landing-page.account.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function auth(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            if (session()->has('url.intended')) {
                return redirect(session())->get('url.intended');
            }
            return redirect()->route('account.profile');
        } else {
            return redirect()->route('account.login')->with('error', 'Email or Password incorrect');
        }
    }

    /**
     * Display the specified resource.
     */
    public function profile()
    {
        return view('landing-page.account.my_account');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login')
        ->with('success', 'Logout successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function storeRegister(Request $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
        ]);

        User::create($data);
        session()->flash('success', 'You have been registered succesfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
