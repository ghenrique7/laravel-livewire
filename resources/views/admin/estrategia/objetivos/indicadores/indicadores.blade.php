@extends('adminlte::page')

@section('title', 'Vincular Indicadores')


@section('content_header')
    <h1>Vincular Indicadores a {{ $objective->objective }}</h1>
@stop

@section('content')
    <div class="modal-body">
        <div class="form-group">
            <strong>Objetivo:</strong><br>
            {{ $objective->name }}
        </div>
        <div class="form">
            <div class="form-group">
                <form action="{{ route('objetivo.indicador.attach', $objective->id) }}" method="POST">
                    @csrf

                    @foreach ($indicators as $indicator)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="indicators[]" value="{{ $indicator->id }}">
                            <label class="form-check-label" for="defaultCheck1">{{ $indicator->name }}</label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
