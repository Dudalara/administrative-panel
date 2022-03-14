<div class="col-6 container text-white bg-secondary mt-5 px-5 py-5">
    <div class="form-group">
      <label for="fullname">Nome completo:</label>
      <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" placeholder="Ex João Silva" value="{{ $employee->fullname ?? '' }}">
      @error('fullname')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="login">Login:</label>
      <input type="text" class="form-control @error('login') is-invalid @enderror" id="login" name="login" placeholder="Ex Joao12" value="{{ $employee->login ?? '' }}">
       @error('login')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="password">Senha:</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
       @error('password')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="current_balance">Saldo atual:</label>
      <input type="text" class="form-control @error('current_balance') is-invalid @enderror" id="current_balance" name="current_balance" placeholder="R$ 10,00" value="{{ $employee->current_balance ?? '' }}">
      @error('current_balance')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
  </div>
   <button class="btn btn-dark mt-2" type="submit">{{ $employee ?? '' ? 'Atualizar' : 'Cadastrar' }} funcionário</button>
</div>
<script>
$(document).ready(function($){
  $("#current_balance").mask('000.000.000.000.000,00', {reverse: true});
});
</script>