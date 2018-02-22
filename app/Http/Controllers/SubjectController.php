<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Department;

use App\Municipality;

use App\City;

use App\Clas;

use App\Unit;

use App\User;

use App\Subject;

use DB;

use App\Document;

use App\History;


class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function read()
    {
    	   

        $departments = Department::all();

    	$municipalities = Municipality::all();

    	$cities = City::all();

    	$clases = Clas::all();

    	$units = Unit::all();

    	$users = User::all()->where('active', 'active');

      	$today_date = date("j. n. Y.");

    	return view('createsubject', compact('today_date', 'departments', 'municipalities', 'cities', 'units', 'users', 'clases'));
        }
  

    public function getmunicipality(Request $request)
    {
        

           $cities = City::select('city_name', 'city_id')->where('municipality_id', $request->id)->get();
                 
           return response()->json($cities);

    }

    public function getClas(Request $request)
    {

        $departid = $request->id;

        $clases = Department::find($departid)->classes()->get();

        return response()->json($clases);

    }
    
    public function getUnit(Request $request)
    {
            $units = Unit::select('unit_label', 'unit_name', 'unit_id')->where('department_id', $request->id)->get();

        return response()->json($units);
    }

    public function create()
    {
        //validate request

        $this->validate(request(), [

                'choose-mun-from-create-subject' => 'required',
                'choose-city-from-create-subject' => 'required',
                'choose-dep-from-create-subject' => 'required',
                'choose-clas-from-create-subject' => 'required',
                'choose-unit-from-create-subject' => 'required',
                'owner' => 'required',
                'choose-user-from-create-subject' => 'required',
                'controlled',
                'choose-subjecttype-from-create-subject' => 'required',
                'title' => 'required'
            

                ]);

        $dep_id = request('choose-dep-from-create-subject');

        $dep = Department::find($dep_id);

        $dep_label = $dep->department_label;

        $clas_id= request('choose-clas-from-create-subject');

        $clas = Clas::find($clas_id);

        $clas_label = $clas->clas_label;

        $unit_id = request('choose-unit-from-create-subject');

        $unit = Unit::find($unit_id);

        $unit_label = $unit->unit_label;

        $subject_date = request('subject_date');

        $ord_year = date('Y');

        $result = Subject::where('department_id', $dep_id)->where('clas_id', $clas_id)->where('ord_year', $ord_year)->get();

        $ord_number = count($result)+1;

        $archive = 'aktivan';
        

        // create subject

        Subject::create([

            'city_id' => request('choose-city-from-create-subject'),
            'clas_id' => request('choose-clas-from-create-subject'),
            'department_id' => request('choose-dep-from-create-subject'),
            'municipality_id' => request('choose-mun-from-create-subject'),
            'unit_id' => request('choose-unit-from-create-subject'),
            'user_id' => request('choose-user-from-create-subject'),
            'title' => request('title'),
            'subjecttype' => request('choose-subjecttype-from-create-subject'),
            'controlled' => request('controlled'),
            'owner' => request('owner'),
            'ord_number' => $ord_number,
            'ord_year' => $ord_year,
            'archive' => $archive

        ]);

        $subjects = Subject::all()->last();

        $id = $subjects->subject_id;

        $auth_user = Auth::user();

        History::create([
            'subject_id' => $id,
            'name_of_user' => $auth_user->name,
            'action' => 'Kreirao predmet'

        ]);

        //redirect

        return view('createsuccess', compact('subjects', 'dep_label', 'clas_label', 'ord_number', 'ord_year', 'unit_label'));
    }

    public function success()
    {

        return view('createsuccess');
    }

    public function show($id)
    {
        $subject = Subject::find($id);
        
        $municipality = Municipality::find($subject->municipality_id);

        $municipalities = Municipality::all();

        $city = City::find($subject->city_id);

        $cities = City::all();

        $dep = Department::find($subject->department_id);

        $clas = Clas::find($subject->clas_id);

        $unit = Unit::find($subject->unit_id);

        $units = Unit::where('department_id', $subject->department_id)->get();

        $user = User::find($subject->user_id);

        $users = User::all();

        $auth_user = Auth::user();

        History::create([
            'subject_id' => $id,
            'name_of_user' =>$auth_user->name,
            'action' => 'Pregledao predmet'

        ]);

        $documents = Document::where('subject_id', $id)->get();

        $subject_history = History::where('subject_id', $id)->get();

        return view('groups.subject', compact('subject', 'dep', 'clas', 'unit', 'municipality', 'municipalities', 'city', 'cities', 'units', 'user', 'users', 'documents', 'subject_history'));
    }

    public function update($id)
    {

        $subject = Subject::where('subject_id', $id)->update([

            'municipality_id' => request('mun-from-createsubject'),
            'city_id' => request('city-from-createsubject'),
            'unit_id' => request('unit-from-createsubject'),
            'owner' => request('owner'),
            'user_id' => request('user-from-createsubject'),
            'subjecttype' => request('subjecttype-from-createsubject'),
            'title' => request('title-from-createsubject'),
            'archive' => 'arhiviran'

        ]);

        $auth_user = Auth::user();

        History::create([
            'subject_id' => $id,
            'name_of_user' =>$auth_user->name,
            'action' => 'Arhivirao predmet'

        ]);

        return redirect()->back();

    }

    
}
