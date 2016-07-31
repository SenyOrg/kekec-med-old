<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Abstracts\Database\Migrations\AbstractMigration;

/**
 * Class CreateQueuesTable
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateQueuesTable extends AbstractMigration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            // Queue: Id
            $table->increments('id');

            // Queue: Title
            $table->string('title');

            // Queue: Allow queue to hold multiple items at same time
            $table->boolean('multiple');

            // Queue: List of allowed source calendars
            $table->json('calendars');

            // Queue: List of allowed event types
            $table->json('event_types');

            // Queue: Timestamps
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
        return 'queues';
    }
}
