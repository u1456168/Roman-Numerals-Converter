<?php
namespace App\Transformers;
use App\record;
use League\Fractal\TransformerAbstract;
class recordTransformer extends TransformerAbstract
{
  public function transform(record $Record) {

    return [
      'RomanNumeral' => $Record->RomanNumeral
    ];

  }
}
