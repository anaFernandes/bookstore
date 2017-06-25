
<div class="container">

  <h2>Cadastrar Autor</h2>

  <form action="<?php echo base_url('book/saveInsert') ?>" method="post">
  <div class="form-group">
    <label for="nome">ISBN</label>
    <input type="text" class="form-control" id="ISBN" name="ISBN" placeholder="ISBN">
  </div>
  <div class="form-group">
  <label for="nome">Título</label>
  <input type="text" class="form-control" id="title" name="title" placeholder="title">
</div>
<div class="form-group">
<label for="nome">Descrição</label>
<input type="text" class="form-control" id="description" name="description" placeholder="Nome">
</div>
<div class="form-group">
<label for="sobrenome">Preço</label>
<input type="text" class="form-control" id="price" name="price" placeholder="price">
</div>
<div class="form-group">
  <label for="nome">Editora</label>
  <input type="text" class="form-control" id="publisher" name="publisher" placeholder="publisher">
</div>
<div class="form-group">
<label for="nome">Data de publicação</label>
<input type="text" class="form-control" id="pubdate" name="pubdate" placeholder="">
</div>
<div class="form-group">
<label for="sobrenome">Edição</label>
<input type="text" class="form-control" id="edition" name="edition" value="" placeholder="">
</div>
<div class="form-group">
  <label for="nome">Número de páginas</label>
  <input type="text" class="form-control" id="pages" name="pages" value="" placeholder="">
</div>
</div>
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
</div>
<?php if ($categories == FALSE): ?>
  <tr><td colspan="2">Nenhum autor encontrado</td></tr>
<?php else: ?>
<?php foreach ($categories as $row): ?>
  <p>
    <input type="checkbox" name="categories[]" value="<?php echo $row->CategoryID; ?>">
    <?php echo $row->CategoryName;?>
  </p>
<?php endforeach; ?>
<?php endif; ?>
<button type="submit" class="btn btn-default">Cadastrar</button>
</form>
</div>
