<?php namespace KekecMed\Messenger\Entities;
   
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChatParticipant
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Messenger\Entities
 */
class ChatParticipant extends Model {

    /**
     * Fillable attributes
     * 
     * @var array
     */
    protected $fillable = [
        'chat_id',
        'user_id'
    ];

    /**
     * Get chat of participant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chat() {
        return $this->belongsTo(Chat::class);
    }

    /**
     * Get participant
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

}