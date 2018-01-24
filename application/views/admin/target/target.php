<div class="panel panel-primary">
	<div class="panel-body" id="a">
		<table id="tb_tth" class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>UKK</th>
						<th>Sasaran</th>
						<th>Target</th>
						<th>Tahun</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach($target as $rows): ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $rows->ukes_d ?></td>
						<td><?= $rows->sasaran ?></td>
						<td><strong><?= $rows->op.$rows->nilai ?></strong></td>
						<td><?= $rows->tahun ?></td>
						<td>
							<a href="<?=base_url()?>index.php/ctrl_target/ct_edit/<?= $rows->id_target ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
							<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
    </table>
	</div>
	<div class="panel-footer">
		<button class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah</button>
		<a href="<?=base_url()?>admin/target/target/ct_tambah" class="btn btn-primary">a</a>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Target Tahunan</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
          <label for="">UKK</label>
          <select class="form-control" id="cmb_ukkd" name="cmb_ukkd">
            <option value="<?= $idslctUKK ?>"><?= $slctUKK ?></option>
            <?php foreach($dbukkd as $rows) : ?>
              <option value="<?= $rows->idukes_d ?>"><?= $rows->ukes_d ?></option>
            <?php endforeach ?>
          </select>
        </div>

				<div class="form-group">
          <label for="">Sasaran</label>
          <select class="form-control" id="cmb_sasaran" name="cmb_sasaran">
            <option value="<?= $idslctSsrn ?>"><?= $slctSsrn ?></option>
            <?php foreach($sasaran as $rows) : ?>
              <option value="<?= $rows->id_sasaran ?>"><?= $rows->sasaran ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">Operator</label>
          <select class="form-control" id="cmb_op" name="cmb_op">
            <option value="<?= $slctOP ?>"><?= $slctOP ?></option>
            <option value="<"><</option>
            <option value=">">></option>
          </select>
        </div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
		          <label>Target</label>
		          <input class="form-control" type="text" id="trgt" name="trgt" value="<?= $trgt ?>">
		          <p class="help-block"></p>
		        </div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
		          <label for="">Tahun</label>
		          <select class="form-control" id="cmb_thn" name="cmb_thn">
		            <option value="<?= $slctThn ?>"><?= $slctThn ?></option>
		            <?php
		              $thn = date('Y');
		              for ($i=2000; $i <= $thn ; $i++) :
		            ?>
		                <option value="<?= $i ?>"><?= $i ?></option>
		            <?php
		              endfor;
		            ?>
		          </select>
		        </div>
					</div>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-primary" id="simpan">Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- /.modal -->

<script type="text/javascript">
	$('#btn_d<?= $row->idukes_d ?>').click(function(){
		var sasaran   = $('#cmb_sasaran').val();
		var ukkd    	= $('#cmb_ukkd').val();
		var op      	= $('#cmb_op').val();
		var trgt  		= $('#trgt').val();
		var thn  			= $('#cmb_thn').val();
		$.ajax({
			type  : 'POST',
			data  : {'analisa':analisis,
								'tndklnjt':tndklnjt,
								'total':total,
								'target':target,
								'pncp':pncp,
								'id':'<?= $row->idukes_d ?>',
								'pkms':'<?= $this->session->userdata('idpkms');?>',
								'idssrn':idssrn},
			url   : '<?= base_url() ?>ukes/inukes/ct_save_nilai',
			success :function(html){
				location.reload();
			}
		});
	})

	$(document).ready(function() {
		$("#trgt").keydown(function (e) {
			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
				 // Allow: Ctrl/cmd+A
				(e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
				 // Allow: Ctrl/cmd+C
				(e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
				 // Allow: Ctrl/cmd+X
				(e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
				 // Allow: home, end, left, right
				(e.keyCode >= 35 && e.keyCode <= 39)) {
						 // let it happen, don't do anything
						 return;
			}
			// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}
		});
	});
</script>

<script>
  $('#tb_tth').DataTable();
</script>
