<?php

namespace Database\Seeders;

use App\Models\CoursePurchase;
use Illuminate\Database\Seeder;

class CoursePurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $c = new CoursePurchase() ;
        $c->c_id = 2 ;
        $c->c_owner_id = 2 ;
        $c->c_status = true ;
        $c->c_customer_id = 1 ;
        $c->save() ;

        $c = new CoursePurchase() ;
        $c->c_id = 5 ;
        $c->c_owner_id = 2 ;
        $c->c_status = true ;
        $c->c_customer_id = 1 ;
        $c->save() ;

        $c = new CoursePurchase() ;
        $c->c_id = 0 ;
        $c->c_owner_id = 3 ;
        $c->c_status = true ;
        $c->c_customer_id = 2 ;
        $c->save() ;
    }
}
