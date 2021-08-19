<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_status', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
        });

        // ######### insert default and static account status for system ###########
        DB::table('account_status')->insert([
          ['id'=> '1', 'name' => 'Activated'],
          ['id'=> '2', 'name' => 'Closed'],
          ['id'=> '3', 'name' => 'New'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_status');
    }
}
