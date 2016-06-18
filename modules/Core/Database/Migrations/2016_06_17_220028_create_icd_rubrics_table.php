<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateIcdRubricsTable
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateIcdRubricsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('icd_rubrics', function (Blueprint $table) {
            // General Columns
            $table->increments('id');
            $table->string('content');
            $table->string('reference');

            // Related Columns
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('icd_id');

            // Foreign Key Constraints
            $table->foreign('type_id')
                  ->references('id')->on('icd_rubric_types')
                  ->onDelete('cascade');

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
        Schema::drop('icd_rubrics');
        Schema::enableForeignKeyConstraints();
    }

}
