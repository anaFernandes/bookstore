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
				<?php if ($books == FALSE): ?>
					<tr><td colspan="2">Nenhum contato encontrado</td></tr>
				<?php else: ?>
					<?php foreach ($books as $row): ?>
						<tr>
							<td><?= $row['ISBN'] ?></td>
							<td><?= $row['title'] ?></td>
              <td><?= $row['description'] ?></td>
							<td><?= $row['price'] ?></td>
              <td><?= $row['publisher'] ?></td>
							<td><?= $row['pubdate'] ?></td>
              <td><?= $row['edition'] ?></td>
							<td><?= $row['pages'] ?></td>
							<td><a href="<?= $row['editar_url'] ?>">[Editar]</a> <a href="<?= $row['excluir_url'] ?>">[Excluir]</a></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>

</div>
