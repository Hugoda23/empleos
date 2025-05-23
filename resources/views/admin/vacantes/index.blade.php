@extends('layouts.admin') 
@php use Carbon\Carbon; @endphp
@section('content')

<div class="container">
    <h2 class="mb-4">Vacantes Publicadas</h2>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Título</th>
                <th>Empresa</th>
                <th>Fecha de Publicación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vacantes as $vacante)
                <tr>
                    <td>{{ $vacante->titulo_puesto }}</td>
                    <td>{{ $vacante->empresa->nombre_empresa ?? 'Sin empresa' }}</td>
                    <td>{{ $vacante->fecha_publicacion ? \Carbon\Carbon::parse($vacante->fecha_publicacion)->format('d/m/Y') : 'Sin fecha' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
