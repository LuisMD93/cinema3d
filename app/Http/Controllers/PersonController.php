<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller {
  
    function index (){
       
       $personList = Person::all();
       return View('person.index' , compact('personList'));
    }


    function create(){

      return View('Person.create');
    }

    function store(Request $request ) {
   
         $validator =  Validator::make($request->all(),[
            'nombres'         => 'required|string|max:255',
            'apellidos'       => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'ninos'           => 'required|integer|min:0',
            'madreCabeza'     => 'required|in:Sí,No',
            'estudio'         => 'required|in:Sí,No',
            'generos'         => 'nullable|array',
            'generos.*'       => 'string', 
         ]);

       if($validator->fails()){
                return back()->withErrors($validator)->withInput();
       }else{
               //dd($request->all());
               Person::create($request->all());
               return redirect("/person")->with('type','success')->with('message','Registro creado exitosamente');
        }
  
    }


    function edit(string $id) {

        $dataPerson = Person::find($id);
        return View('Person.edit',compact('dataPerson'));
    }


    function update(Request $request ,Person $Person) {
     
        #return response()->json($request);
        $validator = Validator::make($request->all(),["name_Person"=>"required|max:50","description"=>"required|max:150"]);

        if($validator->fails()){
               return back()->withErrors($validator)->withInput();
        }else{
               $Person->update($request->all());
               return redirect("/Person")->with('type','warning')->with('message','Registro actualizado exitosamente');
        }
      
    }


    function destroy(string $id) {
     
               Person::destroy($id);
               return redirect("/Person")->with('type','danger')->with('message','Registro se elimino exitosamente');
    }
}
