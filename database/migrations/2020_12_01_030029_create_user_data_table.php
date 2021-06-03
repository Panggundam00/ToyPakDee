<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->integer('u_id')->default(0) ;
            $table->string('bio')->default('');
            $table->string('img_pro')->default('/img/guest_profile.png') ;
            $table->string('img_collect1')->default('/img/guest_profile.png');
            $table->string('img_collect2')->default('/img/guest_profile.png');
            $table->string('img_collect3')->default('/img/guest_profile.png');
            $table->string('img_collect4')->default('/img/guest_profile.png');
            $table->string('img_collect5')->default('/img/guest_profile.png');
            $table->string('img_collect6')->default('/img/guest_profile.png');
            $table->string('img_collect7')->default('/img/guest_profile.png');
            $table->string('img_collect8')->default('/img/guest_profile.png');
            $table->string('img_collect9')->default('/img/guest_profile.png');
            $table->softDeletes() ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_data');
    }
}
