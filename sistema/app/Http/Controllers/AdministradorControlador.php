<?php
namespace Aplicacion\Http\Controllers;
use Illuminate\Routing\Controller;

class AdministradorControlador extends Controller
{

 public function getAdministrador(){
           return view('administrador');
    }
/*
public function postAdministrador(){
           return view('administrador');
    }*/
}