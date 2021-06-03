<?php

namespace Database\Seeders;

use App\Models\UserCollection;
use Illuminate\Database\Seeder;

class UserCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userCollect = new UserCollection() ;
        $userCollect->u_id = 1 ;
        $userCollect->img = '/img/img_collect1.jpg' ;
        $userCollect->save() ;

        $userCollect = new UserCollection() ;
        $userCollect->u_id = 1 ;
        $userCollect->img = '/img/img_collect2.jpg' ;
        $userCollect->save() ;

        $userCollect = new UserCollection() ;
        $userCollect->u_id = 1 ;
        $userCollect->img = '/img/img_collect3.jpg' ;
        $userCollect->save() ;

        $userCollect = new UserCollection() ;
        $userCollect->u_id = 1 ;
        $userCollect->img = '/img/img_collect4.jpg' ;
        $userCollect->save() ;

        $userCollect = new UserCollection() ;
        $userCollect->u_id = 1 ;
        $userCollect->img = '/img/guest_profile.png' ;
        $userCollect->save() ;
    }
}
