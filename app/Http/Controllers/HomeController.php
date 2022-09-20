<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService as ServicesUserService;
use App\Services\EmpleadoService;
use App\Services\UserService;
use App\Models\Empleado;
use App\Models\RolPago;
use App\Models\User;
use App\Services\RolPagoService;
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
    // public function index(UserService $service)
    public function index()
    {
        // $empleados = $service->getAllEmpleadoUserInfo();


        $AuthUser = User::find(auth()->user()->id);

        $data = DB::table('users')
            ->join('empleados', 'users.id', '=', 'empleados.user_id')
            ->join('rol_pagos', 'empleados.id', '=', 'rol_pagos.empleado_id')
            ->select('rol_pagos.id', 'users.nombres', 'users.apellidos', 'rol_pagos.neto_pagar', 'rol_pagos.created_at')
            ->get();

        $empleados = Empleado::all();
        return view('home', compact('empleados', 'data'));
    }
    public function RolPagoShow()
    {
        try {
            // $service = new EmpleadoService;
            // $data = $service->getAllEmpleadoUserInfo();
            $data = array();
            return view('rol-pago', $data);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function UsuarioStore(array $data, UserService $service)
    {
        try {
            return $service->crear($data);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    // public function saludar($nombre = 'Jossie Quintero', UserService $service){
    //     return $service->saludar($nombre);
    // }

    public function mensaje(RolPagoService $service){
        return $service->msg();
    }
    public function showRoles(RolPagoService $service){
        return $service->all();
    }
}
