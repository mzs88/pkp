<?php
	$cpain = 0;
	$sumMutu = 0;
?>
<?php foreach($ktgMutu as $rowDt): $no=0; $no++; ?>
<tr class="bg-success">
	<td><?= $no; ?></td>
	<td><?= $rowDt->mtktg ?></td>
	<td colspan="11"></td>
</tr>
	<?php $var = $this->m_data_mutu->loadDataMutu($rowDt->idmt_ktg, $idpkms, $bln, $thn)->result() ?>
	<?php foreach($var as $rowVar): ?>
	<tr>
		<td></td>
		<td><?= $rowVar->variable ?></td>
		<td><?= $rowVar->operasional ?></td>
		<td><?= $rowVar->penghitungan ?></td>
		<td><?= $rowVar->target ?>%</td>
		<td><?= $rowVar->total ?></td>
		<td><?= $rowVar->capaian ?></td>
		<?php
			$cpain = $rowVar->total / $rowVar->capaian * 100;
			$sumMutu += $cpain;
		?>
		<td><?= round($cpain,2)?></td>
		<td><?= $rowVar->analisa ?></td>
		<td><?= $rowVar->tndk_lnjt ?></td>
		<td><?= $rowVar->comments ?></td>
		<td><?= $rowVar->rev_date ?></td>
		<!-- <td><button class="btn btn-sm btn-primary">Action</button></td> -->
	</tr>
	<?php endforeach ?>
	<tr bgcolor="#E6E6E6">
		<td colspan="7"><strong><?= $rowDt->mtktg ?></strong></td>
		<td colspan=""><strong><?= round($sumMutu,2) ?></strong></td>
		<td colspan="5"></td>
		<?php $sumMutu = 0; ?>
	</tr>
	<tr>
		<td colspan="13"></td>
	</tr>
<?php endforeach ?>