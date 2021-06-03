<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User() ;
        $user->name = 'admin1' ;
        $user->email = 'admin1@mail.com' ;
        $user->password = Hash::make('admin1') ;
        $user->account = '123-456-789' ;
        $user->bank_name = 'SCB1' ;
        $user->save() ;

        $user = new User() ;
        $user->name = 'admin2' ;
        $user->email = 'admin2@mail.com' ;
        $user->password = Hash::make('admin2') ;
        $user->account = '111-222-333' ;
        $user->bank_name = 'SCB2' ;
        $user->save() ;

        $user = new User() ;
        $user->name = 'admin3' ;
        $user->email = 'admin3@mail.com' ;
        $user->password = Hash::make('admin3') ;
        $user->account = '111-222-333' ;
        $user->bank_name = 'SCB3' ;
        $user->save() ;
    }
}
