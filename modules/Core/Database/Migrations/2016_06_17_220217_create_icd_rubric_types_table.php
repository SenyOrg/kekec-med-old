<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateIcdRubricTypesTable
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateIcdRubricTypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('icd_rubric_types', function (Blueprint $table) {
            // General Columns
            $table->increments('id');
            $table->string('title');
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
        Schema::drop('icd_rubric_types');
        Schema::enableForeignKeyConstraints();
    }

}
