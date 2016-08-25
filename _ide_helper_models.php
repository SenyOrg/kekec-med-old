<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * Class User
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package App
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $firstname
 * @property string $lastname
 * @property boolean $online
 * @property string $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Task\Entities\Task[] $createdTasks
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Task\Entities\Task[] $assignedTasks
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Messenger\Entities\ChatParticipant[] $chatParticipants
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Messenger\Entities\ChatMessage[] $chatMessages
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereFirstname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLastname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereOnline($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereImage($value)
 */
	class User extends \Eloquent {}
}

namespace KekecMed\Consultation\Entities{
/**
 * Class Consultation
 *
 * @author Selcuk Kekc <senycorp@googlemail.com>
 * @package KekecMed\Consultation\Entities
 * @property integer $id
 * @property integer $event_id
 * @property integer $patient_id
 * @property string $start
 * @property string $end
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \KekecMed\Patient\Entities\Patient $patient
 * @property-read \KekecMed\Event\Entities\Event $event
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Task\Entities\Task[] $tasks
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Notice\Entities\Notice[] $notices
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Media\Entities\Media[] $media
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Consultation\Entities\Consultation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Consultation\Entities\Consultation whereEventId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Consultation\Entities\Consultation wherePatientId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Consultation\Entities\Consultation whereStart($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Consultation\Entities\Consultation whereEnd($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Consultation\Entities\Consultation whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Consultation\Entities\Consultation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Consultation\Entities\Consultation whereUpdatedAt($value)
 */
	class Consultation extends \Eloquent {}
}

namespace KekecMed\Core\Entities{
/**
 * Class ICD
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Entities
 * @property integer $id
 * @property string $type
 * @property string $title
 * @property string $code
 * @property string $path
 * @property integer $chapter_id
 * @property integer $block_id
 * @property integer $firstlevel_id
 * @property integer $secondlevel_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Core\Entities\ICDRubric[] $rubrics
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Core\Entities\ICDMeta[] $metas
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICD whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICD whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICD whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICD whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICD wherePath($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICD whereChapterId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICD whereBlockId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICD whereFirstlevelId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICD whereSecondlevelId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICD whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICD whereUpdatedAt($value)
 */
	class ICD extends \Eloquent {}
}

namespace KekecMed\Core\Entities{
/**
 * Class ICDMeta
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Entities
 * @property integer $id
 * @property string $meta
 * @property string $value
 * @property integer $icd_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDMeta whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDMeta whereMeta($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDMeta whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDMeta whereIcdId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDMeta whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDMeta whereUpdatedAt($value)
 */
	class ICDMeta extends \Eloquent {}
}

namespace KekecMed\Core\Entities{
/**
 * Class ICDRubric
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Entities
 * @property integer $id
 * @property string $content
 * @property string $reference
 * @property integer $type_id
 * @property integer $icd_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \KekecMed\Core\Entities\ICD $icd
 * @property-read \KekecMed\Core\Entities\ICDRubricType $type
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDRubric whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDRubric whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDRubric whereReference($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDRubric whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDRubric whereIcdId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDRubric whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDRubric whereUpdatedAt($value)
 */
	class ICDRubric extends \Eloquent {}
}

namespace KekecMed\Core\Entities{
/**
 * Class ICDRubricType
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Entities
 * @property integer $id
 * @property string $title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDRubricType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDRubricType whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDRubricType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Core\Entities\ICDRubricType whereUpdatedAt($value)
 */
	class ICDRubricType extends \Eloquent {}
}

namespace KekecMed\Event\Entities{
/**
 * Class EventType
 * -----------------------------
 * 
 * -----------------------------
 *
 * @package KekecMed\Calendar\Entities
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @property integer $id
 * @property string $title
 * @property string $color
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Event\Entities\Event[] $events
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventType whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventType whereColor($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventType whereUpdatedAt($value)
 */
	class EventType extends \Eloquent {}
}

