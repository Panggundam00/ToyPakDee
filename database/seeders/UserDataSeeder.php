<?php

namespace Database\Seeders;

use App\Models\UserData;
use Illuminate\Database\Seeder;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = new UserData();
        $data->u_id = 1 ;
        $data->bio = 'ชายหนุ่มผู้มีความมุ่งมั่นที่จะเป็นเจ้าแห่งการต่อโมเดลและการลงสี เขาเริ่มทำการเก็บรวบรวมโมเดลจนครบ 7 ตัวเพื่อขอพรกับเทพเจ้าโมเดลให้ชุบชีวิตแฟนสาว' ;
        $data->img_pro = '/img/img_pro1.jpg' ;
        $data->img_collect1 = '/img/img_collect1.jpg' ;
        $data->img_collect2 = '/img/img_collect2.jpg' ;
        $data->img_collect3 = '/img/img_collect3.jpg' ;
        $data->img_collect4 = '/img/img_collect4.jpg' ;
        $data->save() ;
    }
}
