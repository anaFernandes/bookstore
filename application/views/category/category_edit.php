<div class="container">
  <h2>Dados da Categoria</h2>
  <hr>
  <div class="row">
    <form action="<?php echo base_url('category/update/'.$category->CategoryID) ?>" method="post">
      <div class="col-md-12">
        <div class="col-md-8">
          <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="CategoryName" name="CategoryName" value="<?php echo $category->CategoryName ?>" placeholder="CategoryName">
          </div>
        </div>
      </div>
      <input type="hidden" name="CategoryID" value="<?=$category->CategoryID?>"/>
      <div class="col-md-12" style="text-align:right">
        <div class="col-md-12">
          <button type="submit" class="btn btn-default" style="background:#128f76">Salvar</button>
        </div>
      </div>
    </form>
  </div>
</div>
