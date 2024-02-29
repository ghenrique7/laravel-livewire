<div class="form-row">
    <div class="form-group col-md-6">
      <label>Setor</label>
     <input type="text" class="form-control" name="sector" value ="{{$sector->sector ?? ''}}" placeholder="Ex. Pró-Reitoria de Planejamento e Desenvolvimento Institucional" required>
    </div>
  </div>

  <div class="form-row">
      <div class="form-group col-md-6">
        <label>Sigla</label>
      <input type="text" class="form-control" name="abbreviation" placeholder="Ex. Proplan" value="{{$sector->abbreviation ?? ''}}" required>
      </div>
  </div>

  <div class="form-row">

      <div class="form-group col-md-3">
          <label>Cidade</label>
          <select  name="city" class="form-control" required>
            <option value="{{$sector->city ?? ''}}" selected required>{{$sector->city ?? 'Selecione ...' }}</option>
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
          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> </button>
      </div>
      <div class="form-group btn-sm ml-1">
          <a href="{{ route('setor.index') }}" class="btn btn-outline-danger"> <i class="fas fa-window-close"></i> </a>
      </div>

  </div>
