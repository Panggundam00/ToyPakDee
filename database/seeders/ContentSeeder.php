<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $content = new Content() ;
        $content->title = 'title1' ;
        $content->course_id = 1 ;
        $content->text_content = "content1" ;
        $content->photo = '/img/img1.jpg' ;
        $content->save() ;

        $content = new Content() ;
        $content->title = 'title2' ;
        $content->course_id = 1 ;
        $content->text_content = "content2" ;
        $content->photo = '/img/img2.jpg' ;
        $content->save() ;

        $content = new Content() ;
        $content->title = 'title3' ;
        $content->course_id = 2 ;
        $content->text_content = "content3" ;
        $content->photo = '/img/img3.png' ;
        $content->save() ;

        $content = new Content() ;
        $content->title = 'title4' ;
        $content->course_id = 3 ;
        $content->text_content = "content4" ;
        $content->photo = '/img/img4.png' ;
        $content->save() ;
    }
}
