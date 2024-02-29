@extends('adminlte::page')

@section('title', 'Edição de Plano')

@section('content_header')
    <h1>Edição do Plano: {{$plano->nome_plano}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('planos.update', $plano->id_plano) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.estrategia.planos.formularios.forms')
            </form>
        </div>
    </div>
@stop
