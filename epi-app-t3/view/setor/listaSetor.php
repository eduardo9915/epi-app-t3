<?php




?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Lista de Setores</title>	
</head>
<body>
	<h2>Lista de Setores</h2>

	<?php if (empty($setores)): ?>
		<p>Nenhum setor cadastrado.</p>
	<?php else: ?>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome do Setor</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($setores as $setor): ?>
					<tr>
						<td><?php echo htmlspecialchars($setor->getId()); ?></td>
						<td><?php echo htmlspecialchars($setor->getNome()); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>

</body>
</html>

