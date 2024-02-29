@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1><b>UFOPA </b></h1>
@stop

@section('content')
 @foreach ($planos as $plano)
    <div class="card">
        <div class="card-header card-title">Informações: {{$plano->nome_plano}}</div>
        <div class="card-body">
            {{--inicio da area de impressao dos dados do pdi --}}
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Descriação: </label>
                  {{ $plano->nome_plano }}
                </div>

                <div class="form-group col-md-3">
                    <label>Período: </label>
                    {{ date( 'd/m/Y' , strtotime($plano->ano_inicial_plano)) }}
                    <label> a  </label>
                    {{ date( 'd/m/Y' , strtotime($plano->ano_final_plano)) }}
                </div>

                <div class="form-group col-md-3">
                    <label>Situação: </label>
                    {{  $plano->situacao_plano == 1 ? 'Ativo':'Inativo' }}
                </div>

            <div class="form-group col-md-3">
                    <label>Responsável: </label>
                    {{$plano->setor->sigla}}


            </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                  <label>Missão: </label>
                  {{ $plano->missao_plano}}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Visão: </label>
                    {{ $plano->visao_plano }}
                </div>
            </div>
           {{-- inicio da area dos botoes deletar e editar --}}
            <div class="form-row">

                <div class="form-group">
                    <form action="{{ route('planos.destroy', $plano->id_plano) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" title="Excluir"> <i class="fas fa-sharp fa-solid fa-trash"></i> </button>
                    </form>
                </div>

                <div class="form-group col-md-1">
                    <a href="{{route('planos.edit', $plano->id_plano)}}" class="btn btn-warning" title="Editar"> <i class="fas fa-solid fa-pen"></i> </a>
                </div>

            </div>

        </div>
    </div>
    @endforeach
    <div class="card-body">
        <div class="form-row">

            <div class="form-group col-ml-1">
                <a href="{{ route('objetivos.create') }}" class="btn btn-success" title="Cadastrar Novo Objetivo"> <i class="fas fa-plus-circle"></i> </a>
            </div>
            <div class="form-group col-ml-1">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#vincularObjetivo" title="Vincular Objetivo ao Plano"><i class="fas fa-link"></i></button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        {{-- Cabeçalho da tabela de impressão dos PDIS cadastrados --}}
                        <th>#</th>
                        <th>Objetivo Estratégico</th>
                        <th>Plano de Ação</th>
                    </tr>
                    <tbody>

                    </tbody>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="vincularObjetivo" tabindex="-1" role="dialog" aria-labelledby="vincularObjetivo" aria-hidden="true">
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
                            <select  name="plano" class="form-control">
                                @foreach ($planos as $plano)
                                <option value="{{$plano->id_plano}}" selected>{{$plano->nome_plano}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label>Objetivo:</label>
                            @foreach ($objetivos as $objetivo)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$objetivo->id}}" >
                                <label class="form-check-label" for="defaultCheck1">{{$objetivo->objetivo}}</label>
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
    </div>


@endsection
