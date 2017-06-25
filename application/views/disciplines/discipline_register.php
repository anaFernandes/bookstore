
<div class="container">

  <h2>Cadastrar Disciplinas</h2>

  <form action="<?php echo base_url('discipline/save') ?>" method="post">
  <div class="form-group">
      <label for="nome">Sigla</label>
      <input type="text" class="form-control" id="sigla" name="sigla" placeholder="Sigla">
    </div>
    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
    </div>
    <div class="form-group">
      <label for="sobrenome">Descrição</label>
      <input type="text" class="form-control" id="description" name="description" placeholder="Sobrenome">
    </div>
    <button type="submit" class="btn btn-default">Cadastrar</button>
  </form>

</div>
