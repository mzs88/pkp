<div class="panel panel-primary">
	<div class="panel-body" id="a">
		<table id="tb_tth" class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Varialble</th>
						<th>Operasional</th>
            <th>Penghitungan</th>
						<th>Target</th>
						<th>Tahun</th>
            <th>Tanggal</th>
            <th>Oeleh</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach($target as $rows): ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $rows->variable ?></td>
						<td><?= $rows->operasional ?></td>
						<td><?= $rows->penghitungan ?></td>
						<td><strong><?= $rows->op.$rows->target ?></strong> %</td>
						<td><?= $rows->tahun ?></td>
            <td><?= $rows->create_date ?></td>
            <td><?= $rows->nama ?></td>
						<td>
              <button class="btn btn-primary btn-sm" type="submit" name="add" data-toggle="modal" data-target="#add<?= $rows->idmt_target ?>" id="add<?= $rows->idmt_target ?>"><i class="fa fa-pencil"></i></button>
						</td>

            <!-- Modal -->
            <div class="modal fade" id="add<?= $rows->idmt_target ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            				<h4 class="modal-title" id="myModalLabel">Target Tahunan Penilaian Mutu</h4>
            			</div>
            			<div class="modal-body">

            				<div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Operator</label>
                          <select class="form-control" id="cmb_op<?= $rows->idmt_target ?>" name="cmb_op">
                            <option value="">--Pilih--</option>
                            <option value="<"><</option>
                            <option value=">">></option>
                          </select>
                        </div>
                      </div>

            					<div class="col-md-4">
            						<div class="form-group">
            		          <label>Target</label>
            		          <input class="form-control" type="text" id="trgt<?= $rows->idmt_target ?>" name="trgt" value="<?= $rows->target ?>">
            		          <p class="help-block"></p>
            		        </div>
            					</div>

            					<div class="col-md-4">
            						<div class="form-group">
            		          <label for="">Tahun</label>
            		          <select class="form-control" id="cmb_thn<?= $rows->idmt_target ?>" name="cmb_thn">
            		            <option value="">--Pilih--</option>
            		            <?php
            		              $thn = date('Y');
            		              for ($i=2005; $i <= $thn ; $i++) :
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
            				<button type="button" class="btn btn-primary" id="simptgt<?= $rows->idmt_target ?>">Simpan</button>
            			</div>
            		</div>
            	</div>
            </div>
            <!-- /.modal -->

            <script type="text/javascript">
            	$('#simptgt<?= $rows->idmt_target ?>').click(function(){
                var op        = $('#cmb_op<?= $rows->idmt_target ?>').val();
            		var trgt  		= $('#trgt<?= $rows->idmt_target ?>').val();
            		var thn  			= $('#cmb_thn<?= $rows->idmt_target ?>').val();

                if (op === '' && thn === '') {
                  alert('Tanda OP dan Tahun tidak boleh kosong');
                }else{
                  $.ajax({
              			type  : 'POST',
              			data  : {'trgt'   :trgt,
              								'thn'   :thn,
                              'op'    :op,
              								'id'    :'<?= $rows->idmt_target ?>',
                              'idvar' :'<?= $rows->idmt_op_htng?>',
              								'idop'  :'<?= $this->session->userdata('idop');?>'},
              			url   : '<?= base_url() ?>admin/mutu/page/savetarget',
              			success :function(html){
              				location.reload();
              			}
              		});
                }

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





<script>
  $('#tb_tth').DataTable();
</script>
