<div class="container">
    <div class="form-group">
      <label for="formGroupExampleInput">Nome completo:</label>
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Ex João Silva" value="{{ $employee->fullname ?? '' }}">

    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Login:</label>
      <input type="text" class="form-control" id="login" name="login" placeholder="Ex Joao12" value="{{ $employee->login ?? '' }}">
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput">Password:</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Saldo atual:</label>
      <input type="text" class="form-control" id="current_balance" name="current_balance" placeholder="R$ 10,00" value="{{ $employee->current_balance ?? '' }}">
    </div>
   <button class="btn btn-primary" type="submit">{{ $employee ?? '' ? 'Atualizar' : 'Cadastrar' }} funcionário</button>
</div>