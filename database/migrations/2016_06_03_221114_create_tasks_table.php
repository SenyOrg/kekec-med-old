<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTasksTable
 * -----------------------------
 * 
 * -----------------------------
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
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
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->dateTime('deadline');
            $table->boolean('done')->default(false);

            $table->unsignedInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('assignee_id');
            $table->foreign('assignee_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('object_id');
            $table->foreign('object_id')->references('id')->on('patients')->onDelete('cascade');


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
        Schema::drop('tasks');
    }
}