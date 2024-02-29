@include('admin.componentes.flash')
<div class="form-row">
    {{-- <div class="form-group col-md-2">
        <label>Tipo de Plano</label>
        <select name="type_plan_id" class="form-control">
            <option value="{{ $typePlan->id }}">{{ $typePlan->name }} </option>
        </select>
    </div> --}}

    <div class="form-group col-md-2">
        <label>Situação</label>
        <select name="status" class="form-control">
            <option disabled> Selecione... </option>
            <option value="0"> Inativo </option>
            <option value="1"> Ativo </option>
        </select>
    </div>

    <div class="form-group col-md-2">
        <label>Ano Inicial:</label>
        <input type="number" name="initial_year" value="{{ $plan->initial_year ?? old('initial_year') }}"
               class="form-control" minlength='4' maxlength="4" required>
    </div>

</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <label>Nome do Plano</label>
        <input type="text" class="form-control" name="name" value="{{ $plan->name ?? old('name') }}"
               placeholder="Ex. PDU PROPLAN">
    </div>

    <div class="form-group col-md-3">
        <label>Responsável</label>
        <select name="sector_id" class="form-control">
            @forelse ($sectors as $sector)
                <option value="{{ $sector->id }}">{{ $sector->abbreviation }} - {{ $sector->city }}</option>
            @empty
                <option>Sem Unidades</option>
            @endforelse
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-10">
        <label>Missão</label>
        <textarea class="form-control" name="mission" placeholder="Opicional" rows="4">{{ $plan->mission ?? old('mission') }}</textarea>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-10">
        <label>Visão</label>
        <textarea class="form-control" name="vision" placeholder="Opicional" rows="4">{{ $plan->vision ?? old('vision') }}</textarea>
    </div>
</div>

<div class="form-row">
    <div class="form-group btn-sm ml-1">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
    </div>
    <div class="form-group btn-sm ml-1">
        <a href="{{ route('pdi.index') }}" class="btn btn-outline-danger"><i class="fas fa-window-close"></i>
            Cancelar</a>
    </div>
</div>
