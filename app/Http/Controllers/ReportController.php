<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;

use App\Subject;

use DB;

class ReportController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function read()
    {
    	$current_year = date('Y');

    	return view('reports', compact('current_year'));
    }

    public function create(Request $request)
    {
    	if ($request->has('department_report')){


    		$year = request('choose-year-from-reports');

    		
    		//Search Subjects by department
    		
    		$result_department = Subject::groupBy('department_id')->select('department_id',

                 DB::raw('sum(archive = "aktivan") total_aktivan'),
                 DB::raw('sum(archive = "arhiviran") total_arhiviran'))->where('ord_year', $year)->get();
    		
    		
    		$current_year = date('Y');

    		
    		return view('reports', compact('current_year', 'result_department'));

        }

        if ($request->has('clas_report')){

        	$year = request('choose-year-from-reports');

        	//search Subjects by clas

        	$result_clas = Subject::groupBy('clas_id')->select('clas_id',

	    		 DB::raw('sum(archive = "aktivan") total_aktivan'),
	    		 DB::raw('sum(archive = "arhiviran") total_arhiviran'))->where('ord_year', $year)->get();

        	$current_year = date('Y');

        	return view('reports', compact('current_year', 'result_clas'));

        }

        if ($request->has('inspektor_report')){

        	$year = request('choose-year-from-reports');

        	//Search Subjects by user

        	$result_user = Subject::groupBy('user_id')->select('user_id',

	    		 DB::raw('sum(archive = "aktivan") total_aktivan'),
	    		 DB::raw('sum(archive = "arhiviran") total_arhiviran'))->where('ord_year', $year)->get();

        	$current_year = date('Y');

        	return view('reports', compact('current_year', 'result_user'));



        }

        if ($request->has('active_report')){

        	$year = request('choose-year-from-reports');

        }
    }
}
