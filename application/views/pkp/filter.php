
<div class="row">
	
	<div class="panel panel-default">
		<div class="panel-body">
			 
			<table id="tb_pkms" class="table table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Puskesmas</th>
					<th>Kepala</th>
					<th>Alamat</th>
					<th>Telepon</th>
					<th>Pelayanan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach($pkmsa->result() as $row) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row->kode?></td>
					<td><?= $row->puskesmas?></td>
					<td><?= $row->kep_puskesmas?></td>
					<td><?= $row->alamat?></td>
					<td><?= $row->telpon?></td>
					<td><?= $row->pelayanan?></td>
					<td>
						<a href="<?=base_url()?>index.php/ctrl_pkp/dt_pkp/<?= $row->id_pkms ?>/<?= $row->puskesmas ?>" class="btn btn-sm btn-info"><i class="fa  fa-eye"></i></a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
			 
		</div>
	</div>
	
</div>





