<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Porducto;
use App\Categoria;
class TiendaController extends Controller
{
    public function index(Request $request)
    {
    	// if($request->get('nombre')){
    	// $nombre= $request->get('nombre');
    	// $productos=Porducto::with('images','categoria')->where('nombre_Pro','like',"%$nombre%")->orderBy('nombre_Pro')->paginate(2);	
    	// }
    	$productos=Porducto::with('images','categoria')->where('activo_Pro','Si')->get();
    	$categorias=Categoria::orderBy('nombre_Cat')->get();

    	return view('tienda.index',compact('productos','categorias'));
        //return $categorias;
    }
}
