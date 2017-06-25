<div class="container">
  <div class="row">
    <div class="col-md-12" style="border-bottom: 1px solid #ccc; padding:20px">
      <div class="col-md-6">
        <h2 style="padding:none; margin:0px"><?php echo $h1 ?></h2>
      </div>
      <div class="col-md-6">
        <div class="col-md-12" style="padding-right: 0px!important; text-align:right">
          <a href="category/register" class="btn btn-success">Adicionar categorias</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container" style="margin-top:40px">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped">
          <thead>
            <th>Nome</th>
            <th></th>
          </thead>
          <tbody>
            <?php if(count($categories)): ?>
              <?php foreach ($categories as $key => $category): ?>
                <tr>
                  <td><?php echo $category->CategoryName ?></td>
                  <td width="20%" style="text-align:right">
                    <a href="<?php echo base_url('category/edit/'.$category->CategoryID)?>" class="btn btn-info">Editar</a>
                    <a href="<?php echo base_url('category/del/'.$category->CategoryID)?>" class="btn btn-danger">Excluir</a>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- <div class="container">

  <h2>Listar Categorias</h2>

  <a href="category/register" class="btn btn-success">Adicionar Categorias</a>
  <table class="table table-striped">
    <thead>
      <th>Nome</th>
      <th>Editar</th>
      <th>Excluir</th>
    </thead>
    <tbody>
      <?php if(count($categories)): ?>
        <?php foreach ($categories as $key => $category): ?>
          <tr>
            <td><?php echo $category->CategoryName ?></td>
            <td><a href="<?php echo base_url('category/edit/'.$category->CategoryID)?>" class="btn btn-info">Editar</a></td>
            <td><a href="<?php echo base_url('category/del/'.$category->CategoryID)?>" class="btn btn-danger">Excluir</a></td>
          </tr>
        <?php endforeach ?>
      <?php endif ?>
    </tbody>
  </table>
</div> -->
