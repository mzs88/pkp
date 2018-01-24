<div class="panel panel-default">
	<div class="panel-heading">UKES A</div>
	<div class="panel-body">
		<table class="table table-hover">
			<tbody>
				<?php foreach($ukesA as $rowA): ?>
					<tr>
						<td><?= $rowA->ukes_a ?></td>
						<td><?= $rowA->bobot ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<div class="panel-footer">
		<button class="btn btn-danger" id="btnModalA">Tambah/Edit</button>
	</div>
</div>

<div class="modal fade" id="mdlUkesA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">UKES A</h4>
      </div>
      <div class="modal-body">
        <div class="form-gorup">
        	<label>Ukes</label>
        	<select name="cmbUkesA" id="cmbUkesA" class="form-control">
        		<option value="">--Pilih--</option>
        		<?php foreach($ukesA as $rowA): ?>
        			<option value="<?= $rowA->idukes_a ?>"><?= $rowA->ukes_a ?></option>
						<?php endforeach ?>
        	</select>
        </div>
        <div class="form-group">
        	<input type="hidden" name="idbbtA" id="idbbtA">
        	<input type="text" class="form-control" id="bbtA" name="bbtA">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnSaveA">Save changes</button>
      </div>
    </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="panel panel-default">
	<div class="panel-heading">UKES B</div>
	<div class="panel-body">
		<table class="table table-hover">
			<tbody>
				<?php foreach($ukesB as $rowB): ?>
					<tr>
						<td><?= $rowB->ukes_b ?></td>
						<td><?= $rowB->bobot ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<div class="panel-footer">
		<button class="btn btn-danger" id="btnModalB">Tambah/Edit</button>
	</div>
</div>

<div class="modal fade" id="mdlUkesB" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">UKES B</h4>
      </div>
      <div class="modal-body">
        <div class="form-gorup">
        	<label>Ukes</label>
        	<select name="cmbUkesB" id="cmbUkesB" class="form-control">
        		<option value="">--Pilih--</option>
        		<?php foreach($ukesB as $rowB): ?>
        			<option value="<?= $rowB->idukes_b ?>"><?= $rowB->ukes_b ?></option>
						<?php endforeach ?>
        	</select>
        </div>
        <div class="form-group">
        	<input type="hidden" name="idbbtB" id="idbbtB">
        	<input type="text" class="form-control" id="bbtB" name="bbtB">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnSaveB">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mdlInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Info</h4>
      </div>
      <div class="modal-body">
      	<?= $this->session->flashdata('info'); ?>
      </div>
      <div class="modal-footer">
        <a href="<?= base_url() ?>admin/master/page" class='btn btn-primary'> Close</a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function()
	{
		$('#cmbUkesA').on('change',function()
		{
			var cmb = $(this);
			var bobot = $('#bbtA');
			var idbbt = $('#bbtA');
			$.ajax(
			{
				type : 'POST',
				data : {'id':cmb.val()},
				url : base_url + "admin/master/page/getBbtA",
				success : function(data)
				{
					bobot.val('');
					idbbt.val('');
					$.each(JSON.parse(data),function(key, val)
					{
						bobot.val(val.idbobot_a);
						idbbt.val(val.bobot);
					});
				}
			})
		})

		$('#btnModalA').click(function()
		{
			$('#mdlUkesA').modal('show');
		});

		$('#btnSaveA').click(function()
		{
			var id = $('#cmbUkesA').val();
			var bbt = $('#bbtA').val();
			var idbbt = $('#idbbtA').val();

			$.ajax(
				{
					type : 'POST',
					data : {'idukes':id,
									'bbt':bbt,
									'idbbt':idbbt,
									'op':idop,
									'field' : 'idbobot_a',
									'table':'bobot_a', 'fieldukes':'idukes_a'},
					url : base_url+"admin/master/Page/bbtAsave",
					success : function(data)
					{
						$('#mdlUkesA').modal('hide');
						$('#mdlInfo').modal('show');
					}
				});
		});

		$('#cmbUkesB').on('change',function()
		{
			var id = $(this).val();
			var bobot = $('#bbtB');
			var idbbt = $('idbbtB');
			$.ajax(
			{
				type : 'POST',
				data : {'id':id},
				url : base_url + "admin/master/page/getBbtB",
				success : function(data)
				{
					bobot.val("");
					idbbt.val("");
					$.each(JSON.parse(data),function(key, val)
					{
						idbbt.val(val.idbobot_b);
						bobot.val(val.bobot);
					});
				}
			})
		})

		$('#btnModalB').click(function()
		{
			$('#mdlUkesB').modal('show');
		});

		$('#btnSaveB').click(function()
		{
			var id 			= $('#cmbUkesB').val();
			var bbt 		= $('#bbtB').val();
			var idbbt 	= $('#idbbtB').val();

			$.ajax(
				{
					type : 'POST',
					data : {'idukes':id,
									'bbt':bbt,
									'idbbt':idbbt,
									'op':idop,
									'field':'idbobot_b',
									'table':'bobot_b', 'fieldukes':'idukes_b'},
					url : base_url+"admin/master/Page/bbtAsave",
					success : function(data)
					{
						console.log(bbt);
						console.log(idop);
						console.log(id);
						console.log(base_url);
						$('#mdlUkesB').modal('hide');
						$('#mdlInfo').modal('show');
					}
				});
		});
	})
</script>