<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function read()
    {
        return view('welcome');
    }


    public function create()
    {

        if (! auth()->attempt(request(['username', 'password', 'active'==='active']))){

            return back()->withErrors(['message' => 'Neispravni korisničko ime ili lozinka']);
        }
            
    		
    	

    	//redirect 
        return redirect('dashboard');
    	

        
    }

    public function destroy()
    {
    	auth()->logout();

    	return redirect('/');
    }
}
