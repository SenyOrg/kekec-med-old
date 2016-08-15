<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Abstracts\Database\Migrations\AbstractMigration;

/**
 * Class CreateMediasTable
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateMediasTable extends AbstractMigration
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
             * File attributes
             */
            $table->string('filename');
            $table->string('filetype');
            $table->string('filesize');
            $table->string('path');
            $table->string('description');

            /**
             * Creator
             */
            $table->unsignedInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');

            /**
             * Polymorphic Relation Fields
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
        return 'medias';
    }
}
