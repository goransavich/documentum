<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Municipality;

use App\City;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function read()
    {
    	$cities = City::all();

    	$municipalities = Municipality::all();

    	return view('groups.city', compact('municipalities', 'cities'));
    }

    public function create(Request $request)
    {
        if ($request->has('form1')){

         	$this->validate(request(), [
                'choose_municipality'=> 'required',
                'city_name' => 'required|unique:cities'
                
                ]);


            City::create([
                            
                    'municipality_id' => request('choose_municipality'),
                    
                    'city_name' => request('city_name')
                    
                    ]);

            return redirect('controlpanel/city');
            
        }

        if ($request->has('form2')){

            $this->validate(request(), [
            'city-id-from-cities' => 'required'
            ]);

            $city_id = request('city-id-from-cities');

            $cities = City::all();

            $municipalities = Municipality::all();

            $city_for_update = City::find($city_id);

            return view('groups/city', compact('cities', 'city_for_update', 'municipalities'));

        }

        if ($request->has('form3')){

            $update_city_id = request('update_city_id');

            $update_city_name = request('update_city_name');

            $update_city = City::find($update_city_id);

            if(!empty($update_city_name)){

                $update_city->city_name = $update_city_name;

                $update_city->save();
            }

            

            return redirect('controlpanel/city');

        }

        if ($request->has('form4')){

                $this->validate(request(), [
                'city-id-from-cities' => 'required'
                ]);
            
                $city_id = request('city-id-from-cities');

                $city_for_delete = City::find($city_id);

                $city_for_delete->delete();

                return redirect('controlpanel/city');
        
        }

        
  	
    }
}
