@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <h1>Cadastrar Novo PDU</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pdu.store') }}" class="form" method="POST">
                @csrf
                @include('admin.estrategia.planos.pdu.formularios.forms')
            </form>
        </div>
    </div>

@stop
