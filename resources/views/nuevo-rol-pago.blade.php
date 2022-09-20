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
                    <form class="row" action="" autocomplete="off">
                        @csrf
                        {{--
                        <?php echo $data ?> --}}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
