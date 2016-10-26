<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $table = 'ind';
    protected $primaryKey='ind_id';
    public $guarded=[];
}
