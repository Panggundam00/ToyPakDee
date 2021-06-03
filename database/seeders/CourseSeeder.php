<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $course = new Course() ;
        $course->type = 'Painting' ;
        $course->cost = 0 ;
        $course->owner_id = 1 ;
        $course->toy_type = 'Figure' ;
        $course->c_name = 'วิธีทำสีแบบที่ลิงอุรังอุตังก็ทำได้' ;
        $course->description = 'des1' ;
//        $course->img = ''
        $course->save() ;

        $course = new Course() ;
        $course->type = 'Sculpture' ;
        $course->cost = 100 ;
        $course->owner_id = 2 ;
        $course->toy_type = 'Statue' ;
        $course->c_name = 'งานสอนปั้นแบบที่แมวก็ยังปั้นได้' ;
        $course->description = 'des2' ;
        $course->save() ;

        $course = new Course() ;
        $course->type = 'Gundam' ;
        $course->cost = 200.52 ;
        $course->owner_id = 2 ;
        $course->toy_type = 'Gunpla' ;
        $course->c_name = 'โมกันพลายังไงให้สวย' ;
        $course->description = 'des3' ;
        $course->save() ;

        $course = new Course() ;
        $course->type = 'Modify' ;
        $course->cost = 200.52 ;
        $course->owner_id = 1 ;
        $course->toy_type = 'Figure' ;
        $course->c_name = 'มาทำให้ Figure ตัวใหญ่ขึ้นกันเถอะ' ;
        $course->description = 'des4' ;
        $course->save() ;

        $course = new Course() ;
        $course->type = 'Plastic kit' ;
        $course->cost = 0 ;
        $course->owner_id = 3 ;
        $course->toy_type = 'Tank' ;
        $course->c_name = 'มาลองต่อรถถังกัน' ;
        $course->description = 'des5' ;
        $course->save() ;

        $course = new Course() ;
        $course->type = 'Painting' ;
        $course->cost = 1250.50 ;
        $course->owner_id = 3 ;
        $course->toy_type = 'Gunpla' ;
        $course->c_name = 'ทำสีกันพลาแบบแมวๆ' ;
        $course->description = 'des6' ;
        $course->save() ;
    }
}
