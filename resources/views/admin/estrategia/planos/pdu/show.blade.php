@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1><b>UFOPA </b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header card-title">Plano: {{ $plan->plan }}</div>
        <div class="card-body">
            {{-- inicio da area de impressao dos dados do pdi --}}
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Período: </label>
                    {{ $plan->initial_year }}
                    <label> a </label>
                    {{ $plan->final_year }}
                </div>

                {{-- <div class="form-group col-md-3">
                    <label>Situação: </label>
                    {{  $plan->situacao == 1 ? 'Ativo':'Inativo' }}
                </div> --}}

                <div class="form-group col-md-7">
                    <label>Responsável: </label>
                    {{ $plan->sector->sector }}
                </div>

                {{-- <div class="form-group col-md-3">
                        <label>: </label>
                        {{ $plan->setor->sigla }}
                    </div> --}}

            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    @if ($plan->mission)
                        <label>Missão: </label>
                        {{ $plan->mission }}
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    @if ($plan->vision)
                        <label>Visão: </label>
                        {{ $plan->vision }}
                    @endif
                </div>
            </div>
            {{-- inicio da area dos botoes deletar e editar --}}
            <div class="form-row">

                <div class="form-group">
                    <form action="{{ route('pdi.destroy', $plan->id) }}" method="POST"
                        onclick="return confirm('Tem certeza que deseja excluir {{ $plan->plan }}')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" title="Excluir"> <i
                                class="fas fa-sharp fa-solid fa-trash"></i> </button>
                    </form>
                </div>

                <div class="form-group col-md-1">
                    <a href="{{ route('pdi.edit', $plan->id) }}" class="btn btn-warning" title="Editar"> <i
                            class="fas fa-solid fa-pen"></i> </a>
                </div>

            </div>

        </div>
    </div>
    {{-- <div class="card-body">
        <div class="form-row">

            <div class="form-group col-ml-1">
                <a href="{{ route('objetivos.create') }}" class="btn btn-success" title="Cadastrar Novo Objetivo"> <i
                        class="fas fa-plus-circle"></i> </a>
            </div>
            <div class="form-group col-ml-1">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#vincularObjetivo"
                    title="Vincular Objetivo ao Plano"><i class="fas fa-link"></i></button>
            </div>
        </div>
    </div> --}}

    {{-- <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        {{-- Cabeçalho da tabela de impressão dos PDIS cadastrados --}}
    {{-- <th>#</th>
                        <th>Objetivo Estratégico</th>
                        <th>Plano de Ação</th>
                    </tr>
                <tbody>

                </tbody>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="vincularObjetivo" tabindex="-1" role="dialog" aria-labelledby="vincularObjetivo"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="vincularObjetivo">Vincular Objetivo ao Plano</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label>Plano:</label>
                            <select name="plan" class="form-control">
                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}" selected>{{ $plan->plan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label>Objetivo:</label>
                            @foreach ($objetivos as $objetivo)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $objetivo->id }}">
                                    <label class="form-check-label" for="defaultCheck1">{{ $objetivo->objetivo }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Salvar</button>
                </div>

            </div>
        </div>
    </div> --}}


@endsection
