<div>
<div>
  <h1>Criando um CRUD com CodeIgniter</h1>
</div>
<?php if ($this->session->flashdata('error') == TRUE): ?>
  <p><?php echo $this->session->flashdata('error'); ?></p>
<?php endif; ?>
<?php if ($this->session->flashdata('success') == TRUE): ?>
  <p><?php echo $this->session->flashdata('success'); ?></p>
<?php endif; ?>

<form method="post" action="<?=base_url('salvar')?>" enctype="multipart/form-data">
  <div>
    <label>Nome:</label>
    <input type="text" name="CategoryName" value="<?=set_value('CategoryName')?>" required/>
  </div>
  <div>
    <label><em>Todos os campos são obrigatórios.</em></label>
    <input type="submit" value="Salvar"/>
  </div>
</form>
<div>
  <table>
    <caption>Contatos</caption>
    <thead>
      <tr>
        <th>Nome da Categoria</th>
        <th>Operações</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($categories == FALSE): ?>
        <tr><td colspan="2">Nenhuma categoria encontrada</td></tr>
      <?php else: ?>
        <?php foreach ($categories as $row): ?>
          <tr>
            <td><?= $row['CategoryName'] ?></td>
            <td><a href="<?= $row['editar_url'] ?>">[Editar]</a> <a href="<?= $row['excluir_url'] ?>">[Excluir]</a></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</div>
