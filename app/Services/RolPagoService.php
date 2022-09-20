<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\RolPagoRepository;
use Illuminate\Database\Eloquent\Collection;

final class RolPagoService{

    private RolPagoRepository $repository;
    public function __construct(RolPagoRepository $repo){
        $this->repository = $repo;
    }
    public function msg(){
        return $this->repository->message();
    }
    public function all():Collection{
        return $this->repository->all();
    }
}
