@extends('adminlte::page')

@section('title', 'Edição da Perspectiva')

@section('content_header')
<br>

{{-- @include('admin.components.alert') --}}
<x-alert />

@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h1>Edição da Perspectiva: {{ $perspective->name }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('perspectiva.update', $perspective->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.support.perspectives._partials.forms')

            </form>
        </div>

    </div>



@stop
