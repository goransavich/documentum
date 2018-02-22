<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Municipality;

class MunicipalityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function read()
    {
    	
    	$municipalities = Municipality::all();

    	return view('groups/municipality', compact('municipalities'));
    }

    public function create(Request $request)
    {
        if ($request->has('form1')){

        	$this->validate(request(), [
                'municipality_name' => 'required|unique:municipalities'
                ]);

        	Municipality::create([

                'municipality_name' => request('municipality_name')
                
                ]);
            
         
       	    return redirect('controlpanel/municipality');
        }

        if ($request->has('form2')){

            $this->validate(request(), [
            'mun-id-from-municipalities' => 'required'
            ]);

            $mun_id = request('mun-id-from-municipalities');

            $municipalities = Municipality::all();

            $municipality_for_update = Municipality::find($mun_id);

            return view('groups/municipality', compact('municipalities', 'municipality_for_update'));

        }

        if ($request->has('form3')){

            $update_municipality_id = request('update_municipality_id');

            $update_municipality_name = request('update_municipality_name');

            $update_municipality = Municipality::find($update_municipality_id);

            if(!empty($update_municipality_name)){

                $update_municipality->municipality_name = $update_municipality_name;

                $update_municipality->save();
            }

            

            return redirect('controlpanel/municipality');

        }
        
            if ($request->has('form4')){

                $this->validate(request(), [
                'mun-id-from-municipalities' => 'required'
                ]);
            
                $mun_id = request('mun-id-from-municipalities');

                $municipality_for_delete = Municipality::find($mun_id);

                $municipality_for_delete->delete();

                return redirect('controlpanel/municipality');
        
        }

    }


}
