<?php

namespace App\Http\Livewire\Author;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthorLoginForm extends Component
{
    public $login_id, $password;

    public function LoginHandler(){
        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';

        if($fieldType == 'email'){
            $this->validate([
                'login_id' => 'required|email|exists:users,email',
                'password' => 'required|min:5'
            ],[
                'login_id.required' => 'Email or Username is required',
                'login_id.email' => 'Invalid email address',
                'login_id.exists' => 'This email is not registered',
                'password.required' => 'Password is required'
            ]);
        }else{
            $this->validate([
                'login_id' => 'required|exists:users,user_name',
                'password' => 'required|min:5'
            ],[
                'login_id.required' => 'Email or Username is required',
                'login_id.exists' => 'This username is not registered',
                'password.required' => 'Password is required'
            ]);
        }

        $creds = array($fieldType=>$this->login_id, 'password'=>$this->password);

        if(Auth::guard('web')->attempt($creds)){
            $checkUser = User::where($fieldType, $this->login_id)->first();

            if($checkUser->blocked == 1){
                Auth::guard('web')->logout();
                return redirect()->route('author.login')->with('fail', 'Your account has been blocked');
            }else{
                return redirect()->route('author.home');
            }
        }else{
            session()->flash('fail', 'Incorrect Email/Username or Password');
        }

        //Login Function with only email
        //$this->validate([
        //    'email' => 'required|email|exists:users,email',
        //    'password' => 'required|min:5'
        //],[
        //    'email.required' => 'Enter your email address',
        //    'email.email' => 'Invalid email address',
        //    'email.exists' => 'This email is not registered in database',
        //    'password.required' => 'Password is required'
        //]);
//
        //$creds = array('email'=>$this->email, 'password'=>$this->password);
//
        //if(Auth::guard('web')->attempt($creds)){
        //    $checkUser = User::where('email', $this->email)->first();
//
        //    if($checkUser->blocked == 1){
        //        Auth::guard('web')->logout();
        //        return redirect()->route('author.login')->with('fail', 'Your account has been blocked');
        //    }else{
        //        return redirect()->route('author.home');
        //    }
        //}else{
        //    session()->flash('fail', 'Incorrect email or password');
        //}
    }

    public function render()
    {
        return view('livewire.author.author-login-form');
    }
}
