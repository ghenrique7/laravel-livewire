@extends('adminlte::page')

@section('title', 'Perspectivas')

@section('content_header')
    <h1>Perspectivas Cadastradas</h1>
    <br>
    <a href="{{ route('perspectiva.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Perspectiva</a>
@stop

@section('content')
    <x-alert />

    <div class="card">
        <div class="card-header">

            <form action="{{ route('perspectiva.search') }}" method="POST" class="form form-row">
                @csrf
                <div class="form-group col-6">
                    <input type="text" class="form-control" placeholder="Perspectiva ou descrição do perspectiva" name="filter" value="{{ $filters['filter'] ?? '' }}">
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
                        {{-- Cabeçalho da tabela de impressão dos perspectivas cadastrados --}}

                        <th>Perspectiva</th>
                        <th>Descrição</th>
                        <th width="250">Ações</th>
                    </tr>
                <tbody>
                    @foreach ($perspectives as $perspective)
                        <tr>

                            {{-- Impressão do nome da perspectiva --}}
                            <td class="align-middle"> {{ $perspective->name }} </td>

                            {{-- Impressão da descrição da perspectiva --}}
                            <td class="align-middle"> {{ $perspective->description }} </td>

                            <td class="align-middle">
                                {{-- Botoes da ação de ver, editar e cancelar --}}
                                <div class="form-inline">
                                    <div class="form-group col-md-2">
                                        <a href="{{ route('perspectiva.edit', $perspective->id) }}" class="btn btn-warning btn-sm"> <i
                                                class="fas fa-solid fa-pen"></i></a>
                                    </div>
                                    <div class="form-group col-md-2 ">
                                        <form action="{{ route('perspectiva.destroy', $perspective->id) }}" method="POST"
                                            class="form"
                                            onclick="return confirm('Tem certeza que deseja excluir {{ $perspective->name }} ? Todos os planos associados a ele serão excluidos.')">
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
            {{ $perspectives->appends($filters)->links() }}
        @else
            {{ $perspectives->links() }}
        @endif

    </div>

@endsection
