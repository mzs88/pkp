<?php $no =1; ?>
<?php if($checkVarNi->num_rows()>0): ?>
	<?php foreach($getVarNi as $rowVal ): ?>
		<tr>
			<td><?= $no ++; ?></td>
			<td><?= $rowVal->mnj_var ?></td>
			<td><?= $rowVal->mnj_do ?></td>
			<td><?= $rowVal->nilai_0 ?></td>
			<td><?= $rowVal->nilai_4 ?></td>
			<td><?= $rowVal->nilai_7 ?></td>
			<td><?= $rowVal->nilai_10 ?></td>
			<input type="hidden" name="idnilai[]" id="idnilai" value="<?= $rowVal->idmanaj_penilaian ?>" >
			<input type="hidden" name="idvar[]" id="idvar" value="<?= $rowVal->id_manajvar ?>">
			<td><input class="form-control text-center" type="text" id="nilai" name="nilai[]" value="<?= $rowVal->hasil ?>"></td>
		</tr>
	<?php endforeach ?>
<?php else: ?>
	<?php foreach($getVar as $rowVar ): ?>
		<tr>
			<td><?= $no ++; ?></td>
			<td><?= $rowVar->mnj_var ?></td>
			<td><?= $rowVar->mnj_do ?></td>
			<td><?= $rowVar->nilai_0 ?></td>
			<td><?= $rowVar->nilai_4 ?></td>
			<td><?= $rowVar->nilai_7 ?></td>
			<td><?= $rowVar->nilai_10 ?></td>
			<input type="hidden" name="idnilai[]" id="idnilai" value="" >
			<input type="hidden" name="idvar[]" id="idvar" value="<?= $rowVar->id_manajvar ?>">
			<td><input class="form-control text-center" type="text" id="nilai" name="nilai[]" value="<?= 0 ?>"></td>
		</tr>
	<?php endforeach ?>
<?php endif ?>

<script>
	$("input[name='nilai[]']").on('focus', function(e)
	{
	  $(this)
	    .one('mouseup', function ()
	    {
	      $(this).select();
	      return false;
	    })
	    .select();
	});
</script>