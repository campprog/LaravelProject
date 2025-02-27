<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
class UserController extends Controller

{
   //Show user register form 
   public function create()
   {
    return view('users.register');
   }

   //Create new user
   public function store(Request $request)
   {
    $formFields = $request->validate([
        'name'=> ['required','min:3'],
        'email' =>['required','email'],
        'password' => 'required|confirmed|min:6' 
    ]);

    //create user
    $user= User::create($formFields);
    auth::login($user);


    return redirect('/cloud');
   }

   //Logout user
   public function logout(Request $request)
   {
    auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/cloud');
   }

   //Show user login form
   public function login()
   {
    return view('users.login');

   }

   //Authenticate user
   public function authenticate(Request $request)
   {
    $formFields = $request->validate([
        'name'=> ['required','min:3'],        
        'password' => 'required' 
    ]);
    if(auth::attempt($formFields)){
        $request->session()->regenerate();
        return redirect('/cloud');
    }
    return back()->withErrors(['email'=>'invalid credencials']);
   }


  // Show the password reset form
  public function showChangePasswordForm()
  {
      return view('users.changePassword');
  }
  


  //Reset password
  public function changePassword(Request $request)
  { 
    $request->validate(
        ['current_password' => 'required',
        'new_password'=>'required|confirmed|min:6',
        ]);
     
    if(!hash::check($request->current_password,Auth::user()->password)){
        $notification = array(
            'message'=>'Old Password Does not match',
            'alert-type' =>'error'
        );
        return redirect('/cloud');
    }

    User::whereId(Auth::user()->id)->update([
        'password'=>Hash::make($request->new_password)
    ]);
    $notification = array(
        'message'=>'Password changed',
        'alert-type' =>'sucess'
    );
    return redirect('/cloud');
  }


}