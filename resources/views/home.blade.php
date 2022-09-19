@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (Auth::user()->rol == 'RH')
        <h1>SOY RH</h1>
        @endif
        @if (Auth::user()->rol == 'Empleado')
        <h1>Soy Empleado</h1>
        @endif
    </div>
</div>
@endsection
