@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <h1>Cadastrar Novo PDI</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pdi.store') }}" class="form" method="POST">
                @csrf
                @include('admin.estrategia.planos.pdi.formularios.forms')
            </form>
        </div>
    </div>

@stop
