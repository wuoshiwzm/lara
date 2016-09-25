<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
  protected $table='data';
  protected $primaryKey = 'data_id';
  // public $timestamps = false;
  protected $guarded = [];
}
