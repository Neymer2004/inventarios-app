@extends('adminlte::page')
@section('title', 'Existencias')
@section('content_header')
    <h1>Existencias</h1>
@stop
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Lista de Items con sus existencias</h5>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Descripción</th>
                    <th>Marca</th>
                    <th>Tipo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr @if (count($item->hijos) != 0) class="bg-primary" @endif>
                        <td>{{ $item->codigo }}</td>
                        <td>{{ $item->descripcion }} <span class="badge bg-danger rounded-pill">{{ count($item->hijos) }}</span></td>
                        <td>{{ $item->marca->nombre }}</td>
                        <td>{{ $item->titem->nombre }}</td>
                        <td> {{ numeros() }}</td>
                    </tr>
                    @if (count($item->hijos) != 0) 
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <ol class="list-group list-group-numbered">
                                        @foreach ($item->hijos as $hijo)
                                            <li class="list-group-item">{{ $hijo->codigo }} - {{ $hijo->descripcion }}</li>
                                        @endforeach
                                    </ol>   
                                </td>
                            </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection