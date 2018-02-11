<?php
	$no = 1;
	$cpain = 0;
	$sumMutu = 0;

?>
<?php foreach($ktgMutu as $rowDt): ?>
	<?php
		$var = $this->m_data_mutu->loadDataMutu($rowDt->idmt_ktg, $idpkms, $bln, $thn)->result();
		foreach ($var as $rwv)
		{
			$cpain = $rwv->total / $rwv->capaian * 100;
			$sumMutu += $cpain;
		}
	?>
<tr class="bg-success">
	<td><strong><?= $no++; ?></strong></td>
	<td colspan="6"><strong><?= $rowDt->mtktg ?></strong></td>
	<td class="text-center"><strong><?= round($sumMutu,2) ?></strong></td>
	<td colspan="11"></td>
</tr>
	<?php $sumMutu = 0; ?>
	<?php $var = $this->m_data_mutu->loadDataMutu($rowDt->idmt_ktg, $idpkms, $bln, $thn)->result() ?>
	<?php foreach($var as $rowVar): ?>
	<tr>
		<td></td>
		<td><?= $rowVar->variable ?></td>
		<td><?= $rowVar->operasional ?></td>
		<td><?= $rowVar->penghitungan ?></td>
		<td><?= $rowVar->target ?>%</td>
		<td class="text-center"><?= $rowVar->total ?></td>
		<td class="text-center"><?= $rowVar->capaian ?></td>
		<?php
			$cpain = $rowVar->total / $rowVar->capaian * 100;
			$sumMutu += $cpain;
		?>
		<td class="text-center"><?= round($cpain,2)?></td>
		<td><?= $rowVar->analisa ?></td>
		<td><?= $rowVar->tndk_lnjt ?></td>
		<td><?= $rowVar->comments ?></td>
		<td><?= $rowVar->rev_date ?></td>
		<!-- <td><button class="btn btn-sm btn-primary">Action</button></td> -->
	</tr>
	<?php endforeach ?>
	<tr>
		<td colspan="13"></td>
	</tr>
	<?php $sumMutu = 0; ?>
<?php endforeach ?>