@extends('adminlte::page')

@section('title', 'Laboratórios')

@section('content_header')
    <h1>Laboratórios Cadastrados</h1>
</br>
    <a href="{{ route('laboratorios.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Novo Laboratório</a>

@stop

@section('content')
@include('admin/componentes/flash')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('laboratorios.search') }}" method="POST" class="form form-row">
                @csrf
                <div class="form-group col-6">
                    <input type="text" class="form-control"  placeholder="Digite o nome do laboratório" name="filter" value="{{ $filters['filter'] ?? '' }}">
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
                       {{-- @foreach ($laboratorios as $laboratorio)
                            <tr>

                                <td class="align-middle">{{ $laboratorio->nome_laboratorio}}</td>


                                <td class="align-middle">{{ $laboratorio->ano_inicial_laboratorio}} - {{$laboratorio->ano_final_laboratorio}}</td>


                                <td class="align-middle">{{ $laboratorio->situacao_laboratorio == 1 ? 'Ativo':'Inativo'}}</td>

                                <td class="align-middle">

                                    <a href="{{ route('laboratorios.show', $laboratorio->id_laboratorio) }}" class="btn btn-primary btn-sm" title="Ver laboratorio"> <i class="fas fa-solid fa-eye"></i></a>
                                    <a href="{{ route('laboratorios.edit', $laboratorio->id_laboratorio) }}" class="btn btn-warning btn-sm" title="Editar laboratorio"> <i class="fas fa-solid fa-pen"></i></a>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
    <div class="cards">
        {{-- Paginação do resultado do db --}}
        @if (isset($filters))
             {{ $laboratorios->appends($filters)->links()}}
        @else
             {{ $laboratorios->links()}}
        @endif

    </div>

@stop

