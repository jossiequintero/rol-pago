<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Empleado;
use App\Models\RolPago;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

final class RolPagoRepository {
    private RolPago $model;
    public function __construct(RolPago $RolPago) {
        $this->model = $RolPago;
    }
    public function message()
    {
        return "hola Mundo";
    }
    public function all():Collection{
        return $this->model->all();
    }
    public function getAllRolWithUser(){
        $UserAuth = User::find(auth()->user()->id);
        $data= [];
        if($UserAuth->rol = 'RH')
        {
            $allrolpago = $this->model->all();
            foreach($allrolpago as $item){
                $info = [];
                $rolpago = new RolPago;
                $rolpago = $item;
                $dataempleado = new Empleado;
                $dataempleado = $rolpago->empleado;
                $datauser = new User;
                $datauser = $dataempleado->user;

                $info = ['rolpago_id'=>$rolpago->id,'name'=>$datauser->name,'apellidos'=>$datauser->apellidos, 'neto_pagar'=>$rolpago->neto_pagar,'fecha_creacion'=>$rolpago->created_at];
                array_push($data,$info);
            }
            return $data;
        }
    }
    public function editRol(){

    }
    public function getRolPago($id){
        $UserAuth = User::find(auth()->user()->id);
        $data = array();
        if($UserAuth->rol = 'RH')
        {
            $rolpago = $this->model->find($id);
            // $rolpago = new RolPago;
            // $rolpago = $item;
            $dataempleado = new Empleado;
            $dataempleado = $rolpago->empleado;
            $datauser = new User;
            $datauser = $dataempleado->user;

            $info = [
                'rolpago_id'=>$rolpago->id,
                'name'=>$datauser->name,
                'apellidos'=>$datauser->apellidos,
                'neta_pagar'=>$rolpago->neto_pagar,
                'fecha_creacion'=>$rolpago->created_at,
                'balances'=> $rolpago->balance,
            ];
            array_push($data, $info);

            return $data;
        }
        else if($UserAuth->rol->Empleado){

        }
    }
}