namespace KekecMed\Event\Entities{
/**
 * Class EventParticipant
 * -----------------------------
 * 
 * -----------------------------
 *
 * @package KekecMed\Calendar\Entities
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @property integer $id
 * @property integer $event_id
 * @property integer $participant_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \KekecMed\Event\Entities\Event $event
 * @property-read \App\User $participant
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventParticipant whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventParticipant whereEventId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventParticipant whereParticipantId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventParticipant whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventParticipant whereUpdatedAt($value)
 */
	class EventParticipant extends \Eloquent {}
}

namespace KekecMed\Event\Entities{
/**
 * Class Event
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Event\Entities
 * @property integer $id
 * @property string $title
 * @property integer $calendar_id
 * @property integer $event_type_id
 * @property integer $creator_id
 * @property integer $patient_id
 * @property string $start
 * @property string $end
 * @property integer $event_status_id
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \KekecMed\Calendar\Entities\Calendar $calendar
 * @property-read \KekecMed\Event\Entities\EventType $type
 * @property-read \App\User $creator
 * @property-read \KekecMed\Patient\Entities\Patient $patient
 * @property-read \KekecMed\Event\Entities\EventStatus $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Event\Entities\EventParticipant[] $participants
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Consultation\Entities\Consultation[] $consultations
 * @property-read \KekecMed\Queue\Entities\QueueItem $queueItem
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\Event whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\Event whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\Event whereCalendarId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\Event whereEventTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\Event whereCreatorId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\Event wherePatientId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\Event whereStart($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\Event whereEnd($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\Event whereEventStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\Event whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\Event whereUpdatedAt($value)
 */
	class Event extends \Eloquent {}
}

namespace KekecMed\Event\Entities{
/**
 * Class EventStatus
 * -----------------------------
 * 
 * -----------------------------
 *
 * @package KekecMed\Calendar\Entities
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @property integer $id
 * @property string $title
 * @property string $color
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Event\Entities\Event[] $events
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventStatus whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventStatus whereColor($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Event\Entities\EventStatus whereUpdatedAt($value)
 */
	class EventStatus extends \Eloquent {}
}

namespace KekecMed\Insurance\Entities{
/**
 * Class Insurance
 * -----------------------------
 * 
 * -----------------------------
 *
 * @package App
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @property integer $id
 * @property string $title
 * @property string $homepage
 * @property string $region
 * @property float $rate
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Patient\Entities\Patient[] $patients
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Insurance\Entities\Insurance whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Insurance\Entities\Insurance whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Insurance\Entities\Insurance whereHomepage($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Insurance\Entities\Insurance whereRegion($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Insurance\Entities\Insurance whereRate($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Insurance\Entities\Insurance whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Insurance\Entities\Insurance whereUpdatedAt($value)
 */
	class Insurance extends \Eloquent {}
}

namespace KekecMed\Media\Entities{
/**
 * Class Media
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Entities
 * @property integer $id
 * @property string $filename
 * @property string $filetype
 * @property string $filesize
 * @property string $path
 * @property string $description
 * @property integer $creator_id
 * @property integer $object_id
 * @property string $object_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $object
 * @property-read \App\User $creator
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Media\Entities\Media whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Media\Entities\Media whereFilename($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Media\Entities\Media whereFiletype($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Media\Entities\Media whereFilesize($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Media\Entities\Media wherePath($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Media\Entities\Media whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Media\Entities\Media whereCreatorId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Media\Entities\Media whereObjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Media\Entities\Media whereObjectType($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Media\Entities\Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Media\Entities\Media whereUpdatedAt($value)
 */
	class Media extends \Eloquent {}
}

namespace KekecMed\Messenger\Entities{
/**
 * Class Chat
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Messenger\Entities
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Messenger\Entities\ChatParticipant[] $participants
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Messenger\Entities\ChatMessage[] $messages
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\Chat whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\Chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\Chat whereUpdatedAt($value)
 */
	class Chat extends \Eloquent {}
}

namespace KekecMed\Messenger\Entities{
/**
 * Class ChatParticipant
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Messenger\Entities
 * @property integer $id
 * @property integer $chat_id
 * @property integer $user_id
 * @property integer $unread_messages
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \KekecMed\Messenger\Entities\Chat $chat
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\ChatParticipant whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\ChatParticipant whereChatId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\ChatParticipant whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\ChatParticipant whereUnreadMessages($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\ChatParticipant whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\ChatParticipant whereUpdatedAt($value)
 */
	class ChatParticipant extends \Eloquent {}
}

