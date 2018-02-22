<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Inspection;

use App\Department;

class InspectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function read()
    {

    	$inspections = Inspection::all();

    	$departments = Department::all();

    	return view('groups/inspection', compact('inspections', 'departments'));
    }

    public function create(Request $request)
    {
    	if ($request->has('form1')){

        $this->validate(request(), [
            'inspection_name' => 'required',
            'choose-dep-for-inspection' => 'required'
            ]);

    	Inspection::create([

            'inspection_name' => request('inspection_name'),
            'department_id' => request('choose-dep-for-inspection')
            ]);
        
     
   	    return redirect('controlpanel/inspection');

    }

        if ($request->has('form2')){

            $this->validate(request(), [
            'choose-inspection' => 'required'
            ]);

            $insp_id = request('choose-inspection');

            $inspections = Inspection::all();

            $departments = Department::all();

            $inspection_for_update = Inspection::find($insp_id);



            return view('groups/inspection', compact('inspections', 'inspection_for_update', 'departments'));



        }

        if ($request->has('form3')){

            $inspection_id = request('update_inspection_id');

            $update_inspection_name = request('update_inspection_name');

            $dep_id_for_inspection = request('choose-dep-for-inspection');

            $update_inspection = Inspection::find($inspection_id);

            if(!empty($update_inspection_name)){

                $update_inspection->inspection_name = $update_inspection_name;
            }

            if(!empty($dep_id_for_inspection)){

                $update_inspection->department_id = $dep_id_for_inspection;
            }

            $update_inspection->save();

           

            return redirect('controlpanel/inspection');


        }

        if ($request->has('form4')){

            $this->validate(request(), [
            'choose-inspection' => 'required'
            ]);

            $inspection_id = request('choose-inspection');

            $delete_inspection = Inspection::find($inspection_id);

            $delete_inspection->delete();

            return redirect('controlpanel/inspection');


        }
    }
    
}
