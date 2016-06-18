<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateIcdMetasTable
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateIcdMetasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('icd_metas', function (Blueprint $table) {
            // General Columns
            $table->increments('id');
            $table->string('meta');
            $table->string('value');

            // Related Columns
            $table->unsignedInteger('icd_id');

            // Foreign Key Constraints
            $table->foreign('icd_id')
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
        Schema::drop('icd_metas');
        Schema::enableForeignKeyConstraints();
    }

}
