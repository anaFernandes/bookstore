<div>
  <h1>Criando um CRUD com CodeIgniter</h1>
</div>
<?php if ($this->session->flashdata('error') == TRUE): ?>
  <p><?php echo $this->session->flashdata('error'); ?></p>
<?php endif; ?>
<?php if ($this->session->flashdata('success') == TRUE): ?>
  <p><?php echo $this->session->flashdata('success'); ?></p>
<?php endif; ?>

<form method="post" action="<?=base_url('books/salvar')?>" enctype="multipart/form-data">
  <div>
    <label>ISBN:</label>
    <label>
    <input type="text" name="ISBN" value="<?=set_value('ISBN')?>" required/>
  </div>

  <div>
    <label>Título:</label>
    <input type="text" name="title" value="<?=set_value('title')?>" required/>
  </div>
  <div>
  <div>
    <label>Descrição:</label>
    <input type="text" name="description" value="<?=set_value('description')?>" required/>
  </div>
  <div>
    <div>
      <label>Preço:</label>
      <input type="text" name="price" value="<?=set_value('price')?>" required/>
    </div>
  <div>
  <div>
    <label>Editora:</label>
    <input type="text" name="publisher" value="<?=set_value('publisher')?>" required/>
  </div>
  <div>
  <div>
    <label>Data de publicação:</label>
    <input type="text" name="pubdate" value="<?=set_value('pubdate')?>" required/>
  </div>
  <div>
  <div>
    <label>Edição:</label>
    <input type="text" name="edition" value="<?=set_value('edition')?>" required/>
  </div>
  <div>
    <div>
      <label>Páginas:</label>
      <input type="text" name="pages" value="<?=set_value('pages')?>" required/>
    </div>
    <div>
    <label><em>Todos os campos são obrigatórios.</em></label>
  </div>
</form>
<div>
  <body>
        <?php if ($categories == FALSE): ?>
          <tr><td colspan="2">Nenhum contato encontrado</td></tr>
        <?php else: ?>
          <?php foreach ($categories as $row): ?>
            <p>
              <input type="checkbox" name="opitional[]" value="<?php echo $row['CategoryID']; ?>">
              <?php echo $row['CategoryName']; ?></label>
            </p>
        <?php endforeach; ?>
      <?php endif; ?>

          <tr><td colspan="2">Nenhum contato encontrado</td></tr>
          <?php if ($authors == FALSE): ?>
            <tr><td colspan="2">Nenhum contato encontrado</td></tr>
        <?php else: ?>
          <?php foreach ($authors as $row): ?>
            <p>
              <input type="checkbox" name="opitional[]" value="<?php echo $row['AuthorID']; ?>">
              <?php echo $row['nameF'];?>
              <?php echo $row['nameL'];?>
            </p>
        <?php endforeach; ?>
      <?php endif; ?>
      <?php if ($authors == FALSE): ?>

      <input type="submit" value="Salvar"/>
  </body>
