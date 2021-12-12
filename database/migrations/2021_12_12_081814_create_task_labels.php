<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskLabels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_labels', function (Blueprint $table) {
            $table->biginteger('task_id')->unsigned();
            $table->biginteger('label_id')->unsigned();
            $table->foreign('task_id','task_id_foreign')->references('id')->on('tasks');
            $table->foreign('label_id','label_id_foreign')->references('id')->on('labels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_labels');
    }
}
