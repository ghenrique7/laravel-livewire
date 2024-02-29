@extends('adminlte::page')

@section('title', 'Cadastrar Setor')

@section('content_header')
    <h1>Cadastrar Setor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('setor.store') }}" class="form" method="POST">
                @csrf
                @include('admin.componentes.setores.formularios.forms')
            </form>
        </div>

    </div>



@stop
