@extends('adminlte::page')

@section('title', 'PDU')

@section('content_header')
    <h1>Planos Institucionais</h1>
    <a href="{{ route('pdu.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Novo
        Plano</a>
@stop

@section('content')
    @include('admin/componentes/flash')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('pdu.search') }}" method="POST" class="form form-row">
                @csrf
                <div class="form-group col-6">
                    <input type="text" class="form-control" placeholder="Digite o nome do pdi" name="filter"
                           value="{{ $filters['filter'] ?? '' }}">
                </div>
                <div class="form-group ml-1">
                    <button type="submit" class="btn btn-info" title="Pesquisar"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>

        <div class="card-body">

            <table class="table table-sm">
                <thead>
                <tr>
                    {{-- Cabeçalho da tabela de impressão dos PDIS cadastrados --}}
                    <th>Nome</th>
                    <th>Período</th>
                    <th>Situação</th>
                    <th>Perspectiva</th>
                    <th width="300">Tipo</th>
                    <th></th>
                </tr>
                <tbody>
                @foreach ($plans as $plan)
                    <tr>
                        {{-- Impressão da descrição do PDI --}}
                        <td class="align-middle">{{ $plan->name }}
                            <a class="btn" data-toggle="collapse" href="#plano{{ $plan->id }}" role="button"
                               aria-expanded="false" aria-controls="plano{{ $plan->id }}">
                                <i class="fas fa-chevron-down"></i>
                            </a>
                        </td>

                        {{-- Périodo de vingencia do PDi --}}
                        <td class="align-middle">{{ $plan->initial_year }} - {{ $plan->final_year }}</td>

                        {{-- Condição para imprimir ativo ou inativo, pois no db é registrado 0 ou 1 --}}
                        {{-- <td class="align-middle">{{ $plan->situacao == 1 ? 'Ativo':'Inativo'}}</td> --}}

                        <td class="align-middle">{{ $plan->status == 1 ? 'Ativo' : 'Inativo' }}</td>

                        <td class="align-middle">
                            {{-- Botoes da ação de ver, editar e cancelar --}}
                            <a href="{{ route('pdi.show', $plan->id) }}" class="btn btn-primary btn-sm"
                               title="Ver plano"> <i class="fas fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('pdi.edit', $plan->id) }}" class="btn btn-warning btn-sm"
                               title="Editar plano"> <i class="fas fa-solid fa-pen"></i>
                            </a>
                            <a href="{{ route('objetivo.plano.create', $plan->id) }}" class="btn btn-success btn-sm"
                               title="Criar objetivo"> <i class="fas fa-plus"></i>
                            </a>
                            <form
                                    action="{{ route('pdi.destroy', $plan->id) }}"
                                    method="POST" class="form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        title="Apagar"><i
                                            class="fas fa-sharp fa-solid fa-trash"></i></button>
                            </form>
                        </td>

                    </tr>
                    <tr>
                        <td class="hiddenRow" colspan="12">
                            <div class="accordian-body collapse" id="plano{{ $plan->id }}">
                                <table class="table table-sm">
                                    @if(!count($plan->objectives) < 1)
                                        <thead>
                                        <tr class="info">
                                            <th>Objetivo</th>
                                            <th>Tema</th>
                                            <th>Perspectiva</th>
                                            <th>Descricao</th>
                                            <th>Ações</th>
                                        </tr>
                                        </thead>
                                    @else
                                        <thead>
                                        <tr class="info">
                                            <th>Não há objetivos cadastrados para o plano.</th>
                                        </tr>
                                        </thead>
                                    @endif

                                    <tbody>
                                    @foreach ($plan->objectives as $objective)
                                        <tr data-toggle="collapse" class="accordion-toggle"
                                            data-target="plano{{ $plan->id }}">
                                            <td class="align-middle">
                                                {{ $objective->name }}
                                            </td>
                                            <td class="align-middle">{{ $objective->theme->name  }}</td>
                                            <td class="align-middle">{{ $objective->perspective->name  }}</td>
                                            <td class="align-middle" width="34%">{{ $objective->description }}
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex flex-row">
                                                    <div class="ml-1">
                                                        <a href="{{ route('objetivo.plano.edit', [$objective->id, $plan->id]) }}"
                                                           class="btn btn-warning btn-sm">
                                                            <i class="fas fa-solid fa-pen"></i>
                                                        </a>
                                                    </div>
                                                    <div class="form-group ml-1">
                                                        <button type="button" class="btn btn-dark btn-sm"
                                                                title="Ver Indicadores" data-toggle="modal"
                                                                data-target="#IndicadoresObjetivo{{$objective->id}}"><i
                                                                    class="fas fa-eye"></i></button>
                                                    </div>
                                                    <div class="ml-1">
                                                        <form
                                                                action="{{ route('objetivo.destroy', $objective->id) }}"
                                                                method="POST" class="form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                    title="Apagar"><i
                                                                        class="fas fa-sharp fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="IndicadoresObjetivo{{$objective->id}}" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="IndicadoresObjetivo" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="DetalhesObjetivo"><strong> Detalhes
                                                                do Objetivo</strong></h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <strong>Objetivo:</strong><br>
                                                            {{$objective->name}}
                                                        </div>
                                                        <div class="form-group">
                                                            <strong>Descrição:</strong><br>
                                                            {{$objective->description}}
                                                        </div>
                                                        <div class="form-group">
                                                            @if(count($objective->indicators) > 0)
                                                                <strong>Indicadores Vinculados:</strong>
                                                                @foreach($objective->indicators as $indicator)
                                                                    <li class="list-group-item">{{$indicator->name}}</li>
                                                                    <a href="{{route('indicador.objetivo.edit', [$indicator->id, $objective->id])}}">Editar</a>
                                                                @endforeach
                                                            @else
                                                                <strong>Não há indicadores registrados para este
                                                                    objetivo.</strong>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer flex justify-content-between">
                                                        <a href="{{ route('indicador.objetivo.create', $objective->id) }}"
                                                           class="btn btn-success "
                                                           title="Criar Indicador">Criar Indicador<i
                                                                    class="fas fa-plus pl-2"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                                data-dismiss="modal">Fechar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                    </tbody>
                                </table>
                @endforeach
                </tbody>
                </thead>
            </table>


    {{-- <div class="cards"> --}}
    {{-- Paginação do resultado do db --}}
    {{-- @if (isset($filters))
             {{ $plans->appends($filters)->links()}}
        @else
             {{ $plans->links()}}
        @endif --}}

    {{-- </div> --}}




@stop
