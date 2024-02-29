
<div class="form-row">
    <div class="form-group col-md-4">
        <label>Nome do Setor</label>
        <input type="text" class="form-control" name="name" value ="{{ $sector->name ?? old('name') }}"
            placeholder="Ex. Pró-Reitoria de Planejamento e Desenvolvimento Institucional" >
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label>Sigla</label>
        <input type="text" class="form-control" name="abbreviation" placeholder="Ex. Proplan"
            value="{{ $sector->abbreviation ?? old('abbreviation') }}" >
    </div>
</div>

<div class="form-row">

    <div class="form-group col-md-4">
        <label>Tipo de Setor</label>
        <select name="type" class="form-control" >
            <option value="{{ $sector->type ?? old('type')}}" selected> {{ $sector->type ?? 'Selecione ...'}}  </option>
            <option value="Campus">Campus</option>
            <option value="Instituto">Instituto</option>
            <option value="Órgão Suplementar">Órgão Suplementar</option>
            <option value="Pólo EaD">Pólo EaD</option>
            <option value="Pró-Reitoria">Pró-Reitoria</option>
            <option value="Reitoria">Reitoria</option>
        </select>
    </div>
</div>

<div class="form-row">

    <div class="form-group col-md-4">
        <label>Cidade</label>
        <select name="city" class="form-control" >
            <option value="{{ $sector->city ?? old('city') }}" selected >{{ $sector->city ?? 'Selecione ...' }}</option>
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
<div class="form-row">
    <div class="form-group btn-sm ml-1">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
    </div>
    <div class="form-group btn-sm ml-1">
        <a href="{{ route('unidade.index') }}" class="btn btn-outline-danger"> <i class="fas fa-window-close"></i> Sair</a>
    </div>

</div>
