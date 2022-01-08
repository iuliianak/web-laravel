<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks_history', function (Blueprint $table) {
            $table->bigInteger('id','true','true');
            $table->bigInteger('task_id')->unsigned();
            $table->biginteger('creator_id')->unsigned();
            $table->string('title',255);
            $table->text('content');
            $table->bigInteger('status_id')->unsigned();
            $table->timestamp('updated_at');
            $table->foreign('task_id','task_id_foreign2')->references('id')->on('tasks');
            $table->foreign('status_id','status_id_foreign2')->references('id')->on('statuses');
            $table->foreign('creator_id','creator_id_foreign2')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks_history');
    }
}
