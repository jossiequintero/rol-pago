<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\RolPago;
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
}
