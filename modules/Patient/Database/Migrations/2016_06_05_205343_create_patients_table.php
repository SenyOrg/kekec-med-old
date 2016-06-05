<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePatientsTable
 * -----------------------------
 *
 * -----------------------------
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('patients');

        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('phone');
            $table->string('mobile');
            $table->string('email');

            $table->string('street');
            $table->string('no');
            $table->string('zipcode');


            $table->string('image');
            $table->date('birthdate');
            $table->string('insurance_type');
            $table->integer('insurance_id')->unsigned();

            $table->foreign('insurance_id')
                ->references('id')->on('insurances')
                ->onDelete('cascade');

            $table->string('insurance_no');

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
        Schema::disableForeignKeyConstraints();
        Schema::drop('patients');
    }
}
