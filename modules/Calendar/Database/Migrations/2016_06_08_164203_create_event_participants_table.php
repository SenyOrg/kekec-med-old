<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Abstracts\Database\Migrations\AbstractMigration;

/**
 * Class CreateEventParticipantsTable
 * -----------------------------
 *
 * -----------------------------
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateEventParticipantsTable extends AbstractMigration
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
            $table->unsignedInteger('event_id');

            $table->foreign('event_id')
                  ->references('id')->on('events')
                  ->onDelete('cascade');

            $table->unsignedInteger('participant_id');
            $table->foreign('participant_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

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
        return 'event_participants';
    }
}
