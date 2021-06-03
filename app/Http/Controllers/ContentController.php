<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    //
    public function index(){
        return Content::all() ;
    }

    public function getById($id){
        return Content::findOrFail($id) ;
    }

    public function getByCourseID($id){
        return DB::table('contents')->where('course_id', '=', $id)->get() ;
    }

    public function editContent(Request $request, $id){
//        return $request ;
        $content = Content::findOrFail($id) ;
        $content->title = $request->input('title') ;
        $content->text_content = $request->input('content') ;
        $file = $request->file('image');
//        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('img/', $filename);
        $content->photo = '/img/'.$filename ;
        $content->save();
    }

    public function createContent(Request $request, $id){
//        return $request ;
        $content = new Content() ;
        $content->title = $request->input('title') ;
        $content->course_id = $request->id ;
        $content->text_content = $request->input('content') ;
        $file = $request->file('image');
//        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('img/', $filename);
        $content->photo = '/img/'.$filename ;
        $content->save();
        return $content ;
    }
}
