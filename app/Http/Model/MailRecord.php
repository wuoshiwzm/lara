<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class MailRecord extends Model
{
    protected $table = 'mail_rec';
    protected $primaryKey='mrid';
    public $guarded=[];
}
