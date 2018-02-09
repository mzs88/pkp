
<?php $query = $this->Dataload->cekNilaiMutu($id, $pkms, $bln); ?>
<?php if ($query->num_rows()>0):?>
<?php $ukka = $this->Dataload->mdl_varmutu($id,$pkms,$bln); $noa=1;?>
<?php foreach($ukka as $row):?>
  <tr>
    <td><?= $noa++; ?></td>
    <td><?= $row->variable ?></td>
    <td><?= $row->operasional ?></td>
    <td><?= $row->penghitungan ?></td>
    <td class="text-center"><?= $row->op.$row->target ?> %</td>
    <input type="hidden" name="idMtNilai[]" id="idMtNilai" value="<?= $row->idmt_rekap?>">
    <input type="hidden" name="idMtVar[]" id="idMtVar" value="<?= $row->idmt_op_htng ?>">
    <td><input type="text" class="form-control" name="total[]" id="total" value="<?= $row->total ?>"></td>
    <td><input type="text" class="form-control" name="cpaian[]" id="cpaian" value="<?= $row->capaian ?>"></td>
    <td><input type="text" class="form-control" name="mtuCpain[]" id="mtuCpain" value="<?= $row->cp_persen ?>" readonly></td>
    <td><textarea name="analisa[]" id="analisa" rows="1" class="form-control"><?= $row->analisa ?></textarea></td>
    <td><textarea name="tndkLnjt[]" id="tndkLnjt" rows="1" class="form-control"><?= $row->tndk_lnjt ?></textarea></td>
  </tr>
<?php endforeach ?>
<?php else: ?>
<?php $getvar = $this->Dataload->getVar($id); $noa=1;?>
<?php foreach($getvar as $rowVar):?>
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
    <td><input type="text" class="form-control" name="mtuCpain[]" id="mtuCpain" value="0" readonly></td>
    <td><textarea name="analisa[]" id="analisa" rowVars="1" class="form-control" value="0"></textarea></td>
    <td><textarea name="tndkLnjt[]" id="tndkLnjt" rowVars="1" class="form-control" value="0"></textarea></td>
  </tr>
<?php endforeach ?>
<?php endif ?>

