<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
        });

        // ######### insert default and static roles for system ###########
        DB::table('roles')->insert([
          ['id'=> '1', 'name' => 'Administrator'],
          ['id'=> '2', 'name' => 'Employee'],
          ['id'=> '3', 'name' => 'Manager'],
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
