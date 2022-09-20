<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserRepository{
    /**
     * @return collection
     */
    public function getUsers():Collection{
        return User::all();
    }
    public function getUserById(int $user_id){
        return User::find($user_id);
    }
    public function getUserByCedula(string $cedula){
        return User::where('cedula',$cedula)->first();
    }
    public function getUserByRol(string $rol){
        return User::where('rol',$rol);
    }
    public function getUserByFechaNaciento($f_nacimiento):Collection{
        return User::where('fecha_nacimiento',$f_nacimiento)->get();
    }
    public function crear(array $request){
        return User::create(
            [
                'nombres'=>$request['nombres'],
                'apellidos'=>$request['apellidos'],
                'cedula'=>$request['cedula'],
                'rol'=>$request['rol'],
                'email'=>$request['email'],
                'password'=>Hash::make($request['password'],$request['password']),
            ]
        );
    }
    public function saludar($nombre){
        return "Hola" .$nombre ;
    }
}
// class UserRepository exte
