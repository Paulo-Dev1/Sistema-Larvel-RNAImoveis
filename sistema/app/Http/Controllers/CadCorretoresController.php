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

    public function create(){
        return view('painel-gerente.corretores.create');
    }

    public function insert(Request $request){
       
        $tabela = new corretore();
        $tabela->nome = $request->nome;
        $tabela->cpf = $request->cpf;
        $tabela->data_nasc = $request->data_nasc;
        $tabela->email = $request->email;
        $tabela->endereco = $request->endereco;
        $tabela->vendas = $request->vendas;

        $itens = corretore::where('cpf', '=', $request->cpf)->orwhere('email', '=', $request->email)->count();
        if ($itens>0){
            echo "<script language='javascript'> window.alert('Registro já Cadastrado !') </script>";
            return view('painel-gerente.corretores.create');

        }
        $tabela->save();
        return redirect()->route('corretores.index');

    }

    public function edit(corretore $item){
        return view('painel-gerente.corretores.edit', ['item' => $item]);   
     }

    public function editar(Request $request, corretore $item){
         
        $item->nome = $request->nome;
        $item->cpf = $request->cpf;
        $item->data_nasc = $request->data_nasc;
        $item->email = $request->email;
        $item->endereco = $request->endereco;
        $item->vendas = $request->vendas;
       
        $itens = corretore::where('cpf', '=', $request->cpf)->orwhere('email', '=', $request->email)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-gerente.corretores.edit', ['item' => $item]);
            
        }
    

      
       

        $item->save();
         return redirect()->route('corretores.index');
 
     }

     public function delete(corretore $item){
        $item->delete();
        return redirect()->route('corretores.index');
     }

     public function modal($id){
        $item = corretore::orderby('id', 'desc')->paginate();
        return view('painel-gerente.corretores.index', ['itens' => $item, 'id' => $id]);

     }
}
