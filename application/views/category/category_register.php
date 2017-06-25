
<div class="container">

  <h2>Cadastrar Categoria</h2>

  <form action="<?php echo base_url('category/save') ?>" method="post">
  <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="CategoryName" name="CategoryName" placeholder="CategoryName">
    </div>
    <button type="submit" class="btn btn-default">Cadastrar</button>
  </form>

</div>
