<?php namespace KekecMed\Messenger\Entities;
   
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChatMessage
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Messenger\Entities
 */
class ChatMessage extends Model {

    protected $fillable = [
        'id',
        'chat_id',
        'user_id',
        'message'
    ];

    /**
     * Get chat of message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chat() {
        return $this->belongsTo(Chat::class);
    }

    /**
     * Get author of message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

}