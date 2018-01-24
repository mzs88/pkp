<?php $cekDt = $this->Dataload->CekData($id,$pkms,$date); $no=1; ?>
<?php if($cekDt->num_rows()>0): ?>
	<?php $dtValue = $this->Dataload->DataVar($id,$pkms,$date) ?>
	<?php foreach($dtValue as $rowVal ): ?>
		<tr>
			<td><?= $no ++; ?></td>
			<td><?= $rowVal->mnj_var ?></td>
			<td><?= $rowVal->mnj_do ?></td>
			<td><?= $rowVal->nilai_0 ?></td>
			<td><?= $rowVal->nilai_4 ?></td>
			<td><?= $rowVal->nilai_7 ?></td>
			<td><?= $rowVal->nilai_10 ?></td>
			<input type="hidden" name="idnilai[]" id="idnilai" value="<?= $rowVal->idmnj_nilai ?>" >
			<input type="hidden" name="idvar[]" id="idvar" value="<?= $rowVal->id_manajvar ?>">
			<input type="hidden" name="pkms[]" value="<?= $this->session->userdata('idpkms') ?>" >
			<td><input class="form-control text-center" type="text" id="nilai" name="nilai[]" value="<?= $rowVal->hasil ?>"></td>
		</tr>
	<?php endforeach ?>
<?php else: ?>
	<?php $dtVar = $this->Dataload->GetVar($id) ?>
	<?php foreach($dtVar as $rowVar ): ?>
		<tr>
			<td><?= $no ++; ?></td>
			<td><?= $rowVar->mnj_var ?></td>
			<td><?= $rowVar->mnj_do ?></td>
			<td><?= $rowVar->nilai_0 ?></td>
			<td><?= $rowVar->nilai_4 ?></td>
			<td><?= $rowVar->nilai_7 ?></td>
			<td><?= $rowVar->nilai_10 ?></td>
			<input type="hidden" name="idnilai[]" id="idnilai" value="0" >
			<input type="hidden" name="idvar[]" id="idvar" value="<?= $rowVar->id_manajvar ?>">
			<input type="hidden" name="pkms[]" value="<?= $this->session->userdata('idpkms') ?>" >
			<td><input class="form-control text-center" type="text" id="nilai" name="nilai[]" value="<?= 0 ?>"></td>
		</tr>
	<?php endforeach ?>
<?php endif ?>