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
          ['id'=> '1', 'name' => 'administrator'],
          ['id'=> '2', 'name' => 'employee'],
          ['id'=> '3', 'name' => 'manager'],
          ['id'=> '4', 'name' => 'project manager']
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
