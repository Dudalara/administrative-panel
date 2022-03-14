<div class="col-6 container text-white bg-secondary mt-5 px-5 py-5">
    <div class="form-group">
      <label for="fullname">Nome completo:</label>
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Ex João Silva" value="{{ $employee->fullname ?? '' }}">

    </div>
      <label for="login">Login:</label>
      <input type="text" class="form-control" id="login" name="login" placeholder="Ex Joao12" value="{{ $employee->login ?? '' }}">
    <div class="form-group">
    </div>
    <div class="form-group">
      <label for="password">Senha:</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
      <label for="current_balance">Saldo atual:</label>
      <input type="text" class="form-control" id="current_balance" name="current_balance" placeholder="R$ 10,00" value="{{ $employee->current_balance ?? '' }}">
    </div>
   <button class="btn btn-dark mt-2" type="submit">{{ $employee ?? '' ? 'Atualizar' : 'Cadastrar' }} funcionário</button>
</div>
<script>
$(document).ready(function($){
  $("#current_balance").mask('000.000.000.000.000,00', {reverse: true});
});
</script>