<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function login(Request $request){
        
        $usuario = $request->usuario;
        $senha = $request->senha;

        $usuarios = usuario::where('usuario', '=', $usuario)->orwhere('cpf', '=', $usuario)->where('senha', '=', $senha)->first();
        
        //verificação se ele é diferente de nulo
        if(@$usuarios->id != null){
            @session_start();
            $_SESSION['id_usuario'] = $usuarios->id;
            $_SESSION['nome_usuario'] = $usuarios->nome;
            $_SESSION['nivel_usuario'] = $usuarios->nivel;
            $_SESSION['cpf_usuario'] = $usuarios->cpf;
            
            //condição de nivel do sistema
            if($_SESSION['nivel_usuario'] == 'gerente'){
                return view('painel-gerente.index');
            }
            
            if($_SESSION['nivel_usuario'] == 'corretora'){
                return view('painel-corretora.index');
            }

            if($_SESSION['nivel_usuario'] == 'cliente'){
                return view('painel-cliente.index');
            }
            
    	    

        }else{
            echo "<script language='javascript'> window.alert('Dados Incorretos!') </script>";
            return view('index');
        }
        
       
    }


    public function logout(){
       @session_start();
       @session_destroy();
       return view('index');
    }
}
