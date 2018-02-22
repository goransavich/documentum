<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Clas;

use App\Department;

use App\Subject;

class ClasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function read()
    {
    	$classes = Clas::all();

    	$departments = Department::all();

    	return view('groups/clas', compact('classes', 'departments'));
    }

    public function create(Request $request)
    {
        if ($request->has('form1')){

        	$this->validate(request(), [

        			'belongstodepartment' => 'required',
                    'clas_label'=> 'required|unique:classes',
                    'clas_name' => 'required'
                    
                    ]);

            $belongstodepartment = request('belongstodepartment');

        	Clas::create([

                'clas_label' => request('clas_label'),

                'clas_name' => request('clas_name')
                
                ]);

            $clas = Clas::all()->last();

            $clas->departments()->attach($belongstodepartment);

            return redirect('controlpanel/clas');
    	
        }

        if ($request->has('form2')){

            $this->validate(request(), [

            'clas-id-from-classes' => 'required'

            ]);

            $clas_id = request('clas-id-from-classes');
            
            $classes = Clas::all();

            $departments = Department::all();

            $clas_for_update = Clas::find($clas_id);

            return view('groups/clas', compact('classes', 'clas_for_update', 'departments'));
        }

        if ($request->has('form3')){

            $update_clas_id = request('update_clas_id');

            $update_clas_name = request('update_clas_name');

            $update_belongstodepartment = request('update_belongstodepartment');

            $update_clas = Clas::find($update_clas_id);
      

            if(!empty($update_clas_name)){

                $update_clas->clas_name = $update_clas_name;

                $update_clas->save();
            }

            if(!empty($update_belongstodepartment)){

                $update_clas->departments()->attach($update_belongstodepartment);

            }
            
            return redirect('controlpanel/clas');

        }

        if ($request->has('form4')){

                $this->validate(request(), [
                'clas-id-from-classes' => 'required'
                ]);
            
                $clas_id = request('clas-id-from-classes');

                $clas_for_delete = Clas::find($clas_id);

                $find_busy_clases = Subject::where('clas_id', $clas_id)->get();

                if(count($find_busy_clases) == 0){

                    $clas_for_delete->delete();

                    $clas_for_delete->departments()->detach();

                    return redirect('controlpanel/clas');

                } 

                else {

                    

                    return redirect('controlpanel/clas')->with('greska_klasa', 'Ne možete obrisati ovu klasu pošto je aktivirana u predmetima');
            }

                
        
        }
    }
}
