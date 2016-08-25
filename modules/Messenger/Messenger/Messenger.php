<?php namespace KekecMed\Messenger\Messenger;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use KekecMed\Messenger\Entities\Chat;
use KekecMed\Messenger\Entities\ChatMessage;

/**
 * Class Messenger
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Messenger\Providers
 */
class Messenger {
	/**
	 * @var User
	 */
	protected $user;

	/**
	 * Messenger constructor.
	 *
	 * @param User $user
	 */
	public function __construct(User $user)
	{
		$this->setUser($user);
	}

    /**
     * Get chats of user
     *
     * @return array
     */
	public function chats() {
		//return  $this->getUser()->chats();

        return $chatData = \DB::select('
            SELECT chats.id as \'chat.id\', 
                    chats.created_at as \'chat.created\',
                    chats.updated_at as \'chat.updated\',
                    users.id as \'participant.id\',
                    users.firstname as \'participant.firstname\',
                    users.lastname as \'participant.lastname\',
                    users.email as \'participant.email\',
                    users.image as \'participant.image\',
                    u.unread_messages as \'unread_messages\'
            FROM chats
                INNER JOIN chat_participants u ON chats.id = u.chat_id AND u.user_id = ?
                INNER JOIN chat_participants o ON chats.id = o.chat_id AND o.user_id != ?
                INNER JOIN users ON users.id = o.user_id
            WHERE true GROUP BY chats.id
        ', [$this->getUser()->id, $this->getUser()->id]);
	}

    /**
     * Get chat information
     * 
     * @param $id
     */
    public function chat($id) {
        $chatData = \DB::select('
            SELECT chats.id as \'chat.id\', 
                    chats.created_at as \'chat.created\',
                    chats.updated_at as \'chat.updated\',
                    users.id as \'participant.id\',
                    users.firstname as \'participant.firstname\',
                    users.lastname as \'participant.lastname\',
                    users.email as \'participant.email\',
                    users.image as \'participant.image\'
            FROM chats
                INNER JOIN chat_participants ON chats.id = chat_participants.chat_id AND chat_participants.user_id != ?
                INNER JOIN chat_participants u ON chats.id = u.chat_id AND u.user_id = ?
                INNER JOIN users ON chat_participants.user_id = users.id
            WHERE chats.id = ?
        ', [$this->getUser()->id, $this->getUser()->id, $id]);

        $messageData = \DB::select('
          SELECT  message, 
                  users.id as \'author.id\',
                  users.firstname as \'author.firstname\',
                  users.lastname as \'author.lastname\',
                  users.image as \'author.image\',
                  chat_messages.created_at as \'sent\'
           FROM chat_messages
          INNER JOIN users ON chat_messages.user_id = users.id
          WHERE chat_messages.chat_id = ?
        ', [$id]);

        $chatData[0]->messages = $messageData;

        \DB::update('UPDATE chat_participants SET chat_participants.unread_messages = 0 
WHERE chat_participants.chat_id = ? AND chat_participants.user_id = ?', [$id, $this->getUser()->id]);

        return $chatData[0];
    }

    /**
     * Get messages of chat
     *
     * @param $chatId
     *
     * @return Collection
     */
    public function chatMessages($chatId) {
        return Chat::findOrFail($chatId)->messages;
    }

    /**
     * Get participants of chat
     *
     * @param $chatId
     *
     * @return collection
     */
    public function chatParticipants($chatId) {
        return Chat::findOrFail($chatId)->participants;
    }

    /**
     * Send message to chat
     *
     * @param $chatId
     * @param $message
     *
     * @return mixed
     */
    public function sendMessage($chatId, $message) {
        if (($chatMessageModel = Chat::findOrFail($chatId)->messages()->save(
            new ChatMessage([
                'message' => $message,
                'user_id' => $this->getUser()->id
            ])))) {
            $this->updateUnreadMessages($chatId);

            return $chatMessageModel;
        }

        return false;
    }

    /**
     * Increment amount of unread Messages for
     * all users except the current user
     *
     * @param $chatId
     */
    public function updateUnreadMessages($chatId) {
        \DB::update('
            UPDATE chat_participants SET unread_messages = (unread_messages+1) WHERE chat_participants.chat_id = ? AND 
            chat_participants.user_id != ?
        ', [$chatId, $this->getUser()->id]);
    }

    /**
     * Mark chat as read
     *
     * @param $chatId
     */
    public function markAsRead($chatId) {
        \DB::update('
            UPDATE chat_participants SET unread_messages = 0 WHERE chat_participants.chat_id = ? AND 
            chat_participants.user_id = ?
        ', [$chatId, $this->getUser()->id]);
    }

	/**
	 * @return User
	 */
	public function getUser()
	{
		return $this->user;
	}

	/**
	 * @param User $user
	 */
	public function setUser($user)
	{
		$this->user = $user;
	}
}
