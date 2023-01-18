<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;

class SportController extends Controller
{
    public function index(){
        return Sport::get();
    }

    public function show($id){
        return Sport::find($id);
    }

    public function create(Request $request){
        try{
            $request->validate([
                'name'=>'required',
                'description'=>'required',

            ]);
        }catch (\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }

        Sport::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return 'creada con exito';
    }

    public function update(Request $request, $id){
        Sport::where('id', $id)
            ->update(['name' => $request->name,
                'description' => $request->description,
            ]);

        return 'actualizado con exito';
    }

    public function destroy($id){
        Sport::where('id',$id)->delete();
        return 'Eliminado con exito ';
    }
}
