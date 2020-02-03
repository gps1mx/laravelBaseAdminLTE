<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permissions;
use Flash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermisosController extends Controller
{
    public function index() 
    {
        $permisos = Permissions::orderBy('id', 'ASC')->paginate(10);
        return view('permisos.index')
            ->with('seccion', 'administracion')
            ->with('subseccion', 'permisos')
            ->with('permisos', $permisos)
            ;
    }

    public function create()
    {
        return view('permisos.create')
            ->with('seccion', 'administracion')
            ->with('subseccion', 'permisos')
            ;
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|string|min:3|max:191',
        //     ]);
        $name = $this->sanitizar_cadena($request->name);
        $name = preg_replace('/\s{2,}/', ' ', $name);
        $name = preg_replace('/\s/', '_', $name);
        $cuantos = Permissions::where('name', $name)->count();
        $data = array();
        $data['name'] = $name;
        $data['cuantos'] = $cuantos;
        $messages[] = 'El nombre del permiso ya existe';
        $validator = Validator::make($data, [
            'cuantos' => 'bail|lt:1',
        ],$messages);

        if ($validator->fails()) {
            return redirect('permisos.create')
                ->withErrors($validator)
                ->withInput()
                ;
        }

        $permisos = new Permissions($request->all());
        $request->name = $name;
        $permisos->name = $name;
        $permisos->guard_name = "web";
        $permisos->save();
        return redirect()->route('permisos.index');
    }

    public function sanitizar_cadena($cadena) 
    {
        $search  = ['á', 'é', 'í', 'ó', 'ú', 'ñ', 'ü', 'à', 'è', 'ì', 'ò', 'ù', 'Á', 'É', 'Í', 'Ó', 'Ú', 'À', 'È', 'Ì', 'Ò', 'Ù', 'Ñ', 'Ü', '\'', '\"', '#', '.', 'º', '°', ',', '_', '*', 'ç', 'Ç', '\\', '(' , ')', '¿', '?', 'ª', '^', '<', '>', '√É¬°', 'Ã¡', 'Ã©', 'Ã³', '+', '-', '!', '¡', '¿', '?' ];
        $replace = ['A', 'E', 'I', 'O', 'U', 'N', 'U', 'A', 'E', 'I', 'O', 'U', 'A', 'E', 'I', 'O', 'U', 'A', 'E', 'I', 'O', 'U', 'N', 'U', ''  ,  '' , '' , '' , '' , '' , '' , '' , '' , '' , '' , ''  ,  '' , '',  '' , '' , '' , '' , '' , '' , 'A'   , 'A' ,  'E', 'O' , '' , ' ', ' ', ' ', ' ', ' ' ];
        $val = trim(strtoupper(str_replace($search, $replace, $cadena)));
		$val = preg_replace('/\s{2,}/', ' ', $val);
        return($val);
    }

}
