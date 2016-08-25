<?php namespace KekecMed\Messenger\Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use KekecMed\Messenger\Entities\Chat;
use KekecMed\Messenger\Entities\ChatMessage;
use KekecMed\Messenger\Entities\ChatMessages;
use KekecMed\Messenger\Entities\ChatParticipant;

/**
 * Class MessengerDevelopmentDatabaseSeeder
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Messenger\Database\Seeders
 */
class MessengerDevelopmentDatabaseSeeder extends Seeder {

	const CHAT_COUNT = 50;
	const CHAT_MESSAGES_COUNT = 200;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$users = User::all()->toArray();

		for ($i = 0 ; $i < count($users) ; $i++) {
			$sourceUserId = $users[$i]['id'];
			for ($j = $i + 1 ; $j < count($users) ; $j++) {
				$targetUserId = $users[$j]['id'];

				$chatModel = factory(Chat::class)->create();
				$chatModel->participants()->save(
					new ChatParticipant([
						'user_id' => $sourceUserId
					])
				);	

				$chatModel->participants()->save(
					new ChatParticipant([
						'user_id' => $targetUserId
					])
				);

				for ($msgCount = 1; $msgCount <= 100; $msgCount++) {
					factory(ChatMessage::class, 1)->create([
						'chat_id' => $chatModel->id,
						'user_id' => (($msgCount%2) == 1) ? $sourceUserId : $targetUserId
					]);

//					ChatMessage::create([
//						'chat_id' => $chatModel->id,
//						'user_id' => (($msgCount%2) == 1) ? $sourceUserId : $targetUserId
//					]);
				}
			}
		}
	}

}