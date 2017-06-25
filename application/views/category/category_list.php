<div class="container">

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
</div>
