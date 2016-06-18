<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Database\Migrations\AbstractMigration;

/**
 * Class CreateInsurancesTable
 * -----------------------------
 *
 * -----------------------------
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateInsurancesTable extends AbstractMigration
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
            $table->string('title');
            $table->string('homepage');
            $table->string('region');
            $table->float('rate');

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
        return 'insurances';
    }
}
