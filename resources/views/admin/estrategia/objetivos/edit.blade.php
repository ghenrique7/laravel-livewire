@extends('adminlte::page')

@section('title', 'Cadastrar Objetivos')

@section('content_header')
    <h1>Edição de Objetivo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('objetivo.update', $objective->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.estrategia.objetivos.formularios.forms')
            </form>
        </div>
    </div>
@stop
