<div class="gestFruit">
	<button class="accordion">Gestionnaire des Fruits</button>
	<div class="table panel">
		<a href=" <?= site_url('Fruit/add/') ?>">Ajouter Produit</a>
		<table>
			<tr>
				<th> id </th>
				<th> nom </th>
				<th> description </th>
				<th> prix</th>
				<th> origine </th>
				<th> description</th>
				<th> image </th>
			</tr>

			<?php foreach ($fruits as $fruit) : ?>
			<tr>
				<td>
					<?= $fruit->id_fruit ?>
				</td>
				<td>
					<?= $fruit->nom ?>
				</td>
				<td>
					<?= $fruit->description ?>
				</td>
				<td>
					<?= $fruit->prix ?>
				</td>
				<td>
					<?= $fruit->origine ?>
				</td>
				<td>
					<?php
                    foreach ($fruit->category as $category) {
                        echo ($category->nom . '<br>');
                    }
                    ?>
				</td>

				<td>
					<img src="<?= base_url('img/fruit/' . $fruit->image) ?>" />
				</td>
				<td>
					<a href="<?= site_url('Fruit/modif/' . $fruit->id_fruit) ?>"> <img
							src="<?= base_url('img/pencil.png') ?>" /></a>
				</td>
				<td>
					<a href="<?= site_url('Fruit/delete/' . $fruit->id_fruit) ?>"> <img
							src="<?= base_url('img/poubelle.png')?>" alt="Poubelle"></a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>
