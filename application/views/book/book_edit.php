<div class="container">

  <h2>Editar Livro</h2>

  <form action="<?php echo base_url('book/update/'.$book->ISBN) ?>" method="post">
  <div class="form-group">
      <label for="nome">Título</label>
      <input type="text" class="form-control" id="title" name="title" value="<?php echo $book->title ?>" placeholder="title">
  </div>
  <div class="form-group">
    <label for="nome">Descrição</label>
    <input type="text" class="form-control" id="description" name="description" value="<?php echo $book->description ?>" placeholder="Nome">
  </div>
  <div class="form-group">
    <label for="sobrenome">Preço</label>
    <input type="text" class="form-control" id="price" name="price" value="<?php echo $book->price ?>" placeholder="price">
  </div>
  <div class="form-group">
      <label for="nome">Editora</label>
      <input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo $book->publisher ?>" placeholder="publisher">
  </div>
  <div class="form-group">
    <label for="nome">Data de publicação</label>
    <input type="text" class="form-control" id="pubdate" name="pubdate" value="<?php echo $book->pubdate ?>" placeholder="">
  </div>
  <div class="form-group">
    <label for="sobrenome">Edição</label>
    <input type="text" class="form-control" id="edition" name="edition" value="<?php echo $book->edition ?>" placeholder="">
  </div>
  <div class="form-group">
      <label for="nome">Número de páginas</label>
      <input type="text" class="form-control" id="pages" name="pages" value="<?php echo $book->pages ?>" placeholder="">
  </div>
  <input type="hidden" name="ISBN" value="<?=$book->ISBN?>"/>

  <h1> Autores </h1>
  <?php if ($authors == FALSE): ?>
    <tr><td colspan="2">Nenhum autor encontrado</td></tr>
  <?php else: ?>
  <?php foreach ($authors as $row): ?>
    <p>
      <input type="checkbox" name="authors[]" value="<?php echo $row->AuthorID; ?>">
      <?php echo $row->nameF;?>
      <?php echo $row->nameL;?>
    </p>
  <?php endforeach; ?>
  <?php endif; ?>

<h1> Categorias </h1>
<?php if ($authors == FALSE): ?>
  <tr><td colspan="2">Nenhum autor encontrado</td></tr>
<?php else: ?>
<?php foreach ($categories as $row): ?>
  <p>
    <input type="checkbox" name="categories[]" value="<?php echo $row->CategoryID; ?>">
    <?php echo $row->CategoryName;?>
  </p>
<?php endforeach; ?>
<?php endif; ?>

<button type="submit" class="btn btn-default">Salvar</button>
</form>
</div>
