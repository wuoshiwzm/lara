<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Article1 extends Model
{
  protected $table='article1';
  protected $primaryKey='art_id';
  public $timestamps = false;
  protected $guarded = [];


}
