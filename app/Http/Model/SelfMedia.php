<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class SelfMedia extends Model
{

  protected $table='self_media';
  protected $primaryKey='user_id';
  // public $timestamps = false;
  protected $guarded = [];
}
