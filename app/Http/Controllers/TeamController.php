<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(){
        return Team::get();
    }

    public function show($id){
        return Team::find($id);
    }

    public function create(Request $request){
        try{
            $request->validate([
                'name'=>'required',
                'description'=>'required',
                'average'=>'required',
                'sport_id'=>'required',
                'trainer_id'=>'required',

            ]);
        }catch (\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }

        Team::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'average'=>$request->average,
            'sport_id'=>$request->sport_id,
            'trainer_id'=>$request->trainer_id
        ]);
        return 'creada con exito';
    }

    public function update(Request $request, $id){
        Team::where('id', $id)
            ->update(['name' => $request->name,
                'description' => $request->description,
                'average' => $request->average,
                'sport_id'=>$request->sport_id,
                'trainer_id'=>$request->trainer_id,
            ]);

        return 'actualizado con exito';
    }

    public function destroy($id){
        Team::where('id',$id)->delete();
        return 'Eliminado con exito ';
    }
}
