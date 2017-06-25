<div class="container">

  <div class="row">
    <div class="col-md-12" style="border-bottom: 1px solid #ccc; padding:20px">
      <div class="col-md-6">
        <h2 style="padding:none; margin:0px"><?php echo $h1 ?></h2>
      </div>
      <div class="col-md-6">
        <div class="col-md-12" style="padding-right: 0px!important; text-align:right">
          <a href="author/register" class="btn btn-success">Adicionar autores</a>
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
            <th>Sobrenome</th>
            <th></th>
          </thead>
          <tbody>
            <?php if(count($authors)): ?>
              <?php foreach ($authors as $key => $author): ?>
                <tr>
                  <td><?php echo $author->nameF ?></td>
                  <td><?php echo $author->nameL ?></td>
                  <td width="20%" style="text-align:right">
                    <a href="<?php echo base_url('author/edit/'.$author->AuthorID)?>" class="btn btn-info">Editar</a>
                    <a href="<?php echo base_url('author/del/'.$author->AuthorID)?>" class="btn btn-danger">Excluir</a>
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
