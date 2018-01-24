<table class="table table-hover table-stripe">
	<thead>
		<th>Upaya Kesehatan dan Program</th>
		<th>%  Cakupan Sub Variabel Program</th>
		<th>Bobot Upaya Kesehatan dan Program</th>
		<th>Nilai  Program </th>
		<th>Rata2 nilai Upaya</th>
	</thead>
	<tbody>
		<?php $ukesA = $this->loadukes->ukesRkpA($idpkms, $date) ?>
		<?php foreach($ukesA as $rowA): ?>
			<tr class="">
				<td><strong><?= $rowA->ukes_a ?></strong></td>
				<td></td>
				<td><strong><?= $rowA->bobot ?></strong></td>
			</tr>
			<?php $ukesB = $this->loadukes->ukesRkpB($rowA->idukes_a, $idpkms, $date) ?>
		<?php foreach($ukesB as $rowB): ?>
			<tr>
				<td><?= $rowB->ukes_b ?></td>
				<td><?= $rowB->nilai ?></td>
				<td><?= $rowB->bobot ?></td>
				<td><?= $rowB->program ?></td>
			</tr>
		<?php endforeach ?>
		<?php endforeach ?>
	</tbody>
</table>