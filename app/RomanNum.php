<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RomanNum extends Model
{
  

  public function record() {


     return $this->hasOne(record::class);

 }
}
