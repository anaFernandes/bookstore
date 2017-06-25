
<div class="container">

  <h2>Editar Autores</h2>

  <form action="<?php echo base_url('author/update/'.$author->AuthorID) ?>" method="post">
  <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nameF" name="nameF" value="<?php echo $author->nameF ?>" placeholder="nameF">
    </div>
    <div class="form-group">
      <label for="nome">Sobrenome</label>
      <input type="text" class="form-control" id="nameL" name="nameL" value="<?php echo $author->nameL ?>" placeholder="nameL">
    </div>
    <input type="hidden" name="AuthorID" value="<?=$author->AuthorID?>"/>
    <button type="submit" class="btn btn-default">Salvar</button>
  </form>

</div>
