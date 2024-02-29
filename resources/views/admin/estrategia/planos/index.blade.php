@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos Cadastrados</h1>

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        Novo plano
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selecione o Plano</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row row-cols-lg-3 align-items-center">
                        <div class="col">
                            <a href="{{ route('plano.index') }}">
                                <div class="card card-dcover h-full text-bg-white rounded-4 shadow-lg"
                                    style="background-image: url('{{ asset('images/unsplash-photo-2.jpg') }}')">
                                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                                        <h3 class="pt-5 mt-5 mb-4 display-3 lh-1 fw-bold text-white">PDI</h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col">
                            <a href="{{ route('plano.index') }}">
                                <div class="card card-cover h-full text-bg-white rounded-4 shadow-lg"
                                    style="background-image: url('{{ asset('images/unsplash-photo-2.jpg') }}')">
                                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                                        <h3 class="pt-5 mt-5 mb-4 display-3 lh-1 fw-bold text-white">PDU</h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col">
                            <a href="{{ route('plano.index') }}">
                                <div class="card card-cover h-full text-bg-white rounded-4 shadow-lg"
                                    style="background-image: url('{{ asset('images/unsplash-photo-2.jpg') }}')">
                                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                                        <h3 class="pt-5 mt-5 mb-4 display-3 lh-1 fw-bold text-white">PGO</h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="col">
                        <a href="{{ route('plano.index') }}">
                            <div class="card card-cover text-bg-white rounded-4 shadow-lg"
                                style="background-image: url('{{ asset('images/unsplash-photo-2.jpg') }}')">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                                    <h3 class="pt-5 mt-5 mb-4 display-4 lh-1 fw-bold text-white">Gestão Institucional</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('content')
    @include('admin/componentes/flash')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plano.search') }}" method="POST" class="form form-row">
                @csrf
                <div class="form-group col-6">
                    <input type="text" class="form-control" placeholder="Digite o nome do plano" name="filter"
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
                        {{-- Cabeçalho da tabela de impressão dos PDIS cadastrados --}}
                        <th>Descrição</th>
                        <th>Período</th>
                        {{-- <th>Situação</th> --}}
                        <th>Tipo de Plano</th>
                        <th>Responsável</th>
                        <th width="250"></th>
                    </tr>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            {{-- Impressão da descrição do PDI --}}
                            <td class="align-middle">{{ $plan->plan }}</td>

                            {{-- Périodo de vingencia do PDi --}}
                            <td class="align-middle">{{ $plan->initial_year }} - {{ $plan->final_year }}</td>

                            {{-- Condição para imprimir ativo ou inativo, pois no db é registrado 0 ou 1 --}}
                            {{-- <td class="align-middle">{{ $plan->situacao == 1 ? 'Ativo' : 'Inativo' }}</td> --}}
                            <td class="align-middle">{{ $plan->type_plan->name }}</td>

                            <td class="align-middle">{{ $plan->sector->sector }}</td>

                            <td class="align-middle">
                                {{-- Botoes da ação de ver, editar e cancelar --}}
                                <a href="{{ route('plano.show', $plan->id) }}" class="btn btn-primary btn-sm"
                                    title="Ver plano"> <i class="fas fa-solid fa-eye"></i></a>
                                <a href="{{ route('plano.edit', $plan->id) }}" class="btn btn-warning btn-sm"
                                    title="Editar plano"> <i class="fas fa-solid fa-pen"></i></a>
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
            {{ $plans->appends($filters)->links() }}
        @else
            {{ $plans->links() }}
        @endif

    </div>

@stop
