
<div class="container">

  <h2>Editar Autores</h2>

  <form action="<?php echo base_url('category/update/'.$category->CategoryID) ?>" method="post">
  <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="CategoryName" name="CategoryName" value="<?php echo $category->CategoryName ?>" placeholder="categoryName">
    </div>
    <input type="hidden" name="CategoryID" value="<?=$category->CategoryID?>"/>
    <button type="submit" class="btn btn-default">Salvar</button>
  </form>

</div>
