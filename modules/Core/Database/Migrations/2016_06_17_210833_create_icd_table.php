<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateIcdTable
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateIcdTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('icd', function (Blueprint $table) {
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

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::drop('icd');
        Schema::enableForeignKeyConstraints();
    }

}
