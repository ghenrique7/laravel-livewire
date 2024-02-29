@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos Cadastrados</h1>
</br>
    <a href="" class="btn btn-success"><i class="fas fa-plus-circle"></i> Novo Plano</a>

@stop

@section('content')


    <div class="card">
        <div class="card-header">
            <form action="" method="POST" class="form form-row">
                @csrf
                <div class="form-group col-6">
                    <input type="text" class="form-control"  placeholder="Digite o nome do Plano" name="filter" value="{{ $filters['filter'] ?? '' }}">
                </div>
                <div class="form-group ml-1">
                    <button type="submit" class="btn btn-info" title="Pesquisar"> <i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>

        <div class="card-body">
            @php
            $dados = [
                 [
                     'plano' => 'Plano A',
                     'descricao' => 'Projeto A',
                     'periodo' => 'Janeiro 2024',
                     'situacao' => 'Concluído',
                 ],
                 [
                     'plano' => 'Plano B',
                     'descricao' => 'Tarefa 1',
                     'periodo' => 'Fevereiro 2024',
                     'situacao' => 'Em andamento',
                 ],
                 [
                     'plano' => 'Plano C',
                     'descricao' => 'Reunião Mensal',
                     'periodo' => 'Março 2024',
                     'situacao' => 'Planejado',
                 ],
                 [
                     'plano' => 'Plano D',
                     'descricao' => 'Projeto B',
                     'periodo' => 'Abril 2024',
                     'situacao' => 'Atrasado',
                 ],
                 [
                     'plano' => 'Plano E',
                     'descricao' => 'Tarefa 2',
                     'periodo' => 'Maio 2024',
                     'situacao' => 'Concluído',
                 ],
                 [
                     'plano' => 'Plano F',
                     'descricao' => 'Treinamento',
                     'periodo' => 'Junho 2024',
                     'situacao' => 'Em andamento',
                 ],
                 [
                     'plano' => 'Plano G',
                     'descricao' => 'Projeto C',
                     'periodo' => 'Julho 2024',
                     'situacao' => 'Planejado',
                 ],
                 [
                     'plano' => 'Plano H',
                     'descricao' => 'Tarefa 3',
                     'periodo' => 'Agosto 2024',
                     'situacao' => 'Atrasado',
                 ],
                 [
                     'plano' => 'Plano I',
                     'descricao' => 'Entrega de Relatório',
                     'periodo' => 'Setembro 2024',
                     'situacao' => 'Concluído',
                 ],
                 [
                     'plano' => 'Plano J',
                     'descricao' => 'Projeto D',
                     'periodo' => 'Outubro 2024',
                     'situacao' => 'Em andamento',
                 ],
             ];

         @endphp
            <table class="table table-sm">
                <thead>
                    <tr>
                        {{-- Cabeçalho da tabela de impressão dos PDIS cadastrados --}}
                        <th>#</th>
                        <th>Nome do Plano</th>
                        <th>Período</th>
                        <th>Situação</th>
                        <th width="250"></th>
                    </tr>
                    <tbody>

                        @foreach ($dados as $plano)
                            <tr>
                                <td><i class="fas fa-chevron-circle-down"></i></td>
                                {{-- Impressão da descrição do PDI --}}
                                <td class="align-middle">{{ $plano['plano']}}</td>

                                {{-- Périodo de vingencia do PDi --}}
                                <td class="align-middle">{{ $plano['periodo']}}</td>

                                {{-- Condição para imprimir ativo ou inativo, pois no db é registrado 0 ou 1 --}}
                                <td class="align-middle">{{ $plano['situacao']}}</td>

                                <td class="align-middle">
                                    {{-- Botoes da ação de ver, editar e cancelar --}}
                                    <a href="" class="btn btn-primary btn-sm" title="Ver detalhes do Plano"> <i class="fas fa-solid fa-eye"></i></a>
                                    <a href="" class="btn btn-warning btn-sm" title="Editar Plano"> <i class="fas fa-solid fa-pen"></i></a>
                                    <a href="" class="btn btn-danger btn-sm" title="Apagar Plano"> <i class="fas fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    </div>

    <div class="cards">
        {{-- Paginação do resultado do db
        @if (isset($filters))
             {{ $planos->appends($filters)->links()}}
        @else
             {{ $planos->links()}}
        @endif
        --}}

    </div>

@stop


