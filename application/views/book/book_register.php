
<div class="container">
  <h2>Dados do livro</h2>
  <hr>
  <div class="row">
    <form action="<?php echo base_url('book/saveInsert') ?>" method="post">
      <div class="col-md-12">
        <div class="col-md-8">
          <div class="form-group">
            <label for="nome">Título</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="title">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="nome">ISBN</label>
            <input type="text" class="form-control" id="ISBN" name="ISBN" placeholder="ISBN">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="col-md-8">
          <div class="form-group">
            <label for="nome">Editora</label>
            <input type="text" class="form-control" id="publisher" name="publisher" placeholder="publisher">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="sobrenome">Preço</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="price">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="col-md-8">
          <div class="form-group">
            <label for="sobrenome">Edição</label>
            <input type="text" class="form-control" id="edition" name="edition" value="" placeholder="">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="nome">Data de publicação</label>
            <input type="date" class="form-control" id="pubdate" name="pubdate" placeholder="" style="height:50px">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="col-md-8">
          <label for="nome">Imagem</label>
          <input type="file" class="form-control" id="file" name="file" value="" placeholder="" style="height:50px">
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="nome">Número de páginas</label>
            <input type="number" class="form-control" id="pages" name="pages" value="" placeholder="" style="height:50px">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12">
          <div class="form-group">
            <label for="nome">Descrição</label>
            <textarea name="description" id="description" class="form-control" style="min-height:200px"></textarea>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h1> Seleção de autores </h1>
        <hr>
        <?php if ($authors == FALSE): ?>
          <tr><td colspan="2">Nenhum autor encontrado</td></tr>
        <?php else: ?>
          <?php $author_number = 0;?>
          <?php foreach ($authors as $row): ?>
            <?php if($author_number == 0): ?>
               <div class="col-md-12">
            <?php endif;?>
                <div class="col-md-3">
                  <div class="form-group">
                    <input type="checkbox" name="authors[]" value="<?php echo $row->AuthorID; ?>">
                    <?php echo $row->nameF;?>
                    <?php echo $row->nameL;?>
                  </div>
                </div>
                <?php $author_number++;?>
            <?php if($author_number == 4) : ?>
              </div>
              <?php $author_number = 0;?>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h1> Seleção de autores </h1>
        <hr>
        <?php if ($authors == FALSE): ?>
          <tr><td colspan="2">Nenhum autor encontrado</td></tr>
        <?php else: ?>
          <?php $category_number = 0;?>
          <?php foreach ($categories as $row): ?>
            <?php if($category_number == 0): ?>
               <div class="col-md-12">
            <?php endif;?>
                <div class="col-md-3">
                  <div class="form-group">
                    <input type="checkbox" name="categories[]" value="<?php echo $row->CategoryID; ?>">
                    <?php echo $row->CategoryName;?>
                  </div>
                </div>
                <?php $category_number++;?>
            <?php if($category_number == 4) : ?>
              </div>
              <?php $category_number = 0;?>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>

    <hr>
    <div class="row">
      <div class="col-md-12" style="margin-top:40px">
        <button type="submit" class="btn btn-primary" style="float:right;background:#128f76;width:20%">Enviar  </button>
      </div>
    </div>

  </form>
</div>
