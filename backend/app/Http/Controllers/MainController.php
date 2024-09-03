<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelGame;


class MainController extends Controller
{
    //
    public function showGame (){
        
        try {
            $allgame = ModelGame::all();
            return response()->json($allgame);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
