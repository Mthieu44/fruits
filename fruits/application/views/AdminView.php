<div class="gestFruit">
	<button class="accordion">Gestionnaire des Users</button>
	<div class="table panel">
		<a href=" <?= site_url('User/add/') ?>">Ajouter User</a>
		<table>
			<tr>
				<th> id </th>
				<th> nom </th>
				<th> prenom </th>
				<th> adresse </th>
				<th> mail </th>
				<th> telephone </th>
				<th> sexe </th>
				<th> mdp </th>
				<th> status </th>
			</tr>

			<?php foreach ($users as $user) : ?>
			<tr>
				<td>
					<?= $user->id_user ?>
				</td>
				<td>
					<?= $user->nom ?>
				</td>
				<td>
					<?= $user->prenom ?>
				</td>
				<td>
					<?= $user->adresse ?>
				</td>
				<td>
					<?= $user->mail ?>
				</td>
				<td>
					<?= $user->telephone ?>
				</td>
				<td>
					<?= $user->sexe ?>
				</td>
				<td>
					<p>*****</p>
				</td>
				<td>
					<?= $user->status ?>
				</td>
				<td>
					<a href="<?= site_url('User/modif/' . $user->id_user) ?>"> <img
							src="<?= base_url('img/pencil.png') ?>" /></a>
				</td>
				<td>
					<a href="<?= site_url('User/delete/' . $user->id_user) ?>"> <img
							src="<?= base_url('img/poubelle.png') ?>" /></a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>
