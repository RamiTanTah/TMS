<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tasks', function (Blueprint $table) {
          $table->id();
          $table->string('name',50);
          $table->text('description')->nullable();
          $table->date('start_date')->nullable();
          $table->date('end_date')->nullable();
          $table->date('deadline')->nullable();
          $table->integer('estimite_time')->nullable();
          $table->foreignId('task_status_id')->default(1);
          $table->foreignId('task_id');
          $table->foreignId('user_id');
          $table->softDeletes('deleted_at', 0);
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
        Schema::dropIfExists('sub_tasks');
    }
}
