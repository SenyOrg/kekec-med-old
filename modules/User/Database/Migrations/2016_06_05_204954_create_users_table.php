<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Database\Migrations\AbstractMigration;

/**
 * Class CreateUsersTable
 * -----------------------------
 *
 * -----------------------------
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateUsersTable extends AbstractMigration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        return 'users';
    }
}
