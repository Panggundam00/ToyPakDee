<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserDataController extends Controller
{
    //
    public function getUserById($id)
    {
//        return UserData::findOrFail($id) ;
        $userData = DB::table('user_data')->where('u_id', '=', $id)->first() ;
//        return $userData ;
        $data = [
            "u_id" => $userData->u_id,
            "bio" => $userData->bio,
            "img_pro" => $userData->img_pro,
            "img_collect1" => $userData->img_collect1,
            "img_collect2" => $userData->img_collect2,
            "img_collect3" => $userData->img_collect3,
            "img_collect4" => $userData->img_collect4,
            "img_collect5" => $userData->img_collect5,
            "img_collect6" => $userData->img_collect6,
            "img_collect7" => $userData->img_collect7,
            "img_collect8" => $userData->img_collect8,
            "img_collect9" => $userData->img_collect9,
            "username" => User::findOrFail($userData->u_id)->name
        ];
        return $data;
    }

    public function editProfile(Request $request, $id)
    {
//        return $request ;
//        return $request->input('bio') ;
        $file = $request->file('image');
//        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('img/', $filename);
        $userData = UserData::where('u_id', '=', $id)->first() ;
        $userData->bio = $request->input('bio') ;
        $userData->img_pro = '/img/'.$filename ;
        $userData->save() ;
        return $userData ;
//        $menu->image = 'uploads/images/' . $filename;
//        $path = $request->file('file');
    }

    public function login(Request $request){
        $user = User::where('email', '=', $request->input('email'))->first();
//        return $request ;
        if ($user == null){
            return 'fail' ;
        }
        if (Hash::check($request->input('pass'), $user->password)){
            return $user ;
        }
        return 'fail';
    }

    public function register(Request $request){
//        return $request ;
        $user = User::where('email', '=', $request->input('email'))->first();

        if ($user != null){
            return 'fail' ;
        }
//        return $user ;
        $user = new User() ;
        $user->name = $request->input('name') ;

        $user->email = $request->input('email') ;

        $user->password = Hash::make($request->input('pass')) ;

        $user->save() ;

        $userData = new UserData() ;
        $userData->u_id = $user->id ;
        $userData->save() ;
//        return '123' ;
        return 'pass' ;
    }

}
