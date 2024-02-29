{{-- <div class="mb-3">
    <label>Tipo de Plano</label>
    <input type="text" class="form-control" name="name" value ="{{ $typeplan->name ?? "" }}"
        placeholder="Ex: PDI">
</div>

<div class="mb-3">
    <label>Descrição</label>
    <textarea class="form-control" name="description" rows="5" placeholder="Ex: Plano de Desenvolvimento Institucional">{{ $typeplan->description ?? "" }}</textarea>

</div> --}}



<div class="form-row">
    <div class="form-group col-md-4">
        <label>Tipo de Plano</label>
        <input type="text" class="form-control" name="name" value ="{{ $typeplan->name ?? '' }}" placeholder="Ex: PDI">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label>Descrição</label>
        <textarea class="form-control" name="description" rows="5"
            placeholder="Ex: Plano de Desenvolvimento Institucional">{{ $typeplan->description ?? '' }}</textarea>

    </div>
</div>
<div class="form-row">
    <div class="form-group btn-sm ml-1">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
    </div>
    <div class="form-group btn-sm ml-1">
        <a href="{{ route('tipo-plano.index') }}" class="btn btn-outline-danger"> <i class="fas fa-window-close"></i> Sair</a>
    </div>
</div>
