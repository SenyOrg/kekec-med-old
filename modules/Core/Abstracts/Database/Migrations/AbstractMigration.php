<?php namespace KekecMed\Core\Abstracts\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Schema;

/**
 * Class AbstractMigration
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Database\Migrations
 */
abstract class AbstractMigration extends Migration
{
    /**
     * AbstractMigration constructor.
     */
    public function __construct()
    {
        // Disable Foreign Key Constraint Checks
        Schema::disableForeignKeyConstraints();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public abstract function up();

    /**
     * AbstractMigration destructor.
     */
    public function __destruct()
    {
        // Enable Foreign Key Constraint Checks
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Drop Table
     */
    public function drop()
    {
        return $this->down();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->getTableName());
    }

    /**
     * Get Table Name as String
     *
     * @return string
     */
    protected abstract function getTableName();

    /**
     * Checks whether a Table exists or not
     *
     * @return bool
     */
    public function tableExists()
    {
        return Schema::hasTable($this->getTableName());
    }
}