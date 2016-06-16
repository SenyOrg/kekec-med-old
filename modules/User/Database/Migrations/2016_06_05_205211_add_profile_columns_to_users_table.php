<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class AddProfileColumnsToUsersTable
 * -----------------------------
 * This migration adds profile related fields
 * to the users table
 * -----------------------------
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class AddProfileColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'firstname')) {
                $table->string('firstname');
            }

            if (!Schema::hasColumn('users', 'lastname')) {
                $table->string('lastname');
            }

            if (!Schema::hasColumn('users', 'online')) {
                $table->boolean('online')->default(true);
            }

            if (!Schema::hasColumn('users', 'setting')) {
                $table->json('setting');
            }

            if (!Schema::hasColumn('users', 'image')) {
                $table->string('image');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'firstname')) {
                $table->dropColumn('firstname');
            }

            if (Schema::hasColumn('users', 'lastname')) {
                $table->dropColumn('lastname');
            }

            if (Schema::hasColumn('users', 'online')) {
                $table->dropColumn('online')->default(true);
            }

            if (Schema::hasColumn('users', 'setting')) {
                $table->dropColumn('setting')->default('{}');
            }

            if (Schema::hasColumn('users', 'image')) {
                $table->dropColumn('image');
            }

            if (Schema::hasColumn('users', 'name')) {
                $table->dropColumn('name');
            }
        });
    }
}
