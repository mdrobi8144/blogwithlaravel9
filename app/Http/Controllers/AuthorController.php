<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.author.home');
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }

    public function ResetForm(Request $request, $token = NULL){
        $data = ['pt' => 'Reset password Form'];
        return view('pages.auth.pass-reset', $data)->with(['token'=>$token, 'email'=>$request->email]);
    }

    public function changeProfilePic(Request $request){
        $user = User::find(auth('web')->id());
        $path = 'dist/profilePics/authors/';
        $file = $request->file('author_profile_pic');
        $old_picture = $user->getAttributes()['picture'];
        $old_file_path = $path.$old_picture;
        $new_picture_name = 'Author-IMG-'.$user->id.time().rand(1,100000).'.jpg';

        if($old_picture != null && File::exists(public_path($old_file_path))){
            File::delete(public_path($old_file_path));
        }

        $upload = $file->move(public_path($path), $new_picture_name);
        if($upload){
            $user->update([
                'picture'=>$new_picture_name
            ]);
            return response()->json(['status'=>1, 'msg'=>'Your profile picture has been successfully updated.']);
        }else{
            return response()->json(['status'=>0, 'msg'=>'Something went wrong.']); 
        }
    }
}
