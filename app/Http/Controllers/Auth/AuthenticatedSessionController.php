<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function loginIndex()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        if (Auth::attempt(array('email' =>  $request->email, 'password' => $request->password))) {

            return redirect(route('index'));
        } else {

            return redirect()->back()->with('message', 'Wrong email and password.');
        }

        // return ;
    }


    public function registerIndex()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $fileName = now() . '.' . $image->getClientOriginalExtension();
            $directoryName = public_path("uploads/");

            if (!file_exists($directoryName)) {
                mkdir($directoryName);
            }

            $image->move($directoryName, $fileName);
            $user->image = $fileName;
        }

        $user->save();

        // return $request;
        return redirect(route('login'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
