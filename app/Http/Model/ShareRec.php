<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ShareRec extends Model
{

  protected $table='share_rec';
  protected $primaryKey='share_id';
  // public $timestamps = false;
  protected $guarded = [];
}
