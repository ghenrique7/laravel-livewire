@extends('adminlte::page')

@section('title', 'Edição de Setor')

@section('content_header')
<br>

{{-- @include('admin.components.alert') --}}
<x-alert />

@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h1>Edição do tipo de plano: {{ $typeplan->name }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('tipo-plano.update', $typeplan->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.support.plans._partials.forms')
            </form>
        </div>

    </div>



@stop
