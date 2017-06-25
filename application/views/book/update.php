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

			<label>ISBN:</label>
			<input type="text" name="ISBN" value="<?=$book['ISBN']?>" required/>
		</div>
		<div>
			<label>Título:</label>
			<input type="text" name="title" value="<?=$book['title']?>" required/>
		</div>
		<div>
			<label>Descrição:</label>
			<input type="text" name="description" value="<?=$book['description']?>" required/>
		</div>
		<div>
			<label>Preço:</label>
			<input type="text" name="price" value="<?=$book['price']?>" required/>
		</div>
		<div>
			<label>Editora:</label>
			<input type="text" name="publisher" value="<?=$book['publisher']?>" required/>
		</div>
		<div>
			<label>Editora:</label>
			<input type="text" name="edition" value="<?=$book['edition']?>" required/>
		</div>
		<div>
			<label>Número de Páginas:</label>
			<input type="text" name="pages" value="<?=$book['pages']?>" required/>
		</div>
		<label><em>Todos os campos são obrigatórios.</em></label>
		<!-- <input type="hidden" name="IBN" value="<?=$book['AuthorID']?>"/> -->
		<input type="submit" value="Salvar" />
	</div>
</form>
