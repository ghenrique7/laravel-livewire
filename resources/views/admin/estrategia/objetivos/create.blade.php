@extends('adminlte::page')

@section('title', 'Cadastrar Objetivos')

@section('content_header')
    <h1>Cadastrar Objetivos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('objetivo.store') }}" class="form" method="POST">
                @csrf
                @include('admin.estrategia.objetivos.formularios.forms')
            </form>
        </div>
    </div>
@stop
