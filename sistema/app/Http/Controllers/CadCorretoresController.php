<?php

namespace App\Http\Controllers;

use App\Models\corretore;
use Illuminate\Http\Request;

class CadCorretoresController extends Controller
{
    public function index(){
        $tabela = corretore::orderby('id', 'desc')->paginate();
        return view('painel-gerente.corretores.index', ['itens' => $tabela]);
    }

}
