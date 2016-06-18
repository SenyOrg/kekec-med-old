<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Database\Migrations\AbstractMigration;

/**
 * Class CreateIcdTable
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateIcdTable extends AbstractMigration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {

            // General Columns
            $table->increments('id');
            $table->string('type');
            $table->string('title');
            $table->string('code');
            $table->string('path');

            // Reference Columns
            $table->unsignedInteger('chapter_id')->nullable();
            $table->unsignedInteger('block_id')->nullable();
            $table->unsignedInteger('firstlevel_id')->nullable();
            $table->unsignedInteger('secondlevel_id')->nullable();

            // Foreign Key Constraints
            $table->foreign('chapter_id')
                  ->references('id')->on('icd')
                  ->onDelete('cascade');

            $table->foreign('block_id')
                  ->references('id')->on('icd')
                  ->onDelete('cascade');

            $table->foreign('firstlevel_id')
                  ->references('id')->on('icd')
                  ->onDelete('cascade');

            $table->foreign('secondlevel_id')
                  ->references('id')->on('icd')
                  ->onDelete('cascade');

            // Timestamp Columns
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
        return 'icd';
    }
}
