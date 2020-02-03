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
        $this->nombre_compuesto();
        $permutar = $this->permutar($buscado);
        $users = User::orderBy('apellido_paterno', 'ASC')
            ->where('socio_clave', "$buscado")
            ->orWhere('nombre_compuesto', 'like', "%$buscado%")
            ->orWhere(function ($query) use ($permutar) {
                foreach($permutar as $permuta) {
                    $query->orWhere('nombre_compuesto', 'like', "$permuta");
                }
            })
            ->paginate(10000);

        return view('users.search')
        ->with('seccion', 'administracion')
        ->with('subseccion', 'users')
            ->with('users', $users)
        ;
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'apellido_paterno' => 'required|string|min:3|max:191',
            'nombre' => 'required|string|min:3|max:191',
            'role' => 'required|string|max:255',
            'password' => 'required|string|min:6|max:255',
            'socio_clave' => 'required|string|min:1|max:255',
        ]);
        $user = New User($request->all() );
        $user->name = $request->apellido_paterno . " " . $request->apellido_materno . " " . $request->nombre ;
        $user->password=bcrypt($request->password);
        $user->socio_clave = $request->socio_clave;
        $user->save();
        Flash::success("Usuario creado exitosamente");
        $this->nombre_compuesto();
        return redirect()->route('users.index');

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
            'apellido_paterno' => 'required|string|min:3|max:191',
            'nombre' => 'required|string|min:3|max:191',
            'role' => 'required|string|max:255',
        ]);
        $user = User::find($id);
        $user->name = $request->apellido_paterno . " " . $request->apellido_materno . " " . $request->nombre ;
        $user->nombre =$request->nombre ;
        $user->apellido_paterno =$request->apellido_paterno ;
        $user->apellido_materno =$request->apellido_materno ;
        $user->role = $request->role;
        $user->save();
        Flash::success("El usuario ".$user->name." (ID: ".$user->id.") ha sido actualizado correctamente");
        $this->nombre_compuesto();
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->activo='No';
        Flash::error("El usuario ".$user->name." (ID: ".$user->id.") ha sido desactivado!")->important();
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
        $user = User::find($id);
        $user->password=bcrypt($request->password);
        $user->cambiapwd='1';
        $user->save();
        Flash::success("Contraseña del usuario ".$user->name." actualizada exitosamente");
        return redirect()->route('dashboard');
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
        // dd($miarray);
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
