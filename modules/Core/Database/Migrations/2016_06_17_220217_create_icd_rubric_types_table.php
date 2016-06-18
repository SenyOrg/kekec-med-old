<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Database\Migrations\AbstractMigration;

/**
 * Class CreateIcdRubricTypesTable
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateIcdRubricTypesTable extends AbstractMigration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icd_rubric_types', function (Blueprint $table) {
            // General Columns
            $table->increments('id');
            $table->string('title');
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
        return 'icd_rubric_types';
    }
}
