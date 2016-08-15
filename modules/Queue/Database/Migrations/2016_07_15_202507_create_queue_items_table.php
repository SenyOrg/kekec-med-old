<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Abstracts\Database\Migrations\AbstractMigration;

/**
 * Class CreateQueueItemsTable
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateQueueItemsTable extends AbstractMigration
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
             * EventID will be setted, if it is linked. Otherwise
             * when creating a queue item manually it will be empty.
             */
            $table->unsignedInteger('event_id');

            /**
             * PatientID will be setted allways to gurantee consitency. If an
             * event is linked it will automatically extracted.
             */
            $table->unsignedInteger('patient_id');

            /**
             * QueueID
             */
            $table->unsignedInteger('queue_id');

            /**
             * Start will be setted when status of item is 'pending'.
             */
            $table->dateTime('start');

            /**
             * End will be setted when consultation is finished.
             */
            $table->dateTime('end');

            /**
             * Event in Entry: Waiting
             * Event in Queue: Queued
             * Event started: Pending
             * Event finished: Done
             */
            $table->unsignedInteger('status');

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
        return 'queue_items';
    }
}
