<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\Websitemail;

use App\Models\Page;
use App\Models\Author;

use Hash;
use Auth;

class LoginController extends Controller
{

    public function index() {

        $page_data = Page::where('id', 1)->first();

        return view('front.login', compact('page_data'));

    }


    public function login_submit(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('author')->attempt($credential)) {

            return redirect()->route('author_home');

        } else {

            return redirect()->route('login')->with('error', 'Invalid credentials.');

        }

    }


    public function logout() {

        Auth::guard('author')->logout();

        return redirect()->route('login');

    }


    public function forgot_password() {

        return view('front.forgot_password');

    }

    public function forgot_password_submit(Request $request) {

        $request->validate([
            'email' => 'required|email'
        ]);

        $author_data = Author::where('email', $request->email)->first();

        if (!$author_data) {

            return redirect()->back()->with('error', 'Email address not found.');

        }

        $token = hash('sha256', time());

        $author_data->token = $token;
        $author_data->update();

        $reset_link = url('reset-password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br>';
        $message .= '<a href="' . $reset_link . '">Click here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('login')->with('success', 'Password Reset email has been sent. Please check your inbox.');

    }


    public function reset_password($token, $email) {

        $author_data = Author::where('token', $token)->where('email', $email)->first();

        if (!$author_data) {

            return redirect()->route('login');

        }

        return view('front.reset_password', compact('token', 'email'));
    
    }

    public function reset_password_submit(Request $request) {

        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $author_data = Author::where('token', $request->token)->where('email', $request->email)->first();

        $author_data->password = Hash::make($request->password);
        $author_data->token = '';
        $author_data->update();

        return redirect()->route('login')->with('success', 'Password changed successfully. You can now log in.');

    }

}
