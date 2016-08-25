<?php

use Illuminate\Database\Schema\Blueprint;
use KekecMed\Core\Abstracts\Database\Migrations\AbstractMigration;

/**
 * Class CreateChatParticipantsTable
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class CreateChatParticipantsTable extends AbstractMigration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTableName(), function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('chat_id');
            $table->foreign('chat_id')
                  ->references('id')->on('chats')
                  ->onDelete('cascade');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->unsignedInteger('unread_messages')->default(0);
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
        return 'chat_participants';
    }
}
