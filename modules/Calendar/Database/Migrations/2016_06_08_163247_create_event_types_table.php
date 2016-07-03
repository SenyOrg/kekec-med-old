<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Abstracts\Database\Migrations\AbstractMigration;

/**
 * Class CreateEventTypesTable
 * -----------------------------
 *
 * -----------------------------
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateEventTypesTable extends AbstractMigration
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
            $table->string('description');

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
        return 'event_types';
    }
}
