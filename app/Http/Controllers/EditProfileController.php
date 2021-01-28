<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findorfail($id);
        return view('backend.profile.edit', compact('users'));
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
        if ($request->input('password') && $request->hasFile('avatar')) {
            $rules = [
                'name' => 'required', 'string', 'max:255',
                'gender' => 'required',
                'dateofbirth' => 'required',
                'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
                'password' => 'string', 'min:8',
                'avatar' => 'image',
                'province' => 'required',
                'city' => 'required',
            ];
        } else if ($request->input('password')) {
            $rules = [
                'name' => 'required', 'string', 'max:255',
                'gender' => 'required',
                'dateofbirth' => 'required',
                'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
                'password' => 'string', 'min:8',
                'province' => 'required',
                'city' => 'required',
            ];
        } else if ($request->hasFile('avatar')) {
            $rules = [
                'name' => 'required', 'string', 'max:255',
                'gender' => 'required',
                'dateofbirth' => 'required',
                'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
                'avatar' => 'image',
                'province' => 'required',
                'city' => 'required',
            ];
        } else {
            $rules = [
                'name' => 'required', 'string', 'max:255',
                'gender' => 'required',
                'dateofbirth' => 'required',
                'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
                'province' => 'required',
                'city' => 'required',
            ];
        }

        $request->validate($rules);

        if ($request->input('password') && $request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $new_avatar = time() . $avatar->getClientOriginalName();
            $avatar->move('upload/profilephoto/', $new_avatar);
            $user_data = [
                'name' => $request->name,
                'gender' => $request->gender,
                'dateofbirth' => $request->dateofbirth,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'avatar' => $new_avatar,
                'province' => $request->province,
                'city' => $request->city,
            ];
        } else if ($request->input('password')) {
            $user_data = [
                'name' => $request->name,
                'gender' => $request->gender,
                'dateofbirth' => $request->dateofbirth,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'province' => $request->province,
                'city' => $request->city,
            ];
        } else if ($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $new_avatar = time() . $avatar->getClientOriginalName();
            $avatar->move('upload/profilephoto/', $new_avatar);
            $user_data = [
                'name' => $request->name,
                'gender' => $request->gender,
                'dateofbirth' => $request->dateofbirth,
                'email' => $request->email,
                'avatar' => $new_avatar,
                'province' => $request->province,
                'city' => $request->city,
            ];
        } else {
            $user_data = [
                'name' => $request->name,
                'gender' => $request->gender,
                'dateofbirth' => $request->dateofbirth,
                'email' => $request->email,
                'province' => $request->province,
                'city' => $request->city,
            ];
        }

        User::whereId($id)->update($user_data);

        return redirect('/home')->with('success', 'Profil Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
