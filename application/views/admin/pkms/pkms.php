<div class="panel panel-default">
	<div class="panel-body">
		<table id="tb_pkms" class="table table-hover">
		<thead>
			<tr>
				<th rowspan="2">No</th>
				<th rowspan="2">Kode</th>
				<th rowspan="2">Nama</th>

				<th rowspan="2">Kepala</th>
				<th rowspan="2">Alamat</th>
				<th colspan="2">Kordinat</th>
				<th rowspan="2">Telepon</th>
				<th rowspan="2">Pelayanan</th>
				<th rowspan="2">Aksi</th>
			</tr>
			<tr>
				<th>Long</th>
				<th>Lat</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach($db_pkms as $row) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $row->kode_pkms?></td>
				<td><?= $row->nm_pkms?></td>
				<td><?= $row->kepala_pkms?></td>
				<td><?= $row->almt_pkms?></td>
				<td><?= $row->long ?></td>
				<td><?= $row->lat ?></td>
				<td><?= $row->phone_pkms?></td>
				<td><?= $row->jenis?></td>
				<td>
					<a href="<?=base_url()?>admin/pkms/page/editpkms/<?= $row->id_pkms ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
					<a href="<?=base_url()?>index.php/ctrl_pkms/ct_reset/<?= $row->id_pkms ?>" onClick="return confirm('Yakin akan mereset password ?')" class="btn btn-sm btn-info"><i class="fa fa-refresh"></i></a>
					<a href="<?=base_url()?>index.php/ctrl_pkms/ct_delete/<?= $row->id_pkms ?>" onClick="return confirm('Yakin anda akan menghapus data ini ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	</div>

	<div class="panel-footer">
		<a href="<?=base_url()?>admin/pkms/page/addpkms" class="btn btn-primary">Tambah</a>
	</div>
</div>

<script>
  $('#tb_pkms').DataTable();
</script>
