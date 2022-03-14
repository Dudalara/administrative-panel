<div class="col-6 container text-white bg-secondary mt-5 px-5 py-5">
  <div class="form-inline">
    <label>Tipo de movimentação:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" value="IN" name="typeMovement">
      <label class="form-check-label">
        Entrada
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" value="OUT" name="typeMovement">
      <label class="form-check-label">
        Saída
      </label>
    </div>
    @error('typeMovement')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
    <div class="form-group">
      <label for="amount">Valor:</label>
      <input type="text" class="form-control" id="amount" name="amount" placeholder="R$ 10,00" value="{{ old('amount') }}" autofocus>
    </div>
    <div class="form-group">
      <label for="note">Observação:</label>
      <input type="string" class="form-control" id="note" name="note" value="{{ old('note') }}" autofocus>
    </div>
    <div class="form-group">
        <label for="employeeId">Funcionário:</label>
         <select class="form-select" name="employeeId">
              <option value="" selected>Selecione um funcionário</option>
            @foreach ($employees as $employee)
              <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
            @endforeach
        </select>
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    </div>
   <button class="btn btn-dark mt-2" type="submit"> Cadastrar movimentação</button>
</div>
<script>
$(document).ready(function($){
  $("#amount").mask('000.000.000.000.000,00', {reverse: true});
});
</script>