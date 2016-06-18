<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Database\Migrations\AbstractMigration;

/**
 * Class CreateEventStatusesTable
 * -----------------------------
 *
 * -----------------------------
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateEventStatusesTable extends AbstractMigration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('color');

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
        return 'event_statuses';
    }
}
