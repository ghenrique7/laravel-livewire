@extends('adminlte::page')

@section('title', 'Edição de Setor')

@section('content_header')
    <h1>Edição do Setor: {{ $sector->sector }}</h1>
@stop

@section('content')
    @include('admin.componentes.flash')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('setor.update', $sector->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.componentes.setores.formularios.forms')

            </form>
        </div>

    </div>



@stop
