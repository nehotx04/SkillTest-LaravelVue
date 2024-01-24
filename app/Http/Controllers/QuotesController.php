<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Models\FavoriteQuote;
use Illuminate\Support\Facades\Auth;

class QuotesController extends Controller
{
public function getFiveQuotes(){

    $client = new Client();
    for ($i=0; $i < 5; $i++) { 
        $response = $client->get('https://dummyjson.com/quotes/random');
        $res[$i] = json_decode($response->getBody(), true);
    }

    // Procesa los datos de la respuesta de la API según tus necesidades

    return $res;
}

public function markAsFavorite(Request $request)
{
    
    $quote = new FavoriteQuote;
    $quote->quote =  $request->quote;
    $quote->author =  $request->author;
    $quote->quote_id =  $request->id;
    if (Auth::check()) {
        $userId = Auth::id();
        $quote->user_id = Auth::user()->id;
        return response()->json(Auth::user());
    }else{

        return response('No hay ningun usuario autenticado');
    }
    $quote->save();


}

public function getFavorites(){
    $favorites = FavoriteQuote::where('user_id', '=', Auth::user()->id)->get();
    return response()->json($favorites);
}

public function deleteFavorite($id){
    $favoriteQuote = FavoriteQuote::find($id);
    
    if ($favoriteQuote) {
        $favoriteQuote->delete();
        return response()->json(['mensaje' => 'Quote Deleted successfully']);
    } else {
        return response()->json(['mensaje' => 'Id not found']);
    }
}

}
