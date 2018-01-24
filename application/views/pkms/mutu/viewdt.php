<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th rowspan="2" class="text-center">No</th>
			<th rowspan="2" class="text-center">Jenis Variable</th>
			<th rowspan="2" class="text-center">Definisi Operasional</th>
			<th rowspan="2" class="text-center">Cara Penghitungan</th>
			<th rowspan="2" class="text-center">Target</th>
			<th rowspan="2" class="text-center">Total</th>
			<th rowspan="2" class="text-center">Capian</th>
			<th rowspan="2" class="text-center">% Capaian</th>
			<th rowspan="2" class="text-center">Analisa</th>
			<th rowspan="2" class="text-center">Rencana Tindak Lanjut</th>
			<th colspan="2" class="text-center">Refisi</th>
			<th rowspan="2" class="text-center">Action</th>
		</tr>

		<tr>
			<th class="text-center">Catatan</th>
			<th class="text-center">Tgl Rev</th>
		</tr>
	</thead>
	<tbody>
		<?php $query = $this->Dataload->ktgRekap($idpkms, $bln, $thn); $no=0; ?>
		<?php foreach($query as $rowDt): $no++; ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $rowDt->mtktg ?></td>
			<td colspan="5"></td>
			<td><?= $rowDt->total_var ?></td>
			<td colspan="5"></td>
		</tr>
			<?php $var = $this->Dataload->varRekap($rowDt->idmt_ktg, $idpkms, $bln, $thn) ?>
			<?php foreach($var as $rowVar): ?>
			<tr>
				<td></td>
				<td><?= $rowVar->variable ?></td>
				<td><?= $rowVar->operasional ?></td>
				<td><?= $rowVar->penghitungan ?></td>
				<td><?= $rowVar->target ?>%</td>
				<td><?= $rowVar->total ?></td>
				<td><?= $rowVar->capaian ?></td>
				<td><?= $rowVar->cp_persen ?></td>
				<td><?= $rowVar->analisa ?></td>
				<td><?= $rowVar->tndk_lnjt ?></td>
				<td><?= $rowVar->comments ?></td>
				<td><?= $rowVar->rev_date ?></td>
				<td><button class="btn btn-sm btn-primary">Action</button></td>
			</tr>
			<?php endforeach ?>
		<?php endforeach ?>
	</tbody>
</table>