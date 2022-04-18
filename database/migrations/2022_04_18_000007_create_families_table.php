<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('family_member_type');
            $table->string('first_name');
            $table->string('surname')->nullable();
            $table->date('d_o_b')->nullable();
            $table->string('gender');
            $table->string('status');
            $table->string('registration_date')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('history_almere')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
