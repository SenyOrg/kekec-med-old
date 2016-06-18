<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Database\Migrations\AbstractMigration;

/**
 * Class CreateIcdMetasTable
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateIcdMetasTable extends AbstractMigration
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
    }

    /**
     * Get Table Name as String
     *
     * @return string
     */
    protected function getTableName()
    {
        return 'icd_metas';
    }
}
