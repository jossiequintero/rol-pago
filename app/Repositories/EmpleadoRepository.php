<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Empleado;;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

final class EmpleadoRepository
{

    private Empleado $model;

    public function __construct(Empleado $empleado)
    {
        $this->model = $empleado;
    }

    /**
     * Funcion que obtiene un empleado por su id
     *@param int id
     *@return Empleado
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getEmpleado(int $id)
    {
        return Empleado::find($id);
    }

    /**
     * Funcion que obtiene la informacion de Usuario de un Empleado por su id
     *@param int id
     *@return User
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getEmpleadoUserInfo(int $id)
    {
        return Empleado::find($id)->user;
    }

    /**
     * Funcion que obtiene los nombres de los empleados y su id
     *@param ninguno
     *@return Array
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getAllEmpleadoName()
    {
        $data = Empleado::join('users');
    }

    /**
     * Funcion que obtiene la informacion de usuario por empleado
     *@param ninguno
     *@return Collection
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getAllEmpleadoUserInfo(): Collection
    {
        return DB::table('users')
            ->join('empleados', 'users.id', '=', 'empleados.user_id')
            ->select('empleados.id', 'users.nombres')
            ->get();
    }

     /**
     * Funcion que obtiene el sueldo de un empleado por su id
     *@param int id
     *@return decimal
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getSueldo(int $id)
    {
        return Empleado::where('empleados.id', '=', $id)->select('empleados.sueldo')->get();
    }

     /**
     * Funcion que obtiene la lista de empleados
     *@param ninguno
     *@return Collection
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getAll()
    {
        return $this->model->all();
    }
}
