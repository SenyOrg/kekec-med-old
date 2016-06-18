<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Database\Migrations\AbstractMigration;

/**
 * Class CreateCalendarsTable
 * -----------------------------
 *
 * -----------------------------
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateCalendarsTable extends AbstractMigration
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
            $table->string('title');
            $table->string('color');
            $table->unsignedInteger('creator_id');

            $table->foreign('creator_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->text('description');

            $table->boolean('shared');
            $table->json('scopes');

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
        return 'calendars';
    }
}
