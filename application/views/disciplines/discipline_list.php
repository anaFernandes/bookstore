<div class="container">

  <h2>Listar Disciplinas</h2>

  <a href="discipline/register" class="btn btn-success">Adicionar disciplina</a>
  <table class="table table-striped">
    <thead>
      <th>Sigla</th>
      <th>Nome</th>
      <th>Editar</th>
      <th>Excluir</th>
    </thead>
    <tbody>
      <?php if(count($disciplines)): ?>
        <?php foreach ($disciplines as $key => $discipline): ?>
          <tr>
            <td><?php echo $discipline->sigla ?></td>
            <td><?php echo $discipline->name ?></td>
            <td><a href="<?php echo base_url('discipline/edit/'.$discipline->idDiscipline)?>" class="btn btn-info">Editar</a></td>
            <td><a href="<?php echo base_url('discipline/del/'.$discipline->idDiscipline)?>" class="btn btn-danger">Excluir</a></td>
          </tr>
        <?php endforeach ?>
      <?php endif ?>
    </tbody>
  </table>
</div>
