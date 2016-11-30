<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voice extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'calls';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['direction', 'to', 'from', 'message', 'status', 'sid'];
}
