
<div class="container">

  <h2>Editar Disciplina</h2>

  <form action="<?php echo base_url('discipline/update/'.$discipline->id) ?>" method="post">
  <div class="form-group">
      <label for="nome">Sigla</label>
      <input type="text" class="form-control" id="sigla" name="sigla" value="<?php echo $discipline->sigla ?>" placeholder="Sigla">
    </div>
    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $discipline->name ?>" placeholder="Nome">
    </div>
    <div class="form-group">
      <label for="sobrenome">Descrição</label>
      <input type="text" class="form-control" id="description" name="description" value="<?php echo $discipline->description ?>" placeholder="Sobrenome">
    </div>
    <button type="submit" class="btn btn-default">Salvar</button>
  </form>

</div>
