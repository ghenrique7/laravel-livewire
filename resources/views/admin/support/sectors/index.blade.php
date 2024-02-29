@extends('adminlte::page')

@section('title', 'Componentes')

@section('content_header')
    <h1>Setores Cadastrados</h1>
    <br>
    <a href="{{ route('unidade.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Unidade</a>
@stop

@section('content')
    <x-alert />

    <div class="card">
        <div class="card-header">

            <form action="{{ route('unidade.search') }}" method="POST" class="form form-row">
                @csrf
                <div class="form-group col-6">
                    <input type="text" class="form-control" placeholder="Sigla ou nome do setor" name="filter"
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

                        <th>Unidade</th>
                        <th>Sigla</th>
                        <th>Cidade</th>
                        <th>Tipo</th>
                        <th width="250">Ações</th>
                    </tr>
                <tbody>
                    @foreach ($sectors as $sector)
                        <tr>

                            {{-- Impressão do nome do Sertor --}}
                            <td class="align-middle"> {{ $sector->name }} </td>

                            {{-- Impressão da Sigla do Setor --}}
                            <td class="align-middle"> {{ $sector->abbreviation }} </td>

                            {{-- Condição para imprimir o Campus --}}
                            <td class="align-middle"> {{ $sector->city }}</td>
                            <td class="align-middle"> {{ $sector->type }}</td>

                            <td class="align-middle">
                                {{-- Botoes da ação de ver, editar e cancelar --}}
                                <div class="form-inline">
                                    <div class="form-group col-md-2">
                                        <a href="{{ route('unidade.edit', $sector->id) }}" class="btn btn-warning btn-sm"> <i
                                                class="fas fa-solid fa-pen"></i></a>
                                    </div>
                                    <div class="form-group col-md-2 ">
                                        <form action="{{ route('unidade.destroy', $sector->id) }}" method="POST"
                                            class="form" onclick="return confirm('Tem certeza que deseja excluir {{ $sector->sector }}? Todos os planos associados a ele serão excluidos.')">
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
    </div>
    <div class="cards">
        {{-- Paginação do resultado do db --}}
        @if (isset($filters))
            {{ $sectors->appends($filters)->links() }}
        @else
            {{ $sectors->links() }}
        @endif

    </div>

@endsection
