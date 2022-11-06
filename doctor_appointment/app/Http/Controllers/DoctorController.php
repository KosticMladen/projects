<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\validation\Rule;

use App\Models\User;
use App\Models\Role;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(\Auth::user()->role->name);
        $users = User::where('role_id', '!=', 3)->get();
        $roles = Role::get();
        return view('admin.doctor.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStore($request);
        $data = $request->all();
        // $name = (new User)->userAvatar($request);
        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destination = public_path('/profile');
        $image->move($destination, $name);

        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('doctor.index')->with('message', 'User added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->id == $id) {
            return redirect()->route('doctor.index');
        }
        $user = User::find($id);
        return view('admin.doctor.delete', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.doctor.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validateUpdate($request, $id, $user);
        
        $data = $request->all();
        $imageName = $user->image;
        $userPassword = $user->password;
        
        if ($request->hasFile('image')) {
            $imageName = (new User)->userAvatar($request);
            unlink(public_path('profile/' . $user->image));
        }

        $data['image'] = $imageName;

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $userPassword;
        }

        $user->update($data);

        return redirect()->route('doctor.index')->with('message', 'User updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->id == $id) {
            return redirect()->route('doctor.index');
        }

        $user = User::find($id);
        $userDelete = $user->delete();

        if ($userDelete) {
            unlink(public_path('images/' . $user->image));
        }

        return redirect()->route('doctor.index')->with('message', 'User deleted successfully.');
    }

    public function validateStore($request) {
        return $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:25',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png',
            'role_id' => 'required',
            'description' => 'required'
        ]);
    }

    public function validateUpdate($request, $id, $user) {
        return $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            // 'email' => 'required|unique:users,email' . $id,
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png',
            'role_id' => 'required',
            'description' => 'required'
        ]);
    }
}

