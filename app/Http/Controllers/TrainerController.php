<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;

class TrainerController extends Controller
{
    public function index(){
        return Trainer::get();
    }

    public function show($id){
        return Trainer::find($id);
    }

    public function create(Request $request){
        try{
            $request->validate([
                'name'=>'required',
                'lastname'=>'required',
                'age'=>'required',
                'birthday'=>'required',

            ]);
        }catch (\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }

        Trainer::create([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'age'=>$request->age,
            'birthday'=>$request->birthday,
        ]);
        return 'creada con exito';
    }

    public function update(Request $request, $id){
        Trainer::where('id', $id)
            ->update(['name' => $request->name,
                'lastname' => $request->lastname,
                'age' => $request->age,
                'birthday'=>$request->birthday]);

        return 'actualizado con exito';
    }

    public function destroy($id){
        Trainer::where('id',$id)->delete();
        return 'Eliminado con exito ';
    }
}
