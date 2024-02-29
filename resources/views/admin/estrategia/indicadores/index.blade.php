@extends('adminlte::page')

@section('title', 'Indicadores')

@section('content_header')
    <h1>Indicadores Ufopa</h1>
    </br>
    <a href="{{ route('indicador.create') }}" class="btn btn-success" title="Novo Indicador"><i class="fas fa-plus-circle"></i>
        Indicador</a>
@stop

@section('content')
    @include('admin/componentes/flash')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('indicador.search') }}" method="POST" class="form form-row">
                @csrf
                <div class="form-group col-6">
                    <input type="text" class="form-control" placeholder="Digite o nome do Indicador" name="filter"
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
                        {{-- Cabeçalho da tabela de impressão dos Setores cadastrados --}}
                        <th>Indicador</th>
                        <th>Periodicidade Sugerida</th>
                        <th>Objetivo Associado</th>
                        <th>Plano Associado</th>
                        <th>Polaridade</th>
                        <th width="150">Ações</th>
                    </tr>
                <tbody>
                    @foreach ($indicators as $indicator)
                        <tr>
                            {{-- Impressão do nome do indicator --}}
                            <td class="align-middle"> {{ $indicator->name }} </td>
                            {{-- Impressão da periodicidade de acompanhamento --}}
                            <td class="align-middle"> {{ $indicator->periodicity }} </td>

                            {{-- Objetivo associado --}}
                            <td class="align-middle"> {{ $indicator->objective->name }} </td>

                            {{-- Plano associado --}}
                            <td class="align-middle"> {{ $indicator->objective->plan->name }} </td>

                            {{-- Impressao da polaridade --}}
                            <td class="align-middle">
                                {{ $indicator->polarity }}</td>
                            <td class="align-middle">
                                {{-- Botoes da ação de ver, editar e cancelar --}}
                                <div class="form-inline">
                                    <div class="form-group-ml-1">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#myModal" title="Detalhes"><i
                                                class="fas fa-solid fa-eye"></i></button>
                                    </div>
                                    <div class="form-group ml-1">
                                        <a href="{{ route('indicador.edit', $indicator->id) }}"
                                            class="btn btn-warning btn-sm" title="Editar"> <i
                                                class="fas fa-solid fa-pen"></i></a>
                                    </div>
                                    <div class="form-group ml-1">
                                        <form action="{{ route('indicador.destroy', $indicator->id) }}" method="POST"
                                            class="form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Deletar"> <i
                                                    class="fas fa-sharp fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>

                                </div>
                            </td>
                            {{-- --}}
                            <!-- Button trigger modal -->


                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Informações do Indicador</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Objetivo: {{ $indicator->objective->name }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- --}}
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
            {{ $indicators->appends($filters)->links() }}
        @else
            {{ $indicators->links() }}
        @endif

    </div>

@endsection
