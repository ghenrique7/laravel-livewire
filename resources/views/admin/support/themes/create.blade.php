
@extends('adminlte::page')

@section('title', 'Cadastrar Novo Tema')

@section('content_header')
<br>
<x-alert />
{{-- @include('admin.components.alert') --}}

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Cadastrar Novo Tema para objetivos</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('tema.store') }}" class="form" method="POST">
                @csrf
                @include('admin.support.themes._partials.forms')
            </form>
        </div>

    </div>



@stop
