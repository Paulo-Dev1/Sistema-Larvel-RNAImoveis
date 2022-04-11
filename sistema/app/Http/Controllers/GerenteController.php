<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class GerenteController extends Controller
{
    public function index(){
        return view ('painel-gerente.index');
    }
    public function editar(Request $request, usuario $usuario){
        
        $usuario->nome = $request->nome;
        $usuario->cpf = $request->cpf;
        $usuario->usuario = $request->usuario;
        $usuario->senha = $request->senha;
        $usuario->save();
        return redirect()->route('gerente.index');

    }
}
