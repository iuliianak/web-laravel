<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigInteger('id','true','true');
            $table->biginteger('creator_id')->unsigned();
            $table->string('title',255);
            $table->text('content');
            $table->bigInteger('status_id')->unsigned();
            $table->timestamps();
            $table->foreign('status_id','status_id_foreign')->references('id')->on('statuses');
            $table->foreign('creator_id','creator_id_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
