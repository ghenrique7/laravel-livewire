@extends('adminlte::page')

@section('title', 'Tipo de Plano')

@section('content_header')
    <h1>Tipos de Planos Cadastrados</h1>
    <br>
    {{-- <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="fas fa-plus-circle"></i> Tipo de Plano
    </button> --}}
    <a href="{{ route('tipo-plano.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Tipo de Plano</a>
@stop

@section('content')
    <x-alert />

    <div class="card">
        <div class="card-header">

            <form action="{{ route('tipo-plano.search') }}" method="POST" class="form form-row">
                @csrf
                <div class="form-group col-6">
                    <input type="text" class="form-control" placeholder="Nome ou descrição do tipo de plano" name="filter"
                        value="{{ $filters['filter'] ?? '' }}">
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
                        {{-- Cabeçalho da tabela de impressão dos sectors cadastrados --}}

                        <th>Tipo de Plano</th>
                        <th>Descrição</th>
                        <th width="250">Ações</th>
                    </tr>
                <tbody>
                    @foreach ($typeplans as $typeplan)
                        <tr>
                            {{-- Impressão do tipo de plano --}}
                            <td class="align-middle"> {{ $typeplan->name }} </td>

                            {{-- Impressão da descrição do tipo de plano --}}
                            <td class="align-middle"> {{ $typeplan->description }} </td>

                            <td class="align-middle">
                                {{-- Botoes da ação de ver, editar e cancelar --}}
                                <div class="form-inline">
                                    <div class="form-group col-md-2">
                                        <div class="form-group col-md-2">
                                            <a href="{{ route('tipo-plano.edit', $typeplan->id) }}" class="btn btn-warning btn-sm"> <i
                                                    class="fas fa-solid fa-pen"></i></a>
                                        </div>
                                        {{-- <a href="{{ route('tipo-plano.edit', $typeplan->id) }}"
                                            class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <i class="fas fa-solid fa-pen"></i></a> --}}
                                    </div>
                                    <div class="form-group col-md-2 ">
                                        <form action="{{ route('tipo-plano.destroy', $typeplan->id) }}" method="POST"
                                            class="form"
                                            onclick="return confirm('Tem certeza que deseja excluir {{ $typeplan->name }}? Todos os planos associados a ele serão excluidos.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"> <i
                                                    class="fas fa-sharp fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
        {{-- <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Novo Tipo de Plano</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('tipo-plano.store') }}" class="form" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                @csrf
                                @include('admin.support.plans._partials.forms')
                            </div>
                        </div>
                        <div class="modal-footer">

                            <div class="form-group btn-sm ml-1">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                            </div>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="cards">
        {{-- Paginação do resultado do db --}}
        @if (isset($filters))
            {{ $typeplans->appends($filters)->links() }}
        @else
            {{ $typeplans->links() }}
        @endif

    </div>

@endsection
