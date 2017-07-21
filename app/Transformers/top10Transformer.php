<?php
namespace App\Transformers;
use App\record;
use League\Fractal\TransformerAbstract;
class top10Transformer extends TransformerAbstract
{
  public function transform(record $Record) {

    return [
      'RomanNumeral' => $Record->RomanNumeral,
      'TimesConverted' => $Record->TimesConverted
    ];

  }
}
