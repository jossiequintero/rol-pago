<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Services\EmpleadoService;
use App\Models\Empleado;
use App\Models\RolPago;
use App\Models\User;
use App\Services\RolPagoService;
use Illuminate\Database\Eloquent\Collection;
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
    public function index(RolPagoService $service)
    {
        $data = $service->allRolUser();
        // return $data;
        return view('home', compact('data'));
    }
    public function edit(RolPagoService $service){
        return "al";
    }
    public function show($id, RolPAgoService $service){
        $data = $service->getRolPago($id);
        return view('show-rol-pago', compact('data'));
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
    public function rolEmpleado(RolPagoService $service){
        return $service->allRolUser();
    }
    // public function rolempleado(RolPagoService $service){
    //     return $service->allRolUser()
    // }
}
