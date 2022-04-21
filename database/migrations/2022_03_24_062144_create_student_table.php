<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Builder;
class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('student', function (Blueprint $table) {
            $table->increments('s_id');
            $table->string('name',60);
            $table->text('Rollnumber');
            $table->enum('gender',["M","F","o"])->nullable;
            $table->text('phonenumber');
            $table->string('email',60);
            $table->string('password');
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
        Schema::dropIfExists('student');
    }
}
