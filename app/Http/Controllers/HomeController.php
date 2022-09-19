<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\RolPago;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $AuthUser = User::find(auth()->user()->id);

        $data = DB::table('users')
            ->join('empleados','users.id','=','empleados.user_id')
            ->join('rol_pagos','empleados.id','=','rol_pagos.empleado_id')
            ->select('rol_pagos.id','users.nombres','users.apellidos','rol_pagos.neto_pagar','rol_pagos.created_at')
            ->get();

        $empleados = Empleado::all();
        return view('home',compact('empleados','data'));
    }
}
