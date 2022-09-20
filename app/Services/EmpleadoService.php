<?php declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Repositories\EmpleadoRepository;
use App\Models\Empleado;
use App\Models\User;

;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Stmt\TryCatch;

class EmpleadoService{
    private EmpleadoRepository $repository;
    public function __construct(EmpleadoRepository $repo){
        $this->repository = $repo;
    }
    public function getEmpleadoUserInfo(EmpleadoRepository $empleado, int $id):User{
        try {
            return $empleado->getEmpleadoUserInfo($id);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function getAllEmpleadoUserInfo():Collection{
        $repo = new EmpleadoRepository;
        return $repo->getAllEmpleadoUserInfo();
    }
    public function getSueldo(int $id){
        // return getSueldo;
    }
}
