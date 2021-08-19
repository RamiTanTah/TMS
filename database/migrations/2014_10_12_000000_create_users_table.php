<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('password');
            $table->string('firstName',50);
            $table->string('lastName',50); 
            $table->date('DOB');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            //  role_id = 4 --> role (user by default)
            $table->foreignId('role_id')->default(4);
            //  account_status = 3 --> New
            $table->foreignId('accountStatus_id')->default(3);
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
