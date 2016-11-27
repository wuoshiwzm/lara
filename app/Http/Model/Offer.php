<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
  protected $table='offer';
  protected $primaryKey='offer_id';
  protected $guarded = [];
}
