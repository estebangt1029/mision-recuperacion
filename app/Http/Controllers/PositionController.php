<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function index(){
        return Position::get();
    }

    public function show($id){
        return Position::find($id);
    }

    public function create(Request $request){
        try{
            $request->validate([
                'name'=>'required',
                'sport_id'=>'required',
            ]);
        }catch (\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }

        Position::create([
            'name'=>$request->name,
            'sport_id'=>$request->sport_id,
        ]);
        return 'creada con exito';
    }

    public function update(Request $request, $id){
        Position::where('id', $id)
            ->update(['name' => $request->name,
                'sport_id'=>$request->sport_id,
            ]);

        return 'actualizado con exito';
    }

    public function destroy($id){
        Position::where('id',$id)->delete();
        return 'Eliminado con exito ';
    }
}
