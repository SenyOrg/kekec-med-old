<?php namespace KekecMed\Event\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use KekecMed\Core\Http\Controllers\CoreConventionalResourceController;
use KekecMed\Core\Http\Controllers\CoreConventionalResourceViewController;
use KekecMed\Event\Entities\Event;
use KekecMed\Event\Entities\EventParticipant;
use Pingpong\Modules\Routing\Controller;

class EventController extends CoreConventionalResourceViewController {
	
	/**
	 * Get Module identifier
	 *
	 * @return string
	 */
	protected function getIdentifier()
	{
		return 'event';
	}

	/**
	 * Get model class
	 *
	 * @return Model::class
	 */
	protected function getModelClass()
	{
		return Event::class;
	}

	/**
	 * Show / Hide edit button
	 *
	 * @return boolean
	 */
	public function showEditButton()
	{
		// TODO: Implement showEditButton() method.
	}

	protected function createModel($data)
	{
		$data['creator_id'] = \Auth::user()->id;

		$model = parent::createModel($data);

		if (isset($data['participants'])) {
			foreach($data['participants'] as $userID) {
				EventParticipant::create(['participant_id' => $userID, 'event_id' => $model->id]);
			}
		}

		return $model;
	}


	protected function updateModel($id, array $data)
	{
		$class = $this->getModelClass();

		$class::findOrFail($id)->update($data);
		$class::findOrFail($id)->participants()->delete();

		if (isset($data['participants'])) {
			foreach($data['participants'] as $userID) {
				EventParticipant::create(['participant_id' => $userID, 'event_id' => $id]);
			}
		}
	}
}