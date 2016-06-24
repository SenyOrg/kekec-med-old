<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use KekecMed\Core\Entities\Dialogable;
use KekecMed\Core\Entities\ImageableModel;
use KekecMed\Task\Entities\Task;

class User extends Authenticatable implements Dialogable
{
    use ImageableModel;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'image', 'online'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get ImageUrl
     *
     * @return mixed
     */
    public function getImageUrl() {
        return \Storage::url($this->image);
    }

    public function getFullName() {
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * Get created tasks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTasks()
    {
        return $this->hasMany(Task::class, 'creator_id');
    }

    /**
     * Get assigned tasks
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->assignedTasks();
    }

    /**
     * Get assigned tasks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assignedTasks()
    {
        return $this->hasMany(Task::class, 'assignee_id');
    }

    /**
     * Returns data for dialog view
     *
     * @return array
     */
    public function getDialogData()
    {
        $arr = [];

        self::select(['firstname', 'lastname', 'id'])->orderBy('firstname')->each(function($u) use(&$arr) {
            $arr[$u->id] = $u->getFullName();
        });

        return $arr;
    }
}
