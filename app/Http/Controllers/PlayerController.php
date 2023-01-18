<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function index(){
        return Player::get();
    }

    public function show($id){
        return Player::find($id);
    }

    public function create(Request $request){
        try{
            $request->validate([
                'name'=>'required',
                'lastname'=>'required',
                'score'=>'required',
                'team_id'=>'required',
            ]);
        }catch (\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }

        Player::create([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'score'=>$request->score,
            'team_id'=>$request->team_id,
        ]);
        return 'creada con exito';
    }

    public function update(Request $request, $id){
        Player::where('id', $id)
            ->update(['name' => $request->name,
                'lastname' => $request->lastname,
                'score' => $request->score,
                'team_id'=>$request->sport_id,
            ]);

        return 'actualizado con exito';
    }

    public function destroy($id){
        Player::where('id',$id)->delete();
        return 'Eliminado con exito ';
    }
}
