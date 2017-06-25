<div>
	<h1>Criando um CRUD com CodeIgniter</h1>
</div>
<?php if ($this->session->flashdata('error') == TRUE): ?>
	<p><?php echo $this->session->flashdata('error'); ?></p>
<?php endif; ?>
<?php if ($this->session->flashdata('success') == TRUE): ?>
	<p><?php echo $this->session->flashdata('success'); ?></p>
<?php endif; ?>

<form method="post" action="<?=base_url('atualizar')?>" enctype="multipart/form-data">
		<div>
			<label>Nome:</label>
			<input type="text" name="CategoryName" value="<?=$category['CategoryName']?>" required/>
		</div>
	<div>
		<label><em>Todos os campos são obrigatórios.</em></label>
		<input type="hidden" name="CategoryID" value="<?=$category['CategoryID']?>"/>
		<input type="submit" value="Salvar" />
	</div>
</form>
