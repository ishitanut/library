<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('s_id')->unsigned();
            $table->foreign('s_id')->references('s_id')->on('student')->onDelete('cascade');
            $table->integer('b_id')->unsigned();
            $table->foreign('b_id')->references('b_id')->on('book')->onDelete('cascade');
            $table->string('issue_date');
            $table->string('return_date')->nullable();
            $table->string('issue_status')->nullable();
            $table->timestamp('return_day')->nullable();
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
        Schema::dropIfExists('issue');
    }
}

