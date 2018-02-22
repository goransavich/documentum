<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Department;

use App\Clas;

use App\Unit;

use App\User;

use App\Subject;

use DB;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function read()
    {
    	$current_year = date('Y');

        if(Auth::user()->hasRole(['inspektor'])){

            $departments = Department::where('department_id', Auth::user()->department_id)->get();

            $units = Unit::where('department_id', Auth::user()->department_id)->get();

            $users = User::where('user_id', Auth::user()->user_id)->get();

            $clases = Clas::all();
            
        }

        if(Auth::user()->hasRole(['nacelnik'])){

            $departments = Department::where('department_id', Auth::user()->department_id)->get();

            $units = Unit::where('department_id', Auth::user()->department_id)->get();

            $users = User::where('department_id', Auth::user()->department_id)->where('inspection_id', Auth::user()->inspection_id)->get();

            $clases = Clas::all();
            
        }

        if(Auth::user()->hasRole(['pisarnica', 'administrator'])){

        	$departments = Department::all();

        	$clases = Clas::all();

        	$units = Unit::all();

        	$users = User::all();
        }

    	return view('searchsubject', compact('current_year', 'departments', 'clases', 'units', 'users'));
    }

    public function create()
    {
    	$dep_id = request('choose-dep-from-create-subject');
 
    	$clas_id = request('choose-clas-from-search-subject');

    	$number_of_subject = request('number_of_subject');

    	$year = request('choose-year-from-search-subject');

     	$unit_id = request('choose-unit-from-search-subject');

    	$user_id = request('choose-inspektor-from-search-subject');

    	$title = request('choose-title-from-search-subject');

        $archive = request('choose-archive-from-search-subject');

        if(Auth::user()->hasRole(['inspektor'])){

            $subjects = Subject::when($dep_id, function ($query) use ($dep_id){
                        return $query->where('department_id', $dep_id);
                    })
                    ->when($clas_id, function ($query) use ($clas_id){
                        return $query->where('clas_id', $clas_id);
                    })
                    ->when($number_of_subject, function ($query) use ($number_of_subject){
                        return $query->where('ord_number', $number_of_subject);
                    })
                    ->when($year, function ($query) use ($year){
                        return $query->where('ord_year', $year)->where('user_id', Auth::user()->user_id);
                    })
                    ->when($unit_id, function ($query) use ($unit_id){
                        return $query->where('unit_id', $unit_id);
                    })
                    ->when($user_id, function ($query) use ($user_id){
                        return $query->where('user_id', $user_id);
                    })
                    ->when($title, function ($query) use ($title){
                        return $query->where('title', 'LIKE', '%'.$title.'%')->where('user_id', Auth::user()->user_id);
                    })
                    ->when($archive, function ($query) use ($archive){
                        return $query->where('archive', $archive)->where('user_id', Auth::user()->user_id);
                    })->get(); 

                    $departments = Department::where('department_id', Auth::user()->department_id)->get();

                    $units = Unit::where('department_id', Auth::user()->department_id)->get();

                    $users = User::where('user_id', Auth::user()->user_id)->get();

                    $clases = Clas::all();

        }

        if(Auth::user()->hasRole(['nacelnik'])){

            $subjects = Subject::when($dep_id, function ($query) use ($dep_id){
                        return $query->where('department_id', $dep_id);
                    })
                    ->when($clas_id, function ($query) use ($clas_id){
                        return $query->where('clas_id', $clas_id);
                    })
                    ->when($number_of_subject, function ($query) use ($number_of_subject){
                        return $query->where('ord_number', $number_of_subject);
                    })
                    ->when($year, function ($query) use ($year){
                        return $query->where('ord_year', $year)->where('department_id', Auth::user()->department_id);
                    })
                    ->when($unit_id, function ($query) use ($unit_id){
                        return $query->where('unit_id', $unit_id);
                    })
                    ->when($user_id, function ($query) use ($user_id){
                        return $query->where('user_id', $user_id);
                    })
                    ->when($title, function ($query) use ($title){
                        return $query->where('title', 'LIKE', '%'.$title.'%')->where('department_id', Auth::user()->department_id);
                    })
                    ->when($archive, function ($query) use ($archive){
                        return $query->where('archive', $archive)->where('department_id', Auth::user()->department_id);
                    })->get();   

                    $departments = Department::where('department_id', Auth::user()->department_id)->get();

                    $units = Unit::where('department_id', Auth::user()->department_id)->get();

                    $users = User::where('department_id', Auth::user()->department_id)->where('inspection_id', Auth::user()->inspection_id)->get();

                    $clases = Clas::all();           

        }

        if(Auth::user()->hasRole(['pisarnica', 'administrator'])){
        
    	$subjects = Subject::when($dep_id, function ($query) use ($dep_id){
    					return $query->where('department_id', $dep_id);
    				})
    				->when($clas_id, function ($query) use ($clas_id){
    					return $query->where('clas_id', $clas_id);
    				})
    				->when($number_of_subject, function ($query) use ($number_of_subject){
    					return $query->where('ord_number', $number_of_subject);
    				})
    				->when($year, function ($query) use ($year){
    					return $query->where('ord_year', $year);
    				})
    				->when($unit_id, function ($query) use ($unit_id){
    					return $query->where('unit_id', $unit_id);
    				})
    				->when($user_id, function ($query) use ($user_id){
    					return $query->where('user_id', $user_id);
    				})
    				->when($title, function ($query) use ($title){
    					return $query->where('title', 'LIKE', '%'.$title.'%');
    				})
    				->when($archive, function ($query) use ($archive){
    					return $query->where('archive', $archive);
    				})->get();	

                    $departments = Department::all();

                    $clases = Clas::all();

                    $units = Unit::all();

                    $users = User::all();			

    	}

    	$current_year = date('Y');

    	

    	return view('searchsubject', compact('subjects','current_year', 'departments', 'clases', 'units', 'users'));


    }
}
