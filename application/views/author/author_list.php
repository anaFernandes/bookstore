<div class="container">

  <h2>Listar Autores</h2>

  <a href="author/register" class="btn btn-success">Adicionar autores</a>
  <table class="table table-striped">
    <thead>
      <th>Nome</th>
      <th>Sobrenome</th>
      <th>Editar</th>
      <th>Excluir</th>
    </thead>
    <tbody>
      <?php if(count($authors)): ?>
        <?php foreach ($authors as $key => $author): ?>
          <tr>
            <td><?php echo $author->nameL ?></td>
            <td><?php echo $author->nameF ?></td>
            <td><a href="<?php echo base_url('author/edit/'.$author->AuthorID)?>" class="btn btn-info">Editar</a></td>
            <td><a href="<?php echo base_url('author/del/'.$author->AuthorID)?>" class="btn btn-danger">Excluir</a></td>
          </tr>
        <?php endforeach ?>
      <?php endif ?>
    </tbody>
  </table>
</div>
