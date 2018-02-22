<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Dompdf\Dompdf;

use PDF;

use App\Subject;

use App\Department;

use App\Clas;

use App\Unit;



class DownloadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id)
    {
    	$subject = Subject::find($id);

    	$department = Department::find($subject->department_id);

    	$clas = Clas::find($subject->clas_id);

    	$unit = Unit::find($subject->unit_id);

    	$dompdf = new Dompdf();
		
		$dompdf = PDF::loadView('omot', compact('subject', 'department', 'clas', 'unit'));
		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

		
		// Output the generated PDF to Browser
		return $dompdf->stream('download.pdf');
    	

    }
}
