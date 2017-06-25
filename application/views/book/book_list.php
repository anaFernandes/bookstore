<div class="container">

  <h2>Listar Disciplinas</h2>

  <a href="book/register" class="btn btn-success">Adicionar disciplina</a>
  <table class="table table-striped">
    <thead>
      <th>Sigla</th>
      <th>Nome</th>
      <th>Editar</th>
      <th>Excluir</th>
    </thead>
    <tbody>
      <?php if(count($books)): ?>
        <?php foreach ($books as $key => $book): ?>
          <tr>
            <td><?php echo $book->ISBN ?></td>
            <td><?php echo $book->title ?></td>
            <td><?php echo $book->description ?></td>
            <td><?php echo $book->price ?></td>
            <td><?php echo $book->publisher ?></td>
            <td><?php echo $book->pubdate ?></td>
            <td><?php echo $book->edition ?></td>
            <td><?php echo $book->pages ?></td>
            <td><a href="<?php echo base_url('book/edit/'.$book->ISBN)?>" class="btn btn-info">Editar</a></td>
            <td><a href="<?php echo base_url('book/del/'.$book->ISBN)?>" class="btn btn-danger">Excluir</a></td>
          </tr>
        <?php endforeach ?>
      <?php endif ?>
    </tbody>
  </table>
</div>
