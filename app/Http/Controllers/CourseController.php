<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Course;
use App\Models\CoursePurchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //
    public function index()
    {
        $courses = Course::get();
        $data = [
            'id' => 0,
            'c_name' => '',
            'owner' => '',
            'type' => '',
            'toy_type' => '',
            'price' => 0.0
        ];
        foreach ($courses as $course) {
            $data['id'] = $course->id;
            $data['c_name'] = $course->c_name;
            $data['owner'] = User::findOrFail($course->owner_id)->name;
            $data['type'] = $course->type;
            $data['toy_type'] = $course->toy_type;
            $data['price'] = $course->cost;
            $temp[] = $data;
        }
        return $temp;
    }

    public function getById($id)
    {
//        return $id ;
        $course = Course::findOrFail($id);
        $data = [
            "c_name" => '',
            "c_owner" => '',
            "price" => '',
            "img" => '',
            "des" => '',
            'id' => ''
        ];
        $data['c_name'] = $course->c_name;
        $data['c_owner'] = User::findOrFail($course->owner_id)->name;
        $data['price'] = $course->cost;
        $data['img'] = $course->img;
        $data['des'] = $course->description;
        $data['id'] = $id;
        return $data;
    }

    public function getByOwnerId($id)
    {
        $courses = DB::table('courses')->where('owner_id', '=', $id)->get();
//        $users = DB::table('users')->get('') ;
        $data = [
            'id' => 0,
            'c_name' => '',
            'owner' => '',
            'type' => '',
            'toy_type' => '',
            'price' => 0.0,
            'img' => ''
        ];
        foreach ($courses as $course) {
            $data['id'] = $course->id;
            $data['c_name'] = $course->c_name;
            $data['owner'] = User::findOrFail($course->owner_id)->name;
            $data['type'] = $course->type;
            $data['toy_type'] = $course->toy_type;
            $data['price'] = $course->cost;
            $data['img'] = $course->img ;
            $temp[] = $data;
        }
        return $temp;
    }

    public function getToStore($id)
    {
        $courses = DB::table('courses')->where('owner_id', '!=', $id)->get();
//        $users = DB::table('users')->get('') ;
        $data = [
            'id' => 0,
            'c_name' => '',
            'owner' => '',
            'type' => '',
            'toy_type' => '',
            'price' => 0.0,
            'img' => ''
        ];
//        $as = DB::table('course_purchases')->where('c_customer_id', '=', $id)->get()->where('c_id', '=', $course->id);
        foreach ($courses as $course) {
//            foreach ($as as $a) {
//            return DB::table('course_purchases')->
//            where('c_customer_id', '=', $id)->get()->
//            where('c_id', '=', 2)->isEmpty()  ;
                if (DB::table('course_purchases')->
                where('c_customer_id', '=', $id)->get()->
                where('c_id', '=', $course->id)->isEmpty()) {
                    $data['id'] = $course->id;
                    $data['c_name'] = $course->c_name;
                    $data['owner'] = User::findOrFail($course->owner_id)->name;
                    $data['type'] = $course->type;
                    $data['toy_type'] = $course->toy_type;
                    $data['price'] = $course->cost;
                    $data['img'] = $course->img;
                    $temp[] = $data;
                }
//            }
        }
        return $temp;
    }

    public function getLearnCourse($id)
    {
        $c_learn = DB::table('course_purchases')->where('c_customer_id', '=', $id)->get('c_id');
//        return $c_learn ;
        foreach ($c_learn as $temp) {
            $temp2 = Course::findOrFail($temp->c_id);
            $data[] = $temp2;
        }
//        return $data ;

        $data2 = [
            'id' => 0,
            'c_name' => '',
            'owner' => '',
            'type' => '',
            'toy_type' => '',
            'price' => 0.0,
            'img' => ''
        ];
        foreach ($data as $course) {
//            return $course->id ;
            $data2['id'] = $course->id;
            $data2['c_name'] = $course->c_name;
//            return $course ;
            $data2['owner'] = User::findOrFail($course->owner_id)->name;
            $data2['type'] = $course->type;
            $data2['toy_type'] = $course->toy_type;
            $data2['price'] = $course->cost;
            $data2['img'] = $course->img;
            $temp3[] = $data2;
        }
        return $temp3;
    }

    public function createCourse(Request $request, $id)
    {
//        return $request ;
        $course = new Course();
        $course->type = $request->input('type');
        $course->cost = $request->input('price');
        $course->toy_type = $request->input('toy_type');
        $course->c_name = $request->input('title');
        $course->description = $request->input('des');
        $course->owner_id = $id;
//        return 1 ;
//        return $request->hasFile('image') ;
        $file = $request->file('image');
//        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('img/', $filename);
        $course->img = '/img/' . $filename;
//        return 1;
        $course->save();
        return $course;
    }

    public function editCourse(Request $request, $id)
    {
//        return $request ;
        $course = Course::findOrFail($id);
        $course->type = $request->input('type');
        $course->cost = $request->input('price');
        $course->toy_type = $request->input('toy_type');
        $course->c_name = $request->input('title');
        $file = $request->file('image');
//        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('img/', $filename);
        $course->img = '/img/' . $filename;
//        return $course ;
        $course->save();
    }

    public function buyCourse(Request $request, $id)
    {
//        return $request ;
        $pur = new CoursePurchase();
        $pur->c_customer_id = $request->input('cus_id');
        $pur->c_owner_id = Course::findOrFail($id)->owner_id;
        $pur->c_status = 1;
        $pur->c_id = $id;
        $pur->save();
        return $pur;
    }
}
