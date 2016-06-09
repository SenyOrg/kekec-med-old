<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEventStatusesTable
 * -----------------------------
 * 
 * -----------------------------
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateEventStatusesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_statuses', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('color');

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
        Schema::drop('event_statuses');
    }

}
