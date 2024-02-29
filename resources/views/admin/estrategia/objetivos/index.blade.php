@extends('adminlte::page')

@section('title', 'Objetivos')

@section('content_header')
    <h1>Lista de Objetivos</h1>
    <a href="{{ route('objetivo.create')}}" class="btn btn-success"> <i class="fas fa-plus-circle"></i> OBJETIVO</a>
@stop

@section('content')
    @include('admin/componentes/flash')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('objetivo.search') }}" method="POST" class="form form-row">
                @csrf
                <div class="form-group col-6">
                    <input type="text" class="form-control" placeholder="Digite o nome do Objetivo" name="filter"
                           value="{{ $filters['filter'] ?? ''  }}">
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
                    <th>Objetivo</th>
                    <th>Descrição</th>
                    <th>Perspectiva</th>
                    <th>Tema</th>
                    <th width="180"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($objectives as $objective)
                    <tr data-toggle="collapse" class="accordion-toggle"
                        data-target="objetivo{{ $objective->id }}">
                        {{-- Impressão do nome do Objetivo Estratégico --}}
                        <td class="align-middle">{{ $objective->name }}</td>
                        {{-- impressa do tema do objetivo --}}
                        <td class="align-middle"> {{ $objective->description}} </td>
                        {{-- Modal do detalhes dos objetivos--}}
                        <td class="align-middle"> {{ $objective->theme->name}} </td>

                        <td class="align-middle"> {{ $objective->perspective->name}} </td>


                        <td class="align-middle">
                            {{-- Botoes da ação de ver, editar e cancelar --}}
                            <div class="form-inline">
                                <div class="form-group ml-1">
                                    <a href="{{ route('objetivo.edit', $objective->id), }}"
                                       class="btn btn-warning btn-sm" title="Editar"> <i
                                            class="fas fa-solid fa-pen"></i></a>
                                </div>
                                {{--botões das ações--}}
                                {{-- data-toggle="modal" data-target="#ObjetivoIndicador{{$objective->id}}" --}}
                                <div class="form-group ml-1">
                                    <a title="Vincular Indicadores" class="btn btn-primary btn-sm" data-toggle="modal"
                                       data-target="#ObjetivoIndicador{{$objective->id}}">
                                        <i class="fas fa-solid fa-list"></i>
                                    </a>
                                </div>
                                <div class="form-group ml-1">
                                    <button type="button" class="btn btn-dark btn-sm" title="Detalhes"
                                            data-toggle="modal" data-target="#DetalhesObjetivo{{$objective->id}}"><i
                                            class="fas fa-eye"></i></button>
                                </div>
                                <div class="form-group ml-1">
                                    <form action="{{ route('objetivo.destroy', $objective->id) }}" method="POST"
                                          class="form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Apagar"><i
                                                class="fas fa-sharp fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>

                    {{--Modal de detalhes dos objetivos--}}

                    <div class="modal fade" id="DetalhesObjetivo{{$objective->id}}" tabindex="-1" role="dialog"
                         aria-labelledby="DetalhesObjetivo" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="DetalhesObjetivo"><strong> Detalhes do Objetivo</strong>
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                {{$indicator->name}}
                                            @endforeach
                                        @else
                                            <strong>Não há indicadores registrados para este objetivo.</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div> {{--fim do modal detalhes dos objetivos--}}

                    {{--Inicio do modal para vincular indicadores a um objetivo--}}

                    <div class="modal fade" id="ObjetivoIndicador{{$objective->id}}" tabindex="-1" role="dialog"
                         aria-labelledby="ObjetivoIndicador" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="ObjetivoIndicador"><strong>
                                            Vincular Indicadores</strong></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar
                                    </button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
