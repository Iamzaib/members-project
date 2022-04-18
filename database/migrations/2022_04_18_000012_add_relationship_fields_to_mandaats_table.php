<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMandaatsTable extends Migration
{
    public function up()
    {
        Schema::table('mandaats', function (Blueprint $table) {
            $table->unsignedBigInteger('ledenid_id')->nullable();
            $table->foreign('ledenid_id', 'ledenid_fk_6453758')->references('id')->on('members');
        });
    }
}
