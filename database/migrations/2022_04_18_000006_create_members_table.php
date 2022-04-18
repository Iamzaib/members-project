<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ledenid')->unique();
            $table->string('status');
            $table->string('type_of_donor')->nullable();
            $table->string('first_name');
            $table->string('surname')->nullable();
            $table->string('street_name');
            $table->string('house_number')->nullable();
            $table->string('zip_code');
            $table->string('town')->nullable();
            $table->string('land')->nullable();
            $table->string('enamel')->nullable();
            $table->integer('email_checked')->nullable();
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('birthplace')->nullable();
            $table->date('unsubscribe_date')->nullable();
            $table->longText('remark')->nullable();
            $table->string('iban')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
