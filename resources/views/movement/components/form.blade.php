<div class="container">
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
  </div>
    <div class="form-group">
      <label for="amount">Valor:</label>
      <input type="text" class="form-control" id="amount" name="amount" placeholder="Ex Joao12">
    </div>
    <div class="form-group">
      <label for="note">Observação:</label>
      <input type="string" class="form-control" id="note" name="note">
    </div>
    <div class="form-group">
        <label for="employeeId">Funcionário:</label>
         <select class="form-select" aria-label="Default select example" name="employeeId">
            @foreach ($employees as $employee)
              <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
            @endforeach
        </select>
    </div>
   <button class="btn btn-primary" type="submit"> Cadastrar movimentação</button>
</div>