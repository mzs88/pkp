
<?php $noa=1; if ($chekData->num_rows()>0):?>
<?php foreach($getVarNiEv as $rowVal):?>
  <tr>
    <td><?= $noa++; ?></td>
    <td><?= $rowVal->variable ?></td>
    <td><?= $rowVal->operasional ?></td>
    <td><?= $rowVal->penghitungan ?></td>
    <td class="text-center"><?= $rowVal->op.$rowVal->target ?> %</td>
    <input type="hidden" name="idMtNilai[]" id="idMtNilai" value="<?= $rowVal->idmt_rekap?>">
    <input type="hidden" name="idMtVar[]" id="idMtVar" value="<?= $rowVal->idmt_op_htng ?>">
    <td><input type="text" class="form-control" name="total[]" id="total" value="<?= $rowVal->total ?>"></td>
    <td><input type="text" class="form-control" name="cpaian[]" id="cpaian" value="<?= $rowVal->capaian ?>"></td>
    <td><textarea name="analisa[]" id="analisa" rows="1" class="form-control"><?= $rowVal->analisa ?></textarea></td>
    <td><textarea name="tndkLnjt[]" id="tndkLnjt" rows="1" class="form-control"><?= $rowVal->tndk_lnjt ?></textarea></td>
  </tr>
<?php endforeach ?>
<?php else: ?>
<?php foreach($getVar as $rowVar):?>
  <tr>
    <td><?= $noa++; ?></td>
    <td><?= $rowVar->variable ?></td>
    <td><?= $rowVar->operasional ?></td>
    <td><?= $rowVar->penghitungan ?></td>
    <td class="hidden-center"><?= $rowVar->op.$rowVar->target ?> %</td>
    <input type="hidden" name="idMtNilai[]" id="idMtNilai">
    <input type="hidden" name="idMtVar[]" id="idMtVar" value="<?= $rowVar->idmt_op_htng ?>">
    <td><input type="text" class="form-control" name="total[]" id="total" value="0"></td>
    <td><input type="text" class="form-control" name="cpaian[]" id="cpaian" value="0"></td>
    <td><textarea name="analisa[]" id="analisa" rowVars="1" class="form-control" value="0"></textarea></td>
    <td><textarea name="tndkLnjt[]" id="tndkLnjt" rowVars="1" class="form-control" value="0"></textarea></td>
  </tr>
<?php endforeach ?>
<?php endif ?>


<script>
	$(document).ready(function()
	{
		$("input[name='total[]'").on("click, focus",function()
		{
			$(this).select();
		});

		$("input[name='cpaian[]'").on("click, focus",function()
		{
			$(this).select();
		});

		$("textarea").on("click, focus",function()
		{
			$(this).select();
		});
	})
</script>

