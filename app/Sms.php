<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['direction', 'to', 'from', 'message', 'status', 'sid'];

    public function parent()
    {
        return $this->belongsTo('App\Message', 'message_id', 'id');
    }
}
