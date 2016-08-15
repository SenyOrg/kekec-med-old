<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Abstracts\Database\Migrations\AbstractMigration;

/**
 * Class CreateConsultationsTable
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateConsultationsTable extends AbstractMigration
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

            /**
             * Events-Relation
             */
            $table->unsignedInteger('event_id');
            $table->foreign('event_id')
                  ->references('id')->on('events')
                  ->onDelete('cascade');

            /**
             * Patients-Relation
             */
            $table->unsignedInteger('patient_id');
            $table->foreign('patient_id')
                  ->references('id')->on('patients')
                  ->onDelete('cascade');

            /**
             * Start and End
             */
            $table->dateTime('start');
            $table->dateTime('end');

            /**
             * Descriptions
             */
            $table->text('description');

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
        return 'consultations';
    }
}
