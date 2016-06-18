<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Database\Migrations\AbstractMigration;

/**
 * Class CreatePatientsTable
 * -----------------------------
 *
 * -----------------------------
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreatePatientsTable extends AbstractMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname')->index();
            $table->string('lastname')->index();
            $table->string('gender');
            $table->string('phone')->index();
            $table->string('mobile')->index();
            $table->string('email')->index();

            $table->string('street')->index();
            $table->string('no');
            $table->string('zipcode')->index();


            $table->string('image');
            $table->date('birthdate')->index();
            $table->string('insurance_type')->index();
            $table->integer('insurance_id')->unsigned();

            $table->foreign('insurance_id')
                  ->references('id')->on('insurances')
                  ->onDelete('cascade');

            $table->string('insurance_no')->index();

            $table->timestamps();
        });
    }

    /**
     * Get Table Name as String
     *
     * @return string
     */
    protected function getTableName()
    {
        return 'patients';
    }
}
