<div class="panel panel-default">
	<div class="panel-body">
		<table id="tb_pkms" class="table table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Email</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach($dbop as $row) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $row->nama ?></td>
				<td><?= $row->uname ?></td>
				<td><?= $row->email ?></td>
				<td><?= ($row->sts == 0) ? 'admin' : 'user' ?></td>
				<td>
					<a href="<?=base_url()?>index.php/ctrl_user/ct_edit/<?= $row->idoperator ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
					<a href="<?=base_url()?>index.php/ctrl_user/ct_delete/<?= $row->idoperator
					 ?>" onClick="return confirm('Yakin anda akan menghapus data ini ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
					 <a href="<?=base_url()?>index.php/ctrl_user/ct_reset/<?= $row->idoperator
					 ?>" onClick="return confirm('Yakin anda akan mereset password ?')" class="btn btn-sm btn-info"><i class="fa  fa-repeat"></i></a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	</div>
	
	<div class="panel-footer">
		<a href="<?=base_url()?>index.php/ctrl_user/ct_add" class="btn btn-primary">Tambah</a>
	</div>
</div>

<script>
  $('#tb_pkms').DataTable();
</script>

