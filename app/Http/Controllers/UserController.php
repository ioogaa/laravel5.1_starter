<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Profile;
use Validator;
use Input;
use Bican\Roles\Models\Role;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($role=null)
    {
      if($role == null){
        return redirect()->back();
      }
      $role = Role::with('users')->where('name', $role)->first();//get user with specific role
      $users = $role->users;
      return view('user.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('id','desc')->get();
        return view('user.create',['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'name' => 'required|max:255',
          'email' => 'required|unique:users|email',
          'password' => 'required',
          'password_confirmation' => 'required|same:password',
          'role' => 'required'
      ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $user->attachRole($request->role);
        return redirect()->back()->with('success', 'New user has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if( !Auth::user()->hasRole('admin') && $id !== Auth::user()->id ){
          return redirect('home');
        }
        $user = User::with('roles')->find($id);//get user with specific role
        $profile = $user->profile;
        $roles = Role::orderBy('id','desc')->get();
        return view('user.update_profile',['user' => $user, 'profile' => $profile, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
      if( !Auth::user()->hasRole('admin') && $id !== Auth::user()->id ){
        return redirect('home');
      }
      $user = User::find($id);
      if ($user->is('admin')) {
          $validator = Validator::make(Input::all(), [
              'name' => 'required',
              'email' => 'required|email',
              'avatar' => 'image'
          ]);
      } else {
          $validator = Validator::make(Input::all(), [
              'name' => 'required',
              'email' => 'required|email',
              'address' => 'required',
              'phone' => 'required',
              'avatar' => 'image'
          ]);
      }

      $check = ($user->email == $request->email);
      if (!$check) {
        $checkMail = User::where('email',$request->email)->first();
        if(count($checkMail) > 0) {
          $validator->errors()->add('email', 'Email has been used.');
          }
      }

      if ($validator->fails()) {
        return redirect()->back()
          ->withErrors($validator)
          ->withInput();
      }

      $user->name = $request->name;
      $user->email = $request->email;
      $user->save();

      $saveProfile = Profile::where('user_id', $id)->first();
      if(count($saveProfile) == 0 ) {
        $saveProfile = new Profile;
        $saveProfile->user_id = $id;
      }

      if ($request->hasFile('avatar')) {
        $ext = '.'.$request->file('avatar')->getClientOriginalExtension();
        $destinationPath = public_path('images/avatar');
        $fileName = md5(date('now')).$ext;
        $request->file('avatar')->move($destinationPath, $fileName);
        $saveProfile->avatar = $fileName;
      }

      $saveProfile->address = $request->address;
      $saveProfile->phone = $request->phone;
      $saveProfile->save();

      return redirect()->back()->with('success', 'Profile has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'User has been deleted.');
    }

    public function getChangePassword()
    {
        return view('user.changePassword', ['user' => Auth::user()]);
    }

    public function postChangePassword()
    {
        $validator = Validator::make(Input::all(), [
            'current_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $check = auth()->validate([
            'email'    => Auth::user()->email,
            'password' => Input::get('current_password')
        ]);

        if (!$check){
            $validator->errors()->add('current_password', 'Your current password is incorrect, please try again.');
            return redirect('changePassword')
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($validator->fails()) {
            return redirect('changePassword')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = User::find(Auth::user()->id);
        $user->password = bcrypt(Input::get('password'));
        $user->save();

        return redirect('changePassword')->with('success','Password has been changed.');
    }

    public function showProfile()
    {
        $id = Auth::user()->id;
        $user = User::with('roles')->find($id);//get user with specific role
        $profile = $user->profile;
        $roles = Role::orderBy('id','desc')->get();
        return view('user.profile',['user' => $user, 'profile' => $profile, 'roles' => $roles]);
    }
}
