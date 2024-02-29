@extends('adminlte::page')

@section('title', 'Edição de Plano')

@section('content_header')
    <h1>Edição do Plano: {{$plan->plan}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pdi.update', $plan->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.estrategia.planos.pdi.formularios.forms')
            </form>
        </div>
    </div>
@stop
