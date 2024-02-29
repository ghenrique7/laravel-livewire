@extends('adminlte::page')

@section('title', 'Edição de Tema')

@section('content_header')
<br>

{{-- @include('admin.components.alert') --}}
<x-alert />

@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h1>Edição do tipo de tema: {{ $theme->name }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('tema.update', $theme->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.support.themes._partials.forms')

            </form>
        </div>

    </div>



@stop
