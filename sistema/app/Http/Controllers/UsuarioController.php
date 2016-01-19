<?php 
namespace Cinema\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;
use Cinema\Http\Controllers;
use Cinema\User;
use Session;
use Redirect;
use Illuminate\Routing\Route;

class UsuarioController extends Controller
{


public function store(Request $request)
    {
        User::create($request->all());
        Session::flash('message','Usuario Creado Correctamente');
        return Redirect::to('/usuario');
    }


   } 