<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class ProfileController extends Controller
{
    public function index() {
        return view('profile.index');
    }


    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'gender' => 'required'
        ]);

        User::where('id', auth()->user()->id)
            ->update($request->except('_token'));

        return redirect()->back()->with('message', 'Profile updated successfully.');
    }

    
    public function profilePic(Request $request) {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('/profile');
            $image->move($destination, $name);

            $user = User::where('id', auth()->user()->id)
                ->update(['image' => $name]);

            unlink(public_path('profile\\' . auth()->user()->image));

            return redirect()->back()->with('message', 'Profile image updated successfully.');
        }
    }
}
