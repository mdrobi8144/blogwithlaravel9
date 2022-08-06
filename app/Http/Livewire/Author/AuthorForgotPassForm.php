<?php

namespace App\Http\Livewire\Author;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthorForgotPassForm extends Component
{
    public $email;

    public function ForgotPassHandler(){
        $this->validate([
            'email' => 'required|email|exists:users,email'
        ],[
            'email.required' => 'Email is required',
            'email.email' => 'The :attribute is invalid',
            'email.exists' => 'This :attribute is not registered'
        ]);

        $token = base64_encode(Str::random(64));
        DB::table('password_resets')->insert([
            'email' => $this->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $user = User::where('email', $this->email)->first();
        $link = route('author.pass-reset-form', ['token' => $token, 'email' => $this->email]);

        $bdyMsg = "We are recieved a request to reset password for <b>LaraBlog</b> 
        account associated with ". $this->email ." . <br> You can reset your password by clicking the button below.";
        $bdyMsg .= "<br>";
        $bdyMsg .= '<a href="'.$link.'" target="_blank" style="color:#FFF;border-color:#206bc4;border-style:solid;
        border-width:7px 185px;background-color:#206bc4;display:inline-block;text-decoration:none;border-radius:3px;
        box-shadow:0 2px 3px rgba(0,0,0,0.16);-webkit-text-size-adjust:none;box-sizing:border-box;">Reset Password</a>';
        $bdyMsg .= "<br>";
        $bdyMsg .= "If you did not request for a password reset, Please ignore this email.";

        $data = array(
            'name' => $user->name,
            'bdy_msg' => $bdyMsg,
        );

        Mail::send('forgot-email-template', $data, function($message) use ($user){
            $message->from('mnimri973@gmail.com', 'LaraBlog');
            $message->to($user->email, $user->name)->subject('Password Reset');
        });

        $this->email = NULL;
        session()->flash('success', 'We have e-mailed your password reset link');
    }

    public function render()
    {
        return view('livewire.author-forgot-pass-form');
    }
}
