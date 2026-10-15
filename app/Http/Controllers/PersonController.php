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
            'madreCabeza'     => 'required|in:Si,No',
            'estudio'         => 'required|in:Si,No',
            'generos'         => 'nullable|array',
            'generos.*'       => 'string', 
         ]);

       if($validator->fails()){
                return back()->withErrors($validator)->withInput();
       }else{
               
               Person::create($request->all());
               return redirect("/person")->with('type','success')->with('message','Registro creado exitosamente');
        }
  
    }


    function edit(string $id) {

        $person = Person::find($id);
        return View('person.edit',compact('person'));
    }


    function update(Request $request ,Person $person) {
     
        $validator =  Validator::make($request->all(),[
            'nombres'         => 'required|string|max:255',
            'apellidos'       => 'required|string|max:255',
            'fecha_nacimient' => 'required|date',
            'ninos'           => 'required|integer|min:0',
            'madre_cabeza'     => 'required|in:Si,No',
            'estudio'         => 'required|in:Si,No',
            'generos'         => 'nullable|array',
            'generos.*'       => 'string', 
         ]);

        if($validator->fails()){
               return back()->withErrors($validator)->withInput();
        }else{
               $person->update($request->all());
               return redirect("/person")->with('type','warning')->with('message','Registro actualizado exitosamente');
        }
      
    }


    function destroy(string $id) {
     
               Person::destroy($id);
               return redirect("/person")->with('type','danger')->with('message','Registro se elimino exitosamente');
    }
}
