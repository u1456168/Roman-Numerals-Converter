<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\record;
use League\Fractal;
use League\Fractal\Manager;
use App\Transformers\recordTransformer;
use App\Transformers\top10Transformer;
use App\Transformers\recentTransformer;
use League\Fractal\Resource\Collection;
class ConversionAPIController extends Controller
{

    private $fractal;
    private $recordTransformer;
    private $top10Transformer;
    private $recentTransformer;

    function __construct(Manager $fractal, recordTransformer $recordTransformer, top10Transformer $top10Transformer , recentTransformer $recentTransformer)
    {
      $this->fractal = $fractal;
      $this->recordTransformer = $recordTransformer;
      $this->top10Transformer = $top10Transformer;
      $this->recentTransformer= $recentTransformer;
    }
  //Search.
  public function index($SearchValue) {
      // Gets the search Value , sorts it into thousands , hundreds , tens and ones.
      $SearchVal = $SearchValue;
      //var_dump($SearchVal);

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

        // If the record already exists , update the record
        $ExistingRecord = record::where('RomanNumeral', '=', $RomanNum)->first();

        if (!empty($ExistingRecord)) {

          $id = $ExistingRecord->id;
          $Record =  record::find($id);
          $Counter = ($Record->TimesConverted) + 1;
          $Record->TimesConverted = $Counter;
          $Record->LastConverted = Carbon::now();
          $Record->save();


          $Record = record::where('RomanNumeral','=', $RomanNum)->get();



        }
        // If the record doesnt exist , create a new record.
        else {
          // Store record in DB
         $Record = new record;
          $Record->RomanNumeral = (string)$RomanNum;
          $Record->TimesConverted = 1;
          $Record->LastConverted = Carbon::now();
          $Record->save();
          $Record = record::where('RomanNumeral','=', $RomanNum)->get();





        }

      }
      else {
        $RomanNum = "Please enter a number below 4000";
      }
      //Uses Fractal to transform the data
      $Record = new Collection($Record, $this->recordTransformer);
      $Record = $this->fractal->createData($Record);
      return $Record->toArray();






      }
      public function showRecent(Request $request) {
        //Uses Fractal to transform the data
        $Record= record::orderBy('LastConverted','desc')->take(10)->get();
        $Record = new Collection($Record, $this->recentTransformer);
        $Record = $this->fractal->createData($Record);
        return $Record->toArray();




      }
      public function showTop(Request $request) {
        //Uses Fractal to transform the data
        $Record= record::orderBy('TimesConverted','desc')->take(10)->get();
        $Record = new Collection($Record, $this->top10Transformer);
        $Record = $this->fractal->createData($Record);
        return $Record->toArray();




      }
}
