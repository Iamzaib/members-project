<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFamiliesTable extends Migration
{
    public function up()
    {
        Schema::table('families', function (Blueprint $table) {
            $table->unsignedBigInteger('ledenid_id')->nullable();
            $table->foreign('ledenid_id', 'ledenid_fk_6420006')->references('id')->on('members');
        });
    }
}
