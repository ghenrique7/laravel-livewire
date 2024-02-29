
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
            <h1>Cadastrar Setor</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('unidade.store') }}" class="form" method="POST">
                @csrf
                @include('admin.support.sectors._partials.forms')
            </form>
        </div>

    </div>



@stop
