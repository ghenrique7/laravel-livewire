
@extends('adminlte::page')

@section('title', 'Cadastrar Nova Unidade')

@section('content_header')
<br>
<x-alert />
{{-- @include('admin.components.alert') --}}

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Cadastrar Novo Tipo de Plano</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('tipo-plano.store') }}" class="form" method="POST">
                @csrf
                @include('admin.support.plans._partials.forms')
            </form>
        </div>

    </div>



@stop
