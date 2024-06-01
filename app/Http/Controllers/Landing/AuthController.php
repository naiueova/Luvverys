<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('landing-page.account.login');
    }

    public function register()
    {
        return view('landing-page.account.register');
    }

    public function auth(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            // if (session()->has('url.intended')) {
            //     return redirect(session())->get('url.intended');
            // }
            return redirect()->route('account.profile');
        } else {
            return redirect()->route('account.login')->with('error', 'Email or Password incorrect');
        }
    }

    public function profile()
    {
        return view('landing-page.account.my_account');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login')
        ->with('success', 'Logout successfully');
    }

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
