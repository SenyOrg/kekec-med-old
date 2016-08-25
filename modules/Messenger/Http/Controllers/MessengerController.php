<?php namespace KekecMed\Messenger\Http\Controllers;

use KekecMed\Core\Abstracts\Controllers\AbstractController;
use KekecMed\Messenger\Events\MessengerChatMessageCreated;

/**
 * Class MessengerController
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Messenger\Http\Controllers
 */
class MessengerController extends AbstractController {

	/**
	 * Get chats of user
	 * 
	 * @return json
	 */
	public function chats() {
		return response()->json(\Messenger::chats());
	}

	/**
	 * Get chat data by id
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
	public function chat($id) {
		return response()->json(\Messenger::chat($id));
	}

	/**
	 * Send message to specific chat
	 *
	 * @param $id
	 */
	public function sendMessage($id) {
		if (( $chatMessageModel = \Messenger::sendMessage($id, request()->get('message')))) {
			\Event::fire(new MessengerChatMessageCreated($chatMessageModel));
			
			return response()->json([
				'success' => true
			]);
		}

		return response()->json([
			'success' => false
		]);
	}

	/**
	 * Mark complete chat as read
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
	public function markAsRead($id) {
		\Messenger::markAsRead($id);

		return response()->json([
			'success' => true
		]);
	}
}