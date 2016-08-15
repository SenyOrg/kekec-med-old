<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Abstracts\Database\Migrations\AbstractMigration;

/**
 * Class CreateNoticesTable
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateNoticesTable extends AbstractMigration
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
             * Content
             */
            $table->string('title');
            $table->string('body');

            /**
             * Creator
             */
            $table->unsignedInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');

            /**
             * Polymorphic Relation Columns
             */
            $table->unsignedInteger('object_id');
            $table->string('object_type');

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
        return 'notices';
    }
}
