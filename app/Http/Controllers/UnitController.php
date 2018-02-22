<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;

use App\Unit;

use DB;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function read()
    {

    	$departments = Department::all();

    	return view('groups/unit', compact('departments'));
    }

    public function create(Request $request)
    {

        if ($request->has('form1')) {
    
        	$dep_id = request('choose-dep-in-unit');

        	$list_of_units = DB::table('units')->where('department_id', $dep_id)->orderBy('unit_label', 'asc')->get();

            $departments = Department::all();

            return view('groups/unit', compact('departments', 'list_of_units'));
    }

        if ($request->has('form2')) {

            $request->validate([
                'choose-dep-for-unit' => 'required',
                'unit_label' => 'required',
                'unit_name' => 'required'
            ]);

            Unit::create([

            'department_id' => request('choose-dep-for-unit'),  

            'unit_label' => request('unit_label'),

            'unit_name' => request('unit_name')
            
            ]);
            
            return redirect('controlpanel/unit');

        }


        if ($request->has('form3')){

            $unit_id = request('unit-id-from-units');

            $unit_for_update = Unit::find($unit_id);

            $dep_id = $unit_for_update->department_id;

            $list_of_units = DB::table('units')->where('department_id', $dep_id)->orderBy('unit_label', 'asc')->get();

            $departments = Department::all();

            return view('groups/unit', compact('departments', 'list_of_units', 'unit_for_update'));


        }

        if ($request->has('form4')){

            $update_unit_id = request('update_unit_id');

            $update_unit_label = request('update_unit_label');

            $update_unit_name = request('update_unit_name');

            $update_unit = Unit::find($update_unit_id);

            if(!empty($update_unit_label)){

                $update_unit->unit_labe = $update_unit_label;
                
            }


            if(!empty($update_unit_name)){

                $update_unit->unit_name = $update_unit_name;
                
            }

            $update_unit->save();

            return redirect('controlpanel/unit');

        }

        if ($request->has('form5')){

                $this->validate(request(), [

                'unit-id-from-units' => 'required'

                ]);
            
                $unit_id = request('unit-id-from-units');

                $unit_for_delete = Unit::find($unit_id);

                $unit_for_delete->delete();

                return redirect('controlpanel/unit');
        
        }

    	

    }
}
