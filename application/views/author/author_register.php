<div class="container">
  <h2>Dados do autor</h2>
  <hr>
  <div class="row">
    <form action="<?php echo base_url('author/save') ?>" method="post">
      <div class="col-md-12">
        <div class="col-md-8">
          <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nameF" name="nameF" placeholder="nome">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="nome">Sobrenome</label>
            <input type="text" class="form-control" id="nameL" name="nameL" placeholder="sobrenome">
          </div>
        </div>
      </div>
      <div class="col-md-12" style="text-align:right">
        <div class="col-md-12">
          <button type="submit" class="btn btn-default" style="background:#128f76">Salvar</button>
        </div>
      </div>
    </form>
  </div>
</div>
