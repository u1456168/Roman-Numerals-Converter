<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\record;
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
      if ($thousand < 4 && $SearchVal > 0) {

        $RomanNum = $RomTH[$thousand]."".$RomH[$hundred]."".$RomT[$tens]."".$RomO[$ones];

        // If the record already exists , update the record
        $ExistingRecord = record::where('RomanNumeral', '=', $RomanNum)->first();

        if (!empty($ExistingRecord)) {

          $id = $ExistingRecord->id;
          $Record =  record::find($id);
          $Counter = ($Record->TimesConverted) + 1;
          $Record->TimesConverted = $Counter;
          $Record->LastConverted = Carbon::now();
          $Record->save();

        }
        // If the record doesnt exist , create a new record.
        else {
          // Store record in DB
          $Record = new record;
          $Record->RomanNumeral = (string)$RomanNum;
          $Record->TimesConverted = 1;
          $Record->LastConverted = Carbon::now();
          $Record->save();

        }

      }
      elseif ($SearchVal < 1) {
        $RomanNum = "Please enter a number above 0";
      }
      else {
        $RomanNum = "Please enter a number below 4000";
      }


        return view('result' , compact('SearchVal','RomanNum'));




      }
      // Get the recent (Last 10) Numerals converted
      public function showRecent(Request $request) {
        $Record= record::orderBy('LastConverted','desc')->take(10)->get();
        return view('recent' , compact('Record'));




      }
      // get the Top 10 Numerals converted
      public function showTop(Request $request) {
        $Record= record::orderBy('TimesConverted','desc')->take(10)->get();
        return view('top' , compact('Record'));




      }
}
