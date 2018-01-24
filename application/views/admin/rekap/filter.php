<div class="panel panel-default">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Kode</th>
					<th>Puskesmas</th>
					<th>Alamat</th>
					<th>Bulan</th>
					<th>Tahun</th>
					<th>View</th>
				</tr>
			</thead>
			<tbody>
				<?php $pkms = $this->dataload->datafilter() ?>
				<?php $bln = array('1'=>'Januari','2'=>'Februari', '3'=>'Maret', '4'=>'April', '5'=>'Mei', '6'=>'Juni','7'=>'Juli','8'=>'Agustus','9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember') ?>
				<?php foreach($pkms as $rowPkms): ?>
					<tr>
						<td><?= $rowPkms->kode_pkms ?></td>
						<td><?= $rowPkms->nm_pkms ?></td>
						<td><?= $rowPkms->almt_pkms ?></td>
						<td><?= $bln[$rowPkms->bln] ?></td>
						<td><?= $rowPkms->thn ?></td>
						<td><a href="<?=base_url()?>admin/rekap/page/viewdata?&pkms=<?= $rowPkms->id_pkms ?>&bln=<?= $rowPkms->bln ?>&thn=<?= $rowPkms->thn ?>" class="btn btn-primary btn-sm">View</a></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<script>
	$(document).ready(function()
	{
		$('table').DataTable();
	})
</script>