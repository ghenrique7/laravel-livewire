@include('admin.componentes.flash')

<div class="form-row">
    @if (!isset($objective))
        <div class="form-group col-md-8">
            <label>Objetivo Estratégico</label>
            <select name="objective_id" class="form-control">
                @foreach ($objectives as $objective)
                    <option value="{{ $objective->id }}">{{ $objective->name }}</option>
                @endforeach
            </select>
        </div>
    @else
        <input type="hidden" class="form-control" value="{{ $objective->id }}" name="objective_id">
    @endif
</div>

<div class="form-row">
    <div class="form-group col-md-8">
        <label>Nome do indicador</label>
        <input type="text" class="form-control" name="name"
               value="{{ $indicator->name ?? old('name') }}" placeholder="Taxa de Sucesso no Ensino" required>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-2">
        <label>Classificação</label>
        @if(!isset($indicator->classification))
            <select name="classification" class="form-control" required>
                <option value="{{ old('classification') }}" selected>
                    {{ old('classificacao') }}</option>
                <option value="Esforço">Esforço</option>
                <option value="Resultado">Resultado</option>
            </select>
        @else
            <input type="text" class="form-control" name="classification" value="{{$indicator->classification}}"
                   readonly>
        @endif
        <div class="text-info text-sm">
            Não poderá ser alterado
        </div>
    </div>

    <div class="form-group col-md-2">
        <label>Polaridade</label>
        @if(!isset($indicator->polarity))
            <select name="polarity" class="form-control" required>
                <option value="{{  old('polarity') }}" selected>
                    {{ old('polarity') }}</option>
                <option value="Maior-Melhor">Maior-Melhor</option>
                <option value="Menor-Melhor">Menor-Melhor</option>
            </select>
        @else
            <input type="text" class="form-control" name="polarity" value="{{$indicator->polarity}}" readonly>
        @endif
        <div class="text-info text-sm">
            Não poderá ser alterado
        </div>
    </div>

    <div class="form-group col-md-2">
        <label>Periodicidade</label>
        @if(!isset($indicator->polarity))
            <select name="periodicity" class="form-control" required>
                <option value="{{ old('periodicity') }}" selected>
                    {{ old('periodicity') }}</option>
                <option value="Semestral">Semestral</option>
                <option value="Anual">Anual</option>
            </select>
        @else
            <input type="text" class="form-control" name="periodicity" value="{{$indicator->periodicity}}" readonly>
        @endif
        <div class="text-info text-sm">
            Não poderá ser alterado
        </div>
    </div>

    <div class="form-group col-md-3">
        <label>Responsável</label>
        <select name="sector_id" class="form-control" required>
            @if (!isset($sector))
                @foreach ($sectors as $sector)
                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                @endforeach
            @else
                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
            @endif
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-8">
        <label>O que o indicador mostra?</label>
        <textarea class="form-control" name="finality" placeholder="O que o indicator mostra" rows="4"
                  required>{{ $indicator->finality ?? old('finality') }}</textarea>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-8">
        <label>Fonte de coleta de dados</label>
        <input type="text" class="form-control" name="data_font"
               value="{{ $indicator->data_font ?? old('data_font') }}" placeholder="Sistema SCDP" required>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-8">
        <label>Forma da coleta de dados</label>
        <input type="text" class="form-control" name="collect_form"
               value="{{ $indicator->collect_form ?? old('collect_form') }}"
               placeholder="Extração de Relatórios do Sistema SCDP" required>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-8">
        <label>Descrição do Cálculo</label>
        <textarea class="form-control" name="calc_description" placeholder="Dividir isso por aquilo" rows="4"
                  required>{{ $indicator->calc_description ?? old('calc_description') }}</textarea>
    </div>
</div>

<div class="form-row">
    <div class="form-group btn-sm ml-1">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
    </div>
    <div class="form-group btn-sm ml-1">
        <a href="{{ route('indicador.index') }}" class="btn btn-outline-danger"> <i
                class="fas fa-window-close"></i></a>
    </div>
</div>
