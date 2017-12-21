<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use App\SchoolRankingCriterium;
use App\Rank;

class PagesController extends Controller
{
    public function index(){

    	$ranks = Rank::all();

        //dd($ranks);
    	// $schools = School::paginate(2);
    	return view('index', compact('ranks'));
    }

    public function generateRank(Request $request){

    	$ranks = Rank::all();

    	foreach ($ranks as $key => $rank) {
    		Rank::destroy($rank->id);
    	}

    	$schools = School::all();
    	$result = array();

    	foreach ($schools as $key => $school) {
    		array_push($result,  array($school->id, $this->calculateWeightedSum($school)));
    	}
    	$this->sortBy($result, 1, true);
    	
    	for ($i=0; $i < count($result); $i++) { 
    		$rank = new Rank;
    		$rank->school_id = $result[$i][0];
    		$rank->rank = $i+1;
    		$rank->save();
    	}

        return redirect()->back();
    }

    public function sortBy(&$items, $key, $descending = false){
      if (is_array($items)){
        return usort($items, function($a, $b) use ($key, $descending){
          $cmp = strCmp($a[$key], $b[$key]);
          return $descending? -$cmp : $cmp;
        });
      }
      return false;
    }

    public function calculateWeightedSum($school){
    	$criterias = SchoolRankingCriterium::where('school_id', $school->id)->get();
    	$total = 0;

    	if(count($criterias)<1){
    		return 0;
    	}
    	foreach ($criterias as $key => $criteria) {
    		$min = SchoolRankingCriterium::where('class', $criteria->class)->min('fee');
    		$max = SchoolRankingCriterium::where('class', $criteria->class)->max('fee');
    		$value = SchoolRankingCriterium::where('class', $criteria->class)->where('school_id', $school->id)->first();

    		if($max == $min){
    			$max++;
    		}

    		$score1  = (($value->fee-$min)/($max-$min))*100;

    		$min = SchoolRankingCriterium::where('class', $criteria->class)->min('pass');
    		$max = SchoolRankingCriterium::where('class', $criteria->class)->max('pass');

    		if($max == $min){
    			$max++;
    		}

    		$score2  = (($value->pass-$min)/($max-$min))*100;

    		$min = SchoolRankingCriterium::where('class', $criteria->class)->min('attendance');
    		$max = SchoolRankingCriterium::where('class', $criteria->class)->max('attendance');

    		if($max == $min){
    			$max++;
    		}

    		$score3  = (($value->attendance-$min)/($max-$min))*100;

    		$min = SchoolRankingCriterium::where('class', $criteria->class)->min('students');
    		$max = SchoolRankingCriterium::where('class', $criteria->class)->max('students');

    		if($max == $min){
    			$max++;
    		}

    		$score4  = (($value->students-$min)/($max-$min))*100;

    		$total = $total - 0.2*$score1 + 0.5*$score2 + 0.4*$score3 + 0.3*$score4;
    	}

    	return $total/count($criterias);
    }
    public function about(){
    	return view('pages.about');
    }
}
