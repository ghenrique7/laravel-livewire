@extends('adminlte::page')

@section('title', 'Tipo de Plano')

@section('content_header')
    <h1>Temas para Objetivos Cadastrados</h1>
    <br>
    <a href="{{ route('tema.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Tema</a>
@stop

@section('content')
    <x-alert />

    <div class="card">
        <div class="card-header">

            <form action="{{ route('tema.search') }}" method="POST" class="form form-row">
                @csrf
                <div class="form-group col-6">
                    <input type="text" class="form-control" placeholder="Tema ou descrição do tema" name="filter"
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
                        {{-- Cabeçalho da tabela de impressão dos temas cadastrados --}}

                        <th>Tema</th>
                        <th>Descrição</th>
                        <th width="250">Ações</th>
                    </tr>
                <tbody>
                    @foreach ($themes as $theme)
                        <tr>

                            {{-- Impressão do nome do tema --}}
                            <td class="align-middle"> {{ $theme->name }} </td>

                            {{-- Impressão da descrição do tema --}}
                            <td class="align-middle"> {{ $theme->description }} </td>

                            <td class="align-middle">
                                {{-- Botoes da ação de ver, editar e cancelar --}}
                                <div class="form-inline">
                                    <div class="form-group col-md-2">
                                        <a href="{{ route('tema.edit', $theme->id) }}" class="btn btn-warning btn-sm"> <i
                                                class="fas fa-solid fa-pen"></i></a>
                                    </div>
                                    <div class="form-group col-md-2 ">
                                        <form action="{{ route('tema.destroy', $theme->id) }}" method="POST"
                                            class="form"
                                            onclick="return confirm('Tem certeza que deseja excluir {{ $theme->name }}? Todos os planos associados a ele serão excluidos.')">
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
            {{ $themes->appends($filters)->links() }}
        @else
            {{ $themes->links() }}
        @endif

    </div>

@endsection
