<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\validation\Rule;

use App\Mail\Websitemail;

use App\Models\Author;

use Hash;
use Auth;

class AdminAuthorController extends Controller
{
    
    public function show() {

        $authors = Author::get();

        return view('admin.author_show', compact('authors'));

    }


    public function create() {

        return view('admin.author_create');

    }


    public function store(Request $request) {

        $author = new Author();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:authors',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        if ($request->hasFile('photo')) {

            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            $now = time();

            $ext = $request->file('photo')->extension();
            $final_name = 'author_photo_' . $now . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $author->photo = $final_name;

        } else {

            $author->photo = 'default.png';

        }

        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->token = '';
        $author->save();

        // Send Email
        $subject = 'Account Confirmation';
        $message = 'Your account is created successfully. Continue to the following link: <br><br>';
        $message .= '<a href="' . route('login') . '">';
        $message .= 'Click here to log in.';
        $message .= '</a>';

        \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('admin_author_show')->with('success', 'Author is created successfully.');

    }


    public function edit($id) {

        $author_data = Author::where('id', $id)->first();

        return view('admin.author_edit', compact('author_data'));

    }


    public function update(Request $request, $id) {
        
        $author_data = Author::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('authors')->ignore($author_data->id)
            ]
        ]);

        if ($request->password != '') {

            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);

            $author_data->password = Hash::make($request->password);

        }

        if ($request->hasFile('photo')) {

            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if ($author_data->photo != 'default.png') {

                unlink(public_path('uploads/' . $author_data->photo));

            }

            $now = time();

            $ext = $request->file('photo')->extension();
            $final_name = 'author_photo_' . $now . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $author_data->photo = $final_name;

        }

        $author_data->name = $request->name;

        $author_data->email = $request->email;

        $author_data->update();

        return redirect()->route('admin_author_show')->with('success', 'Author data updated successfully.');

    }


    public function delete($id) {

        $author_data = Author::where('id', $id)->first();

        if ($author_data->photo != 'default.png') {

            unlink(public_path('uploads/' . $author_data->photo));

        }

        $author_data->delete();

        return redirect()->route('admin_author_show')->with('success', 'Author is deleted successfully.');

    }

}
