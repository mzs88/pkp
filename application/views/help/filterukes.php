<?php foreach($getFilter as $rowFilter): ?>
	<tr>
		<tr>
		<td><?= monthToName($rowFilter->bln) ?></td>
		<td><?= $rowFilter->thn ?></td>
		<td>
			<button type="button" class="btn btn-success" onclick="viewData('<?= $rowFilter->bln?>','<?= $rowFilter->thn ?>')"><i class="glyphicon glyphicon-stats"></i></button>
		</td>
	</tr>
	</tr>
<?php endforeach ?>