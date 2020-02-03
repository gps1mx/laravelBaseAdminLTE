<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Flash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function index() {
        $users = User::orderBy('id', 'ASC')->paginate(50);
        return view('users.index')
        ->with('seccion', 'administracion')
        ->with('subseccion', 'users')
        ->with('users', $users);
    }

    public function create()
    {
        return view('users.create')
            ->with('seccion', 'administracion')
            ->with('subseccion', 'users')
            ;
    }

    public function search(Request $request)
    {      
        $buscado = preg_replace('/\s{2,}/', ' ', $request->buscado);
        // $this->nombre_compuesto();
        $permutar = $this->permutar($buscado);
        $users = User::orderBy('fullname', 'ASC')
            ->where('fullname', 'like', "%$buscado%")
            ->orWhere(function ($query) use ($permutar) {
                foreach($permutar as $permuta) {
                    $query->orWhere('fullname', 'like', "$permuta");
                }
            })
            ->paginate(10000);

        return view('users.search')
            ->with('seccion', 'administracion')
            ->with('subseccion', 'users')
            ->with('users', $users)
            ->with('buscado', $buscado)
        ;
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|string|min:3|max:191',
            'password' => 'required|confirmed|min:8',
        ]);
        $user = New User($request->all() );
        $user->name = $request->email ;
        $user->email = $request->email ;
        $user->fullname = $request->fullname;
        $user->password=bcrypt($request->password);
        $user->save();
        flash("Usuario creado exitosamente")->success();
        // $this->nombre_compuesto();
        return redirect()->route('users.index');

    }

    public function show($id) {
        $user = User::find($id);
        return view('users.show')
            ->with('user', $user)
            ->with('seccion', 'administracion')
            ->with('subseccion', 'users')    
            ;
    }

    public function edit($id) {
        $user = User::find($id);
        return view('users.edit')
            ->with('user', $user)
            ->with('seccion', 'administracion')
            ->with('subseccion', 'users')    
            ;
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'fullname' => 'required|string|min:3|max:191',
        ]);
        $user = User::find($id);
        $user->fullname =$request->fullname ;
        $user->save();
        flash("El usuario ".$user->name." (ID: ".$user->id.") ha sido actualizado correctamente")->success();
        // $this->nombre_compuesto();
        return redirect()->route('users.show', $user->id);
    }

    public function unactive($id)
    {
        $user = User::find($id);
        $user->active='0';
        $user->save();
        flash("El usuario ".$user->name." (ID: ".$user->id.") ha sido desactivado!")->warning();
        return redirect()->route('users.index');
    }

    public function active($id)
    {
        $user = User::find($id);
        $user->active='1';
        $user->save();
        flash("El usuario ".$user->name." (ID: ".$user->id.") ha sido reactivado!")->success();
        return redirect()->route('users.index');
    }

    public function pwd($id) {
        $user = User::find($id);
        return view('users.pwd')
        ->with('seccion', 'administracion')
        ->with('subseccion', 'users')
        ->with('user', $user);
    }

    public function pwdsave(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:8',
        ]);
        $user = User::find($id);
        $user->password=bcrypt($request->password);
        $user->save();
        flash("Contraseña del usuario ".$user->name." actualizada exitosamente")->success();
        return redirect()->route('users.show', $user->id);

    }

    function nombre_compuesto()
    {
        DB::select("update users set nombre_compuesto = concat(apellido_paterno , '%' , apellido_materno , '%' , nombre , '%' , apellido_paterno , '%' , apellido_materno, '%' , apellido_paterno, '%' , nombre)");
        DB::select("update users set nombre_compuesto = concat(apellido_paterno , '%' , nombre , '%' , apellido_paterno , '%' , nombre) where apellido_materno is null");
    }


    public function permutar($input)
    {
        $input = explode(" ", $input);
        $input2 = [];
        foreach($input as $value) {
            $input2[] = "%".$value."%";
        }
        $input = $input2;
        $miarray = array();
        $cadena="";
        //copio el array
        $temporal=$input;
        //borro el primer numero del array
        array_shift($input);
        //ahora la cuenta esta en que solo quedan 3
        for($u=0;$u<count($temporal);$u++){
            for($i=0;$i<count($input);$i++){
                array_push($input,$input[0]);
                array_shift($input);
                    for($e=0;$e<count($input);$e++){
                        $cadena.=$input[$e];
                    }
                array_push($miarray,$temporal[$u].$cadena);
                //array_push($miarray,$temporal[$u].strrev($cadena));
                $cadena="";
     
            }
        array_shift($input);
        array_push($input,$temporal[$u]);
        }
        $miarray = str_replace("%%", "%", $miarray);
        return $miarray;
    }

}
