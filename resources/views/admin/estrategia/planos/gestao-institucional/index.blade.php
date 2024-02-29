@extends('adminlte::page')

@section('title', 'GI')

@section('content_header')
    <h1>Gestão Institucional</h1>
    <a href="{{ route('plano.create', [ 'type' => 'gestao-institucional']) }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Novo Plano</a>
@stop

@section('content')
@include('admin/componentes/flash')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plano.search') }}" method="POST" class="form form-row">
                @csrf
                <div class="form-group col-6">
                    <input type="text" class="form-control"  placeholder="Digite o nome do plano" name="filter" value="{{ $filters['filter'] ?? '' }}">
                </div>
                <div class="form-group ml-1">
                    <button type="submit" class="btn btn-info" title="Pesquisar"> <i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>

        <div class="card-body">

            <table class="table table-sm">
                <thead>
                    <tr>
                        {{-- Cabeçalho da tabela de impressão dos PDIS cadastrados --}}
                        <th>Descrição</th>
                        <th>Período</th>
                        <th>Situação</th>
                        <th width="250"></th>
                    </tr>
                    <tbody>
                        @foreach ($plans as $plan)
                            <tr>
                                {{-- Impressão da descrição do PDI --}}
                                <td class="align-middle">{{ $plan->plan}}</td>

                                {{-- Périodo de vingencia do PDi --}}
                                <td class="align-middle">{{ $plan->ano_inicial}} - {{$plan->ano_final}}</td>

                                {{-- Condição para imprimir ativo ou inativo, pois no db é registrado 0 ou 1 --}}
                                {{-- <td class="align-middle">{{ $plan->situacao == 1 ? 'Ativo':'Inativo'}}</td> --}}

                                <td class="align-middle">
                                    {{-- Botoes da ação de ver, editar e cancelar --}}
                                    <a href="{{ route('plano.show', $plan->id) }}" class="btn btn-primary btn-sm" title="Ver plan"> <i class="fas fa-solid fa-eye"></i></a>
                                    <a href="{{ route('plano.edit', $plan->id) }}" class="btn btn-warning btn-sm" title="Editar plan"> <i class="fas fa-solid fa-pen"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
    <div class="cards">
        {{-- Paginação do resultado do db --}}
        @if (isset($filters))
             {{ $plans->appends($filters)->links()}}
        @else
             {{ $plans->links()}}
        @endif

    </div>

@stop

