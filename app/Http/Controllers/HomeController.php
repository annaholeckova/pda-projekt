<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Student;
use App\Work;
use App\WorkCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$avgPay = DB::table('works')
			->select(
				DB::raw('month(starts_at) AS month') ,
				DB::RAW('AVG(pay) as pay'))
    		->groupBy(DB::raw('month(starts_at)'))
			->get();



		$agencies = Agency::with('works')->get();
		$sortedAgencies = $agencies->sortBy(function($agency){
			return $agency->works->count();
		});
		$sortedAgencies = $sortedAgencies->values()->take(5);


		$categories = WorkCategory::with('works')->get();
		$sortedCategories = $categories->sortBy(function($category){
			return $category->works->count();
		});

		$sortedCategories = $sortedCategories->values()->take(5);


        return view('dashboard.index', ['agencies' => $sortedAgencies, 'categories' => $sortedCategories, 'pay' => $avgPay]);
    }
}
