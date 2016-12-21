<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

// use App\Http\Model\User;

class SelfMedia extends Model
{

    protected $table = 'self_media';
    protected $primaryKey = 'media_id';
    // public $timestamps = false;
    protected $guarded = [];

    public function user()
    {
        //return $this->hasOne('App\Phone', 'foreign_key', 'local_key');
        return $this->belongsTo('App\Http\Model\User', 'user_id');
    }

    public function share()
    {
        return $this->hasMany('App\Http\Model\ShareRec', 'media_id');

    }


}
