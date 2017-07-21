<?php
namespace App\Transformers;
use App\record;
use League\Fractal\TransformerAbstract;
class recentTransformer extends TransformerAbstract
{
  public function transform(record $Record) {

    return [
      'RomanNumeral' => $Record->RomanNumeral,
      'LastConverted' => $Record->LastConverted
    ];

  }
}
