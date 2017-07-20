<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class record extends Model
{

    protected $fillable = ['RomanNumeral','TimesConverted','LastConverted'];
    public $timestamps = false;
    public function RomanNumeral() {

        return $this->belongsTo(RomanNum::class);

      }
}
