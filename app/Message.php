<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone_number', 'message_type_id', 'message', 'date', 'time'];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function type()
    {
        return $this->hasOne('App\MessageType', 'id', 'message_type_id');
    }
}
