<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelCard;

class CardController extends Controller
{
    //

    public function showCard (){
        
        try {
            $card = ModelCard::all();
            return response()->json($card);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
