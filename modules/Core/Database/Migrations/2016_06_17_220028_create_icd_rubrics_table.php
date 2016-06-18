<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Database\Migrations\AbstractMigration;

/**
 * Class CreateIcdRubricsTable
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateIcdRubricsTable extends AbstractMigration
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
    }

    /**
     * Get Table Name as String
     *
     * @return string
     */
    protected function getTableName()
    {
        return 'icd_rubrics';
    }
}
