<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Department;

use App\Inspection;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function read()
    {
    	$users = User::all();

    	$departments = Department::all();

    	$inspections = Inspection::all();

    	return view('groups/user', compact('users', 'departments', 'inspections'));
    }

    public function create(Request $request)
    {
    	if ($request->has('form1')){

            $this->validate(request(), [

        		'name' => 'required',
        		'username' => 'required|unique:users|between:1,20',
        		'password' => 'required|min:3',
        		'status' => 'required',
                'active' => 'required',
        		'choose-dep-from-user' => 'required',
        		'choose-insp-from-user' => 'required'

        		]);

        	

        	//create and save the user
        	
        	User::create([

                'name' => request('name'),
                'username' => request('username'),
                'password' => request('password'),
                'status' => request('status'),
                'active' => request('active'),
                'department_id' => request('choose-dep-from-user'),
                'inspection_id' => request('choose-insp-from-user')
                ]);

     	    	
       	
        	return redirect('controlpanel/user');

        }

        if ($request->has('form2')){

            $this->validate(request(), [

            'get-user-from-users' => 'required'

            ]);

            $user_id = request('get-user-from-users');

            $users = User::all();

            $users_for_update = User::find($user_id);

            $inspections = Inspection::all();

            $departments = Department::all();

            return view('groups/user', compact('users_for_update', 'users', 'inspections', 'departments'));


        }

        if ($request->has('form3')){

            $this->validate(request(), [

                'username' => 'unique:users|between:1,20',
                'password' => 'min:3',
               
                ]);

            $user_id = request('update_user_id');
            
            
            $update_user = User::find($user_id);

            if(!empty(request('update_name'))){

                $update_user->name = request('update_name');

            }

            if(!empty(request('update_username'))){

                $update_user->username = request('update_username');

            }

            if(!empty(request('update_password'))){

                $update_user->password = request('update_password');

            }

            if(!empty(request('choose-dep-from-user'))){

                $update_user->department_id = request('choose-dep-from-user');

            }

            if(!empty(request('choose-insp-from-user'))){

                $update_user->inspection_id = request('choose-insp-from-user');

            }

            if(!empty(request('update_status'))){

                $update_user->status = request('update_status');

            }

            if(!empty(request('update_active'))){

                $update_user->active = request('update_active');

                if($update_user->active == 'unactive'){
                    $update_user->password = '';
                }

            }

                        
            $update_user->save();

            return redirect('controlpanel/user');

        }

    }
}
