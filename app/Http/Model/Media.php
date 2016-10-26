<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $table='media';
  protected $primaryKey='media_id';
  public $timestamps = false;
  protected $guarded = [];


}
