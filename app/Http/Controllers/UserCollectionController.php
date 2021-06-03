<?php

namespace App\Http\Controllers;

use App\Models\UserCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserCollectionController extends Controller
{
    //
    public function getUserCollectionById($id){
        return DB::table('user_collections')->where('u_id', '=', $id)->get() ;
    }

    public function addCollection(Request $request){
//        return $request ;
        $file = $request->file('image');
//        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('img/', $filename);
        $co = new UserCollection() ;
        $co->img = '/img/'.$filename ;
        $co->u_id = $request->u_id ;
        $co->save() ;
    }
}
