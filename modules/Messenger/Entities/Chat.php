<?php namespace KekecMed\Messenger\Entities;
   
use KekecMed\Core\Abstracts\Models\AbstractModel;

/**
 * Class Chat
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Messenger\Entities
 */
class Chat extends AbstractModel {

    protected $fillable = [
        /**
         * Fillable Attributes HERE!
         */
    ];

    /**
     * Get chat participants
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participants() {
        return $this->hasMany(ChatParticipant::class);
    }

    /**
     * Get chat messages
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages() {
        return $this->hasMany(ChatMessage::class);
    }
}