<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;

class GAController extends Controller
{
    /*
	* Function to load the view
	* Added on: 27.03.2018
	*/
	 public function index(){
	 	return view('index');
	 }
	/*
	* Function to handle ajax request
	* Added on: 27.03.2018
	*/
    public function analytics(Request $request){

    	$startDate = new \DateTime($request->start);
		$endDate = new \DateTime($request->end);

		$period = Period::create($startDate, $endDate);
		$analyticsData = Analytics::fetchVisitorsAndPageViews($period);
		return \Response::json(compact('analyticsData'));
    }
}
