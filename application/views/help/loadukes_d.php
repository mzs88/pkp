<?php if ($checkData->num_rows()>0): ?>
  <?php foreach($loadNilai as $rowD): ?>
    <tr>
      <td><?= $rowD->ukes_d ?></td>
      <td><?= $rowD->op.$rowD->nilai ?>%</td>
      <input type="hidden" name="idssrn[]" id="idssrn" value="<?= $rowD->id_sasaran?>">
      <input type="hidden" name="idukes[]" id="idukes" value="<?= $rowD->idukes_d?>">
      <input type="hidden" name="pkms[]" id="pkms" value="<?= $this->session->userdata('idpkms'); ?>">
      <input type="hidden" name="idnilai[]" id="idnilai" value="<?= $rowD->idnilai_pkp ?>">
      <td><?= $rowD->sasaran ?></td>
      <input type="hidden" id="tth" value="<?= $rowD->nilai ?>">
      <td class="text-center"><input name="total[]" type="text" class="form-control text-center" id="total" value="<?= $rowD->total ?>"></td>
      <td class="text-center"><input name="target[]" type="text" class="form-control text-center" id="target" readonly="true" value="<?= $rowD->target ?>"></td>
      <td class="text-center"><input name="pncp[]" type="text" class="form-control text-center" id="pncp" value="<?= $rowD->pencapaian ?>"></td>
      <!-- <td class="text-center"><input name="riil[]" type="text" class="form-control text-center" id="riil" readonly="true"  value="<?= $rowD->riil ?>"></td> -->
      <td><textarea  rows="1" class="form-control" name="analisis[]" id="analisis"><?= $rowD->analisa ?></textarea></td>
      <td><textarea  rows="1" class="form-control" name="tndklnjt[]" id="tndklnjt"><?= $rowD->tindak_lanjut ?></textarea></td>
    </tr>
  <?php endforeach ?>
<?php else : ?>
  <?php  foreach ($ukesD as $rowD): ?>
    <tr>
      <td><?= $rowD->ukes_d ?></td>
      <td class="text-center"><?= $rowD->nilai ?></td>
      <td><?= $rowD->sasaran ?></td>
      <input type="hidden" name="idssrn[]" id="idssrn" value="<?= $rowD->id_sasaran?>">
      <input type="hidden" name="idukes[]" id="idukes" value="<?= $rowD->idukes_d?>">
      <input type="hidden" name="idnilai[]" id="idnilai" value="0">
      <input type="hidden" id="tth" value="<?= $rowD->nilai ?>">
      <td class="text-center"><input name="total[]" type="text" class="form-control text-center" id="total" value="0.00"></td>
      <td class="text-center"><input name="target[]" type="text" class="form-control text-center" id="target" readonly="true" value="0.00"></td>
      <td class="text-center"><input name="pncp[]" type="text" class="form-control text-center" id="pncp" value="0.00"></td>
      <!-- <td class="text-center"><input name="riil[]" type="text" class="form-control text-center" id="riil" readonly="true" value="0.00"></td> -->
      <td><textarea rows="1" class="form-control" name="analisis[]" id="analisis"></textarea></td>
      <td><textarea rows="1" class="form-control" name="tndklnjt[]" id="tndklnjt">  </textarea></td>
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

    $("input[name='pncp[]'").on("click, focus",function()
    {
      $(this).select();
    });

    $("textarea").on("click, focus",function()
    {
      $(this).select();
    });
  })
</script>