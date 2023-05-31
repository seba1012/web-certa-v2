@extends('templates.master')


@section('main-content')
<div class="row">
    <div class="col">
        <div class="col my-3">
            <h2>Ingresado como profesor: {{ $profesor->nombre }} {{ $profesor->apellido }}<h2></span>
        </div>
        
        <div class="col my-5">
            <h4>Propuestas del alumno: {{ $estudiante->nombre }} {{ $estudiante->apellido }}</h1>
        </div>
        
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Documento</th>
            <th scope="col">Fecha</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($propuestas as $propuesta)
            <tr>
            <th scope="row">{{ $propuesta->documento }}</th>
            <td>{{ $propuesta->fecha }}</td>
            <td> @if($propuesta->estado == 0) Aprobado @elseif($propuesta->estado == 1) En revisión @elseif($propuesta->estado == 2) Rechazado @endif </td>
            <td> <a class="btn btn-success" href="{{ route('profesores.create-comentario', [$profesor->rut, $estudiante->rut, $propuesta->id]) }}">Comentar</a> </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-12 d-flex flex-column align-items-end justify-content-center">
        <a class="btn btn-primary" href="{{ route('profesores.show-estudiantes', $profesor->rut) }}">Volver atrás</a>
    </div>
</div>
@endsection