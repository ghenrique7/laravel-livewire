@extends('adminlte::page')

@section('title', 'Edição de Indicador')

@section('content_header')
    <h1>Edição do Indicador: {{$indicator->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('indicador.update', $indicator->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.estrategia.indicadores.formularios.forms')
            </form>
        </div>
    </div>
@stop
