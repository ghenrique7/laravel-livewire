@extends('adminlte::page')

@section('title', 'Adicionar curso')

@section('content_header')
    <br>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('curso.store') }}" method="POST" class="form">
            @csrf
            <div class="card-header">
                <h1>Cadastrar Novo Curso</h1>
            </div>
            <div class="card-body">

                <div class="form form-row">
                    <div class="form-group col-md-2">
                        <label for="nome">Código do Curso</label>
                        <input type="text" name="codigo_curso" class="form-control" id="nome" placeholder="12040">
                    </div>
                </div>
                <div class="form form-row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome do Curso</label>
                        <input type="text" name="nome" class="form-control" id="nome"
                            placeholder="Ex: Ciência da Computação">
                    </div>

                </div>
                <div class="form form-row">
                    <div class="form-group col-md-3">
                        <label for="nivel_academico">Nível Acadêmico</label>
                        <select class="form-control" name="nivel_academico" id="nivel_academico">
                            <option selected disabled>Selecione...</option>
                            <option value="G">Graduação</option>
                            <option value="E">Especialização</option>
                            <option value="M">Mestrado</option>
                            <option value="D">Doutorado</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="grau">Grau</label>
                        <select class="form-control" id="grau" name="grau">
                            <option disabled selected>Selecione...</option>
                            <option value="Bacharelado">Bacharelado</option>
                            <option value="Licenciatura">Licenciatura</option>
                        </select>
                    </div>
                </div>
                <div class="form form-row">
                    <div class="form-group col-md-3">
                        <label for="data">Data de Início</label>
                        <input type="date" class="form-control" id="data" name="data_inicio">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="situacao">Situação</label>
                        <select class="form-control" id="situacao" name="situacao">
                            <option selected disabled>Selecione uma opção</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Em extinção">Em extinção</option>
                            <option value="Extinto">Extinto</option>
                        </select>
                    </div>
                </div>
                <div class="form form-row">
                    <div class="form-group col-md-3">
                        <label for="unidade_academica">Unidade Academica</label>
                        <select class="form-control" id="unidade_academica" name="unidade_academica">
                            {{-- @foreach ($cursos as $curso)
                                    <option>{{ $curso->unidade_academica }}</option>
                                @endforeach --}}
                            <option selected disabled>Selecionte...</option>
                            <option value="IBEF">IBEF</option>
                            <option value="ICED">ICED</option>
                            <option value="ICS">ICS</option>
                            <option value="ICTA">ICTA</option>
                            <option value="IFII">IFII</option>
                            <option value="IEG">IEG</option>
                            <option value="ISCO">ISCO</option>
                            <option value="CALE">CALE</option>
                            <option value="CMAL">CMAL</option>
                            <option value="CITB">CITB</option>
                            <option value="CORI">CORI</option>
                            <option value="COBI">COBI</option>
                            <option value="CJUR">CJUR</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="local_oferta">Local de Oferta</label>
                        <select class="form-control" id="local_oferta" name="local_oferta">
                            <option selected disabled>Selecione...</option>
                            <option value="Alenquer">Alenquer</option>
                            <option value="Itaituba">Itaituba</option>
                            <option value="Juruti">Juruti</option>
                            <option value="Monte Alegre">Monte Alegre</option>
                            <option value="Óbidos">Óbidos</option>
                            <option value="Oriximiná">Oriximiná</option>
                            <option value="Santarém">Santarém</option>
                        </select>
                    </div>
                </div>
                <div class="form form-row">
                    <div class="form-group col-md-3">
                        <label for="modalidade">Modalidade</label>
                        <div class="form form-row">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="modalidade" id="presencial"
                                    value="presencial" onchange="togglePoloEadField()">
                                <label class="form-check-label" for="presencial">
                                    Presencial
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="modalidade" id="ead"
                                    value="ead" onchange="togglePoloEadField()">
                                <label class="form-check-label" for="ead">
                                    EaD
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3" id="poloEadField" style="display: none;">
                        <label for="polo_ead">Polo EAD</label>
                        <select class="form-control" id="polo_ead" name="polo_ead">
                            <option selected disabled>Selecione...</option>
                            <option value="Novo Progresso">Novo Progresso</option>
                            <option value="Faro">Faro</option>
                            <option value="Alenquer">Alenquer</option>
                            <option value="Monte Alegre">Monte Alegre</option>
                            <option value="Óbidos">Óbidos</option>
                            <option value="Oriximiná">Oriximiná</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="form-row justify-content-left">
                    <div class="form-group btn-sm ml-1">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                    </div>
                    <div class="form-group btn-sm ml-1">
                        <a href="{{ route('curso.index') }}" class="btn btn-outline-danger"><i
                                class="fas fa-window-close"></i>
                            Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function togglePoloEadField() {
            var poloEadField = document.getElementById('poloEadField');
            var eadRadio = document.getElementById('ead');

            poloEadField.style.display = eadRadio.checked ? 'block' : 'none';
        }
    </script>
@stop
