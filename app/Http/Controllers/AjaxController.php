<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class AjaxController extends Controller
{
    //
    public function index(){
        return view('ajax/index');
    }


    public function get_data(){
        $model = Employee::all();
        return response()->json(['data' => $model]);    
    }

    public function create(Request $request){
        $post = array_except($request->input(),'_token');
        $name = $post['name'];

        $unit = new Employee;
        $unit->name = $name;
        $unit->address = 'bekasi';
        $unit->phone_number = '1235242`';
        $unit->email = 'dadadaad@yahoo.com';
        $unit->save();

        return response()->json(['success' => true]); 
    }
}
