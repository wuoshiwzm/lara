<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class PageBanner extends Model
{
  protected $table='page_banner';
  protected $primaryKey = 'page_banner_id';
  // public $timestamps = false;
  protected $guarded = [];

}
