<?php

namespace App\Http\Controllers;
use App\Models\Marcas;

use Illuminate\Http\Request;

class MarcasController extends Controller
{
    public function index()
    {
        $marca = Marcas::all();
        return view('marcas',compact('marca'));
    }

    # Criar
    public function store(Request $request){

        # dd($request->all());
        $validatedData = $request->validate([
            'marcas' => 'required|string',
            'tipo'   => 'required|string',
        ]);

        Marcas::create([
            'marcas' => $validatedData['marcas'],
            'tipo'   => $validatedData['tipo']
        ]);
        return redirect()->back()->with('success','Marca cadastrada com sucesso');
    }

}