namespace KekecMed\Messenger\Entities{
/**
 * Class ChatMessage
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Messenger\Entities
 * @property integer $id
 * @property integer $chat_id
 * @property integer $user_id
 * @property string $message
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \KekecMed\Messenger\Entities\Chat $chat
 * @property-read \App\User $author
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\ChatMessage whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\ChatMessage whereChatId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\ChatMessage whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\ChatMessage whereMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\ChatMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Messenger\Entities\ChatMessage whereUpdatedAt($value)
 */
	class ChatMessage extends \Eloquent {}
}

namespace KekecMed\Notice\Entities{
/**
 * Class Notice
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Entities
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property integer $creator_id
 * @property integer $object_id
 * @property string $object_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $creator
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $object
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Notice\Entities\Notice whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Notice\Entities\Notice whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Notice\Entities\Notice whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Notice\Entities\Notice whereCreatorId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Notice\Entities\Notice whereObjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Notice\Entities\Notice whereObjectType($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Notice\Entities\Notice whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Notice\Entities\Notice whereUpdatedAt($value)
 */
	class Notice extends \Eloquent {}
}

namespace KekecMed\Patient\Entities{
/**
 * Class Patient
 *
 * @property string $firstname
 * @property string $lastname
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Patient\Entities
 * @property integer $id
 * @property string $gender
 * @property string $phone
 * @property string $mobile
 * @property string $email
 * @property string $street
 * @property string $no
 * @property string $zipcode
 * @property string $image
 * @property string $birthdate
 * @property string $insurance_type
 * @property integer $insurance_id
 * @property string $insurance_no
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \KekecMed\Insurance\Entities\Insurance $insurance
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Consultation\Entities\Consultation[] $consultations
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Task\Entities\Task[] $tasks
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Media\Entities\Media[] $media
 * @property-read \Illuminate\Database\Eloquent\Collection|\KekecMed\Notice\Entities\Notice[] $notices
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereFirstname($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereLastname($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereGender($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereMobile($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereStreet($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereNo($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereZipcode($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereBirthdate($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereInsuranceType($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereInsuranceId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereInsuranceNo($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Patient\Entities\Patient whereUpdatedAt($value)
 */
	class Patient extends \Eloquent {}
}

namespace KekecMed\Queue\Entities{
/**
 * Class QueueItem
 * -----------------------------
 * 
 * -----------------------------
 *
 * @package KekecMed\Queue\Entities
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @property integer $id
 * @property integer $event_id
 * @property integer $patient_id
 * @property integer $queue_id
 * @property string $start
 * @property string $end
 * @property integer $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \KekecMed\Event\Entities\Event $event
 * @property-read \KekecMed\Patient\Entities\Patient $patient
 * @property-read \KekecMed\Queue\Entities\Queue $queue
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Queue\Entities\QueueItem whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Queue\Entities\QueueItem whereEventId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Queue\Entities\QueueItem wherePatientId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Queue\Entities\QueueItem whereQueueId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Queue\Entities\QueueItem whereStart($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Queue\Entities\QueueItem whereEnd($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Queue\Entities\QueueItem whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Queue\Entities\QueueItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Queue\Entities\QueueItem whereUpdatedAt($value)
 */
	class QueueItem extends \Eloquent {}
}

namespace KekecMed\Task\Entities{
/**
 * Class Task
 * -----------------------------
 * 
 * -----------------------------
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $deadline
 * @property boolean $done
 * @property integer $creator_id
 * @property integer $assignee_id
 * @property integer $object_id
 * @property string $object_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $creator
 * @property-read \App\User $assignee
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $object
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Task\Entities\Task whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Task\Entities\Task whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Task\Entities\Task whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Task\Entities\Task whereDeadline($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Task\Entities\Task whereDone($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Task\Entities\Task whereCreatorId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Task\Entities\Task whereAssigneeId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Task\Entities\Task whereObjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Task\Entities\Task whereObjectType($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Task\Entities\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\KekecMed\Task\Entities\Task whereUpdatedAt($value)
 */
	class Task extends \Eloquent {}
}

