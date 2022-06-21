<?php

namespace App\Http\Controllers\Backend\Admin;

use App\User;
use App\Role;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','asc')->get();
        $roles = Role::all();
        return view('backend.pages.user.manage', compact('users','roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( Gate::denies('superAdmin') ){
            return back();
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'cpassword' => 'required',
            'roles' => 'required'
        ]);

        if( $request->password == $request->cpassword ){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->roles()->sync($request->roles);
            $request->session()->flash('create','Created successfully');
            return back();
        }
        else{
            $request->session()->flash('passnotmatch','Password not matched');
            return back();
        }
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
    public function edit(User $user)
    {
        if( Gate::denies('superAdmin') ){
            return back();
        }
        $roles = Role::all();
        return view('backend.pages.user.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('user.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        
        $user->roles()->detach();
        $user->delete();
        return back();
    }


    public function profileedit(User $user){
        return view('backend.pages.user.editProfile', compact('user'));
    }

    public function updateProfile(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required'
            ]
        );

        $user->name         = $request->name;
        $user->email        = $request->email;

        if ($request->image) {
            if (File::exists('images/profile/' . $user->image)) {
                File::delete('images/profile/' . $user->image);
            }
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/profile/' . $img);
            Image::make($image)->save($location);
            $user->image = $img;
        }
        $user->save();

        //write success message
        $request->session()->flash('update', ' Profile updated Successfully');

        return back();
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate(
            [
                'oldpassword' => 'required',
                'newpassword' => 'required',
                'cnewpassword' => 'required',
            ]
        );


        if (Hash::check($request->oldpassword, $user->password)) {

            if ($request->newpassword == $request->cnewpassword) {
                $user->password         = Hash::make($request->cnewpassword);
                $user->save();
                $request->session()->flash('passupdatesuccess', 'Password updated');
                return back();
                exit();
            } else {
                $request->session()->flash('updatePassNotMatch', 'New Password and confirm new password are not matched');
                return back();
                exit();
            }
        } else {
            $request->session()->flash('oldpassnotmatch', 'Old password not matched please try again');
            return back();
        }
    }

    public function deleteProfile(Request $request, User $user)
    {
        $request->validate(
            [
                'password' => 'required',
            ]
        );

        if (Hash::check($request->password, $user->password)) {
            if (File::exists('images/profile/' . $user->image)) {
                File::delete('images/profile/' . $user->image);
            }
            $user->roles()->detach();
            $user->delete();
            return redirect()->route('register')->with('deleteSuccess', 'Account deleted Successfully. register new admin from here');
        } else {
            $request->session()->flash('deleteFailed', 'Please enter correct password to delete your account');
            return back();
        }
    }
    
    public function resetPass(Request $request, User $user){
        $request->validate(
            [
                'password' => 'required',
                'cpassword' => 'required',
            ]
        );
        if( $request->password != $request->cpassword ){
            $request->session()->flash('resetfailed','Password did not matched');
            return back();
        }
        else{
            $user->password = Hash::make($request->cpassword);
            $user->save();
             $request->session()->flash('reset','Password reset successfully');
            return back();
        
        }
    }


}
