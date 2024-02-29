@include('admin.componentes.flash')
<div class="form-row">
    <div class="form-group col-md-9">
        <label>Nome do Objetivo</label>
        <input type="text" class="form-control" name="name" placeholder="Ex: Ampliar a formação acadêmica"
               value="{{ $objective->name ?? old('name') }}">
    </div>
</div>
<div class="form-row">
    @if(isset($plan) || isset($objective))
        <input type="hidden" value="{{ $plan->id ?? $objective->plan->id }}" name="plan_id" readonly>
    @else
        <div class="form-group col-md-3">
            <label>Plano</label>
            <select name="plan_id" class="form-control">
                @foreach($plans as $plan)
                    <option value="{{ $plan->id }}" selected>{{ $plan->name }}
                    </option>
                @endforeach
            </select>
        </div>
    @endif

    <div class="form-group col-md-3">
        @if(!isset($objective))
        <label for="perspective_id">Perspectivas</label>
            <select name="perspective_id" id="perspective_id" class="form-control">
                @foreach ($perspectives as $perspective)
                    <option value="{{ $perspective->id }}" selected>
                        {{ $perspective->name ?? old('perspective') }}</option>
                    {{-- <option value="Resultados">Resultados</option>
                <option value="Processos">Processos</option>
                <option value="Pessoas">Pessoas</option>
                <option value="Orçamento">Orçamento</option>
                <option value="Infraestrutura">Infraestrutura</option>
                <option value="TIC">TIC</option> --}}
                @endforeach
            </select>

        @else
            <input type="hidden" class="form-control" name="perspective_id" id="perspective_id"
                   value="{{ $objective->perspective->id  }} " readonly>
        @endif
    </div>
    <div class="form-group col-md-3">
        @if(!isset($objective))
        <label for="theme_id">Tema</label>
            @foreach ($themes as $theme)
                <select name="theme_id" id="theme_id" class="form-control">
                    <option value="{{ $theme->id ?? old('theme_id') }}"
                            selected>{{ $theme->name ?? old('theme_id') }}
                    </option>
                </select>
            @endforeach
            {{-- <option value="Acessibilidade">Acessibilidade</option>
            <option value="Assistência Estudantil">Assistência Estudantil</option>
            <option value="Graduação">Graduação</option>
            <option value="Pós-Graduação">Pós-Graduação</option>
            <option value="Extensão">Extensão</option>
            <option value="Pesquisa">Pesquisa</option> --}}
        @else
            <input type="hidden" class="form-control" name="theme_id" id="theme_id"
                   value="{{ $objective->theme->id  }} " readonly>
        @endif
    </div>
</div>
<div class="form-row">

    <div class="form-group col-md-9">
        <label>Nivel</label>
        <textarea class="form-control" name="level" placeholder="Nivel do tema"
                  rows="4">{{ $objective->level ?? old('level') }}</textarea>
    </div>

    <div class="form-group col-md-9">
        <label>Descrição do Obejtivo ou Resultados Chaves</label>
        <textarea class="form-control" name="description"
                  placeholder="Descreva o que se pretende conseguir com o objective"
                  rows="4">{{ $objective->description ?? old('description') }}</textarea>
    </div>

</div>
</div>
<div class="form-row">
    <div class="form-group ml-1">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
    </div>
    <div class="form-group ml-1">
        <a href="{{ route('objetivo.index') }}" class="btn btn-outline-danger"><i class="fas fa-window-close"></i></a>
    </div>

</div>
