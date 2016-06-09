<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
        return $this->hasMany('App\Task', 'creator_id');
    }

    /**
     * Get assigned tasks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assignedTasks()
    {
        return $this->hasMany('App\Task', 'assignee_id');
    }

    /**
     * Get assigned tasks
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks() {
        return $this->assignedTasks();
    }

    /**
     * Get data for dialog
     *
     * @return array
     */
    public static function toDialog() {
        $arr = [];

        self::all(['firstname', 'lastname', 'id'])->each(function($u) use(&$arr) {
           $arr[$u->id] = $u->getFullName();
        });

        return $arr;
    }
}
