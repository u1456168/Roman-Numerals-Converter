<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversionController extends Controller
{
  //Advanced Search.
  public function index(Request $request) {
      // Gets the search Value , sorts it into thousands , hundreds , tens and ones.
      $SearchVal = $request->get('searchValue');
      $sum1 = $SearchVal / 1000 ;
      $thousand = intval($sum1);
      $sum2 = ($SearchVal - ($thousand * 1000)) / 100;
      $hundred = intval($sum2);
      $sum3 = ($SearchVal - (($thousand * 1000) + ($hundred * 100))) / 10;
      $tens = intval($sum3);
      $sum4 = ($SearchVal - ((($thousand * 1000) + ($hundred * 100) + ($tens * 10)))) ;
      $ones = intval($sum4);

      //Uses the thousands , hundreds etc  to convert the integer into Roman Numerals 
      $RomTH = array("","M","MM","MMM");
      $RomH  = array("","C","CC","CCC","CD","D","DC","DCC","DCCC","CM");
      $RomT  = array("","X","XX","XXX","XL","L","LX","LXX","LXXX","XC");
      $RomO  = array("","I","II","III","IV","V","VI","VII","VIII","IX");
      if ($thousand < 4) {

        $RomanNum = $RomTH[$thousand]."".$RomH[$hundred]."".$RomT[$tens]."".$RomO[$ones];
      }
      else {
        $RomanNum = "Please enter a number below 4000";
      }





        return view('result' , compact('SearchVal','RomanNum'));




      }
}
