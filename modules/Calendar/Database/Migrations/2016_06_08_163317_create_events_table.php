<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEventsTable
 * -----------------------------
 *
 * -----------------------------
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateEventsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('calendar_id');
            $table->foreign('calendar_id')
                ->references('id')->on('calendars')
                ->onDelete('cascade');

            $table->unsignedInteger('event_type_id');
            $table->foreign('event_type_id')
                ->references('id')->on('event_types')
                ->onDelete('cascade');

            $table->unsignedInteger('creator_id');
            $table->foreign('creator_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedInteger('patient_id');
            $table->foreign('patient_id')
                ->references('id')->on('patients')
                ->onDelete('cascade');

            $table->dateTime('start');
            $table->dateTime('end');

            $table->unsignedInteger('event_status_id');
            $table->foreign('event_status_id')
                ->references('id')->on('event_statuses')
                ->onDelete('cascade');

            $table->string('description');
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
        Schema::drop('events');
    }

}
