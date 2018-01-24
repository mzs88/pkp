<div class="panel panel-primary">
	<div class="panel-body" id="a">
		<table id="tb_tth" class="table table-striped">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Kode</th>
						<th class="text-center">Puskesmas</th>
						<th class="text-center">Alamat</th>
            <th class="text-center">Kepala</th>
						<th class="text-center">Tahun</th>
						<th class="text-center">Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach($listmutu as $rows): ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $rows->kode_pkms ?></td>
						<td><?= $rows->nm_pkms ?></td>
						<td><?= $rows->almt_pkms ?></td>
            <td><?= $rows->kepala_pkms ?></td>
						<td class="text-center"><?= $rows->tahun ?></td>
						<td class="text-center">
							<a href="<?=base_url()?>admin/mutu/page/viewdata?pkms=<?= $rows->id_pkms ?>" class="btn btn-sm btn-info"><i class="fa fa-external-link"></i></a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
    </table>
	</div>
</div>

<script>
  $('#tb_tth').DataTable();
</script>
