<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

use App\Document;

use App\History;

use App\Subject;



class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id)
    {

        if(request()->has('save_documents')){

        	$this->validate(request(), [

        		'upload_documents' => 'required'

        	]);

        	         

        	$files = request()->file('upload_documents');


            if(request()->hasFile('upload_documents'))
                {
                    foreach ($files as $file) {

                        $file_extension = $file->getClientOriginalExtension();

                        $file_name = $file->hashName();

                        $original_name = $file->getClientOriginalName();    

                        $file->store('public/documents');

                        Document::create([

                            'file_name' => $file_name,
                            'subject_id' => $id,
                            'original_name' => $original_name,
                            'file_extension' => $file_extension

                        ]);


                        History::create([
                            'subject_id' =>$id,
                            'name_of_user' => Auth::user()->name,
                            'action' => 'Ucitao dokument'.' '.$original_name

                        ]);
                       
                    }
                }

            
        	return redirect()->back()->with('success', 'ok');
        }

        if(request()->has('update_subject_button')){

            $update_subject = Subject::find($id);

            $update_subject->municipality_id = request('mun-from-createsubject');

            $update_subject->city_id = request('city-from-createsubject');

            $update_subject->unit_id = request('unit-from-createsubject');

            $update_subject->owner = request('owner');

            $update_subject->user_id = request('user-from-createsubject');

            $update_subject->subjecttype = request('subjecttype-from-createsubject');

            $update_subject->title = request('title-from-createsubject');

            $update_subject->archive = 'arhiviran';

            $update_subject->save();

            History::create([
                'subject_id' =>$id,
                'name_of_user' => Auth::user()->name,
                'action' => 'Arhivirao predmet'

            ]);

            return redirect()->back()->with('success', 'ok');

        }
    }

    public function delete($id)
    {
    	$id_for_delete = request('id_for_delete');

    	$document_for_delete = Document::find($id_for_delete);

    	$name_for_delete = $document_for_delete->file_name; 

    	unlink(storage_path('app/public/documents/'.$name_for_delete));

    	$document_for_delete->delete();

        $id = $document_for_delete->subject_id;

        $auth_user = Auth::user();

        History::create([
            'subject_id' => $id,
            'name_of_user' => $auth_user->name,
            'action' => 'Obrisao dokument'.' '.$document_for_delete->original_name

        ]);

    	return redirect()->back()->with('success', 'ok');
    }

    public function show($id)
    {
        $document_for_show = Document::find($id);

        $name_for_show = $document_for_show->file_name;

        $pathToFile = storage_path('app/public/documents/'.$name_for_show);

        $id = $document_for_show->subject_id;

        $auth_user = Auth::user();

        History::create([
            'subject_id' => $id,
            'name_of_user' => $auth_user->name,
            'action' => 'Pregledao dokument'.' '.$document_for_show->original_name

        ]);

        

        return response()->file($pathToFile);
        
    }
}
