<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->text('type')->nullable(true);
            $table->float('cost')->default(0);
            $table->integer('owner_id');
            $table->text('toy_type')->nullable(true);
            $table->string('c_name')->default('');
            $table->text('description')->nullable(true) ;
            $table->string('img')->default('/img/guest_profile.png') ;
            $table->softDeletes();
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
        Schema::dropIfExists('courses');
    }
}
