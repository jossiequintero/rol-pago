<?php declare(strict_types=1);

namespace App\Http\Repositories;

use App\Models\Empleado;;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class EmpleadoRepository{

    public function getEmpleado(int $id) {
        return Empleado::find($id);
    }
    public function getEmpleadoUserInfo(int $id){
        return Empleado::find($id)->user;
    }
    public function getAllEmpleadoUserInfo():Collection{
        return DB::table('users')
        ->join('empleados','users.id','=','empleados.user_id')
        ->select('empleados.id','users.nombres')
        ->get();
    }
    public function getSueldo(int $id ){
        return Empleado::where('empleados.id','=',$id)->select('empleados.sueldo')->get();
    }

}
