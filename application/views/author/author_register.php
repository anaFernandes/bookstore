
<div class="container">

  <h2>Cadastrar Autores</h2>

  <form action="<?php echo base_url('author/save') ?>" method="post">
  <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nameF" name="nameF" placeholder="nome">
    </div>
    <div class="form-group">
      <label for="nome">Sobrenome</label>
      <input type="text" class="form-control" id="nameL" name="nameL" placeholder="sobrenome">
    </div>
    <button type="submit" class="btn btn-default">Cadastrar</button>
  </form>

</div>
