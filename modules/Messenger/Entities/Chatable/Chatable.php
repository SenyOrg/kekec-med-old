<?php namespace KekecMed\Messenger\Entities\Chatable;

use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Messenger\Entities\ChatMessage;
use KekecMed\Messenger\Entities\ChatParticipant;

/**
 * Class ChatableModel
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Messenger\Entities\Chatable
 */
trait ChatableModel {

    /**
     * Get chat participants
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chatParticipants() {
        /** @var AbstractModel $this */
        return $this->hasMany(ChatParticipant::class);
    }

    /**
     * Get chat messages
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chatMessages() {
        /** @var AbstractModel $this */
        return $this->hasMany(ChatMessage::class);
    }

}