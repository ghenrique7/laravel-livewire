@include('admin.componentes.flash')
<div class="form-row">
    <div class="form-group col-md-2">
        <label>Tipo de Plano</label>
        <select  name="tipo_plano" class="form-control">
          <option value="{{$plano->tipo_plano ?? old('tipo_plano')}}" selected>{{$plano->tipo_plano ?? old('tipo_plano')}}</option>
          <option value="Gestão Institucional">Gestão Institucional</option>
          <option value="PDI">PDI</option>
          <option value="PDU">PDU</option>
          <option value="PGO" disabled>PGO</option>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label>Responsável</label>
        <select  name="setor_plano" class="form-control">
          <option disabled selected>Selecione...</option>
          @foreach ($setores as $setor)
          <option value="{{$setor->id_setor}}">{{$setor->sigla}}</option>
          @endforeach
        </select>
    </div>
    <div class="form-group col-md-2">
         <label>Situação</label>
            <select  name="situacao_plano" class="form-control">
                <option disabled selected>Selecione...</option>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
    </div>
    <div class="form-group col-md-2">
        <label>Data inicial:</label>
        <input type="date" name="ano_inicial_plano" value="{{$plano->ano_inicial_plano ?? old('ano_inicial_plano')}}" class="form-control">
    </div>
    <div class="form-group col-md-2">
          <label>Data final</label>
          <input type="date" name="ano_final_plano"  class="form-control" value="{{$plano->ano_final_plano ?? old('ano_final_plano')}}">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-3">
      <label>Nome do Plano</label>
      <input type="text" class="form-control" name="nome_plano" value="{{$plano->nome_plano ?? old('nome_plano')}}" placeholder="Ex. PDU PROPLAN (2010-2015)">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-10">
      <label>Missão</label>
      <textarea class="form-control" name="missao_plano" placeholder="Opicional" rows="4">{{$plano->missao_plano ?? old('missao_plano')}}</textarea>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-10">
      <label>Visão</label>
      <textarea class="form-control" name="visao_plano" placeholder="Opicional" rows="4">{{$plano->visao_plano ?? old('visao_plano')}}</textarea>
    </div>
</div>
<div class="form-row">
   <div class="form-group btn-sm ml-1">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
    </div>
    <div class="form-group btn-sm ml-1">
        <a href="{{route('planos.index')}}" class="btn btn-outline-danger"><i class="fas fa-window-close"></i> Cancelar</a>
    </div>
</div>
