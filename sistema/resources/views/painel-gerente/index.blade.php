@extends('template.painel-gerente')
@section('title', 'Painel Gerência')
@section('content')
<?php 
@session_start();
if(@$_SESSION['nivel_usuario'] != 'gerente'){ 
  echo "<script language='javascript'> window.location='./' </script>";
}
?>
Home do Admin
@endsection