<div class="form-row">
    <div class="form-group col-md-4">
        <label>Nome da Perspectiva</label>
        <input type="text" class="form-control" name="name" value ="{{ $perspective->name ?? old('name') }}"
            placeholder="Ex. Resultados">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label>Descrição</label>
        <textarea class="form-control" name="description" rows="5"
            placeholder="Ex: Resultados voltados para a sociedade">{{ $perspective->description ?? old('description') }}</textarea>
    </div>
</div>
<div class="form-row">
    <div class="form-group btn-sm ml-1">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
    </div>
    <div class="form-group btn-sm ml-1">
        <a href="{{ route('tema.index') }}" class="btn btn-outline-danger"> <i class="fas fa-window-close"></i> Sair</a>
    </div>
</div>
