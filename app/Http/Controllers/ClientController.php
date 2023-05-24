<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Client;
use Illuminate\Support\Facades\Auth;


class ClientController extends Controller
{
    // Se crea metodo index para pasar los datos a la vista
    public function index()
    {
        // Se le pasa solo el id del usuario autenticado
        $clients = \App\Client::where('user_id', Auth::user()->id)->get();
        return view('client', compact('clients'));    
    }

    // Se crea metodo index para pasar los datos a la vista
    public function clientExample()
    {
        return [
            "tutor" => "Jonier Cabrera",
            "Canal Youtube" => "Fiebre de tecnologia"
        ];    
    }
}
