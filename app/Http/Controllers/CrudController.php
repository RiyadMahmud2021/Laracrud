<?php

namespace App\Http\Controllers;
//namespace pp;

use Illuminate\Http\Request;
use App\Models\Crud;
use Session;

class CrudController extends Controller
{
    public function showData(){

        // $showData = Crud::all(); // get Crud model's table data 
        //$showData = Crud::simplePaginate(5); // get Crud model's table data
        $showData = Crud::paginate(6); // get Crud model's table data 
        return view('show_data',compact('showData'));

    }

    public function addData(){

        return view('add_data');

    }

    public function storeData(Request $request){ // Request is a class. And $request is a instance parameter

        $rules = [ // Form validation rules
            'name' => 'required|max : 10',
            'email' => 'required|email',
        ];
        $customMSG = [ // Form validation Custom message setup
 
            'name.required' => 'Please enter Your Name',
            'name.max' => 'Your name must not be more than 10 charecter',
            'email.required' => 'Please enter Your Email',
            'email.email' => 'Your Email must be a valid email'

        ];
        
        $this->validate($request,$rules,$customMSG); // form validation 

        $crud = new Crud(); // Crud model-class's object creation for getting field of db 'crud' table
        $crud->name = $request->name;  // $crud->name = database field , $resquest->name = from field name
        $crud->email = $request->email;
        $crud->save();

        Session::flash('msg','Successfully Data Added.');
        // return $request->all(); // Laravel data flow checking way (form data taking with post and sending to controller)
                                   // Laravel data flow checking way  : dd() vs var_dump() vs print_r()
        return redirect('/');
    }

    public function editDataPage($id = null){
        $dataRow = Crud::find($id);
        return view('edit_data',compact('dataRow'));
    }

    public function editData(Request $request, $id){ // Request is a class. And $request is a instance parameter

        $rules = [ // Form validation rules
            'name' => 'required|max : 10',
            'email' => 'required|email', 
        ];
        $customMSG = [ // Form validation Custom message setup
 
            'name.required' => 'Please enter Your Name',
            'name.max' => 'Your name must not be more than 10 charecter',
            'email.required' => 'Please enter Your Email',
            'email.email' => 'Your Email must be a valid email'

        ];
        
        $this->validate($request,$rules,$customMSG); // form validation

        $updatingRow = Crud::find($id); // Crud model-class's object creation for getting field of db 'crud' table
        $updatingRow->name = $request->name;  // $crud->name = database field , $resquest->name = from field name
        $updatingRow->email = $request->email;
        $updatingRow->save();

        Session::flash('msg_u','Successfully Data Updated.');
        // return $request->all(); // Laravel data flow checking way (form data taking with post and sending to controller)
                                   // Laravel data flow checking way  : dd() vs var_dump() vs print_r()
        return redirect('/');
    }

    public function deleteData($id = null){
        $deleteingRow = Crud::find($id);
        $deleteingRow -> delete();
        Session::flash('msg_d','Successfully Data deleted.');
        return redirect('/');
    }

}
