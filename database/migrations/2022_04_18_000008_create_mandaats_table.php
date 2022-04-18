<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMandaatsTable extends Migration
{
    public function up()
    {
        Schema::create('mandaats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('mandaadnr')->nullable();
            $table->date('start_mandaat')->nullable();
            $table->date('einde_mandaat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
