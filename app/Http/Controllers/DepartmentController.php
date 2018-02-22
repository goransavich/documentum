<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;

use App\Subject;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function read()
    {
        $departments = Department::all();

    	return view('groups/department', compact('departments'));
    }

    public function create(Request $request)
    {

        if ($request->has('form1')){

        	$this->validate(request(), [
                'department_label'=> 'required|unique:departments',
                'department_name' => 'required'

                ]);

        	Department::create([

                'department_label' => request('department_label'),

                'department_name' => request('department_name')
                
                ]);
        
       	  return redirect('controlpanel/department');
        }

        if ($request->has('form2')){

            $this->validate(request(), [
            'dep-id-from-departments' => 'required'
            ]);
        
            $dep_id = request('dep-id-from-departments');

            $departments = Department::all();

            $department_for_update = Department::find($dep_id);

            return view('groups/department', compact('departments', 'department_for_update'));

        }

        if ($request->has('form3')){

            
            $update_department_id = request('update_department_id');

            $update_department_name = request('update_department_name');

            $update_department = Department::find($update_department_id);

            if(!empty($update_department_name)){

                $update_department->department_name = $update_department_name;
            }

            $update_department->save();

            return redirect('controlpanel/department');

        }

        if ($request->has('form4')){

            $this->validate(request(), [
            'dep-id-from-departments' => 'required'
            ]);
        
            $dep_id = request('dep-id-from-departments');

            $department_for_delete = Department::find($dep_id);

            $find_busy_departments = Subject::where('department_id', $dep_id)->get();

            //dd($find_busy_departments);

            if(count($find_busy_departments) == 0){

                $department_for_delete->delete();

                return redirect('controlpanel/department');
            } 
            else {

                

                return redirect('controlpanel/department')->with('greska', 'Ne možete obrisati ovaj organ pošto sadrži predmete');
            }
        }



    }

    


    

        
}
