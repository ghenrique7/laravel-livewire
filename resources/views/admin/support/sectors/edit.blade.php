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
            <h1>Edição do Setor: {{ $sector->sector }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('unidade.update', $sector->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.support.sectors._partials.forms')
            </form>
        </div>

    </div>



@stop
