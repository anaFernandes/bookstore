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
			<input type="text" name="nameF" value="<?=set_value('nameF')?>" required/>
		</div>

		<div>
			<label>Email:</label>
			<input type="text" name="nameL" value="<?=set_value('nameL')?>" required/>
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
					<th>Nome</th>
					<th>Sobrenome</th>
					<th>Operações</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($authors == FALSE): ?>
					<tr><td colspan="2">Nenhum contato encontrado</td></tr>
				<?php else: ?>
					<?php foreach ($authors as $row): ?>
						<tr>
							<td><?= $row['nameF'] ?></td>
							<td><?= $row['nameL'] ?></td>
							<td><a href="<?= $row['editar_url'] ?>">[Editar]</a> <a href="<?= $row['excluir_url'] ?>">[Excluir]</a></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>

</div>
