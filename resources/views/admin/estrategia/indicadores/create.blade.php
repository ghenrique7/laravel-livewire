@extends('adminlte::page')

@section('title', 'Cadastrar Indicador')

@section('content_header')
    <h1>Cadastrar Indicador</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('indicador.store') }}" class="form" method="POST">
                @csrf
                @include('admin.estrategia.indicadores.formularios.forms')
            </form>
        </div>

    </div>



@stop
