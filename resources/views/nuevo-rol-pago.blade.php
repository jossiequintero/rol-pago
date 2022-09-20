@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (Auth::user()->rol == 'RH' OR Auth::user()->rol == 'Empleado' )
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">CREACION DE ROLE DE PAGO</h2>
                </div>

                <div class="card-body">
                    <form class="row" action="/usuario{{ @$usuario? '/' . @$usuario->id : '' }}" method="post"
                        autocomplete="off">
                        @csrf

                        <div class="form-group row">
                            <label for="empleado_id" class="col-md-4 col-form-label text-md-right">
                                Elija el Empleado:
                            </label>
                            <select name="rol" class="form-control">
                                <?php dump($empleados)?>
                                @foreach ($empleados as $empleado )
                                <option>$empleado-></option>
                                @endforeach
                            </select>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <label>
                                Concepto:
                            </label>
                            <?php $usuario = [] ?>
                            <input type="text" name="name" value="{{ @$usuario->name }}" class="form-control" required>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <label>
                                Valor:
                            </label>
                            <input type="text" name="apellido" value="{{ @$usuario->apellido }}" class="form-control"
                                required>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <label>
                                Concepto:
                            </label>
                            <?php $usuario = [] ?>
                            <input type="text" name="name" value="{{ @$usuario->name }}" class="form-control" required>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <label>
                                Valor:
                            </label>
                            <input type="text" name="apellido" value="{{ @$usuario->apellido }}" class="form-control"
                                required>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label>
                                Concepto:
                            </label>
                            <?php $usuario = [] ?>
                            <input type="text" name="name" value="{{ @$usuario->name }}" class="form-control" required>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <label>
                                Valor:
                            </label>
                            <input type="text" name="apellido" value="{{ @$usuario->apellido }}" class="form-control"
                                required>
                        </div>


                        <div class="col-12">
                            <button class="btn btn-dark" type="submit">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
