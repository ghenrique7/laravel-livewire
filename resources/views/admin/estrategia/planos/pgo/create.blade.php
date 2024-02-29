@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <h1>Cadastrar Novo PGO</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plano.store') }}" class="form" method="POST">
                @csrf
                @include('admin.estrategia.planos.pgo.formularios.forms')
            </form>
        </div>
    </div>

@stop
