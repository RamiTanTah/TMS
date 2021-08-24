<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
        });

        // ######### insert default and static task_status for system ###########
        DB::table('task_statuses')->insert([
          ['id'=> '1', 'name' => 'To Do'],
          ['id'=> '2', 'name' => 'Progress'],
          ['id'=> '3', 'name' => 'Review'],
          ['id'=> '4', 'name' => 'Complete'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_statuses');
    }
}
