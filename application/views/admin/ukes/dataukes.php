<div class="panel panel-default">
  <div class="panel-heading">
      <i class="fa fa-bar-chart-o fa-fw"></i> Data Ukes
      <div class="pull-right">
      		<select name="cmbBln" id="cmbBln" class="form-control">
      			<option>--Pilih--</option>
      				<?php
	          		$bulan = array(
				                '1' => 'JANUARI',
				                '2' => 'FEBRUARI',
				                '3' => 'MARET',
				                '4' => 'APRIL',
				                '5' => 'MEI',
				                '6' => 'JUNI',
				                '7' => 'JULI',
				                '8' => 'AGUSTUS',
				                '9' => 'SEPTEMBER',
				                '10' => 'OKTOBER',
				                '11' => 'NOVEMBER',
				                '12' => 'DESEMBER',
				        );
             	?>
	          	<?php for ($i=1; $i < 13 ; $i++) : ?>
	          		<option value="<?= $i ?>"><?= $bulan[$i] ?></option>

	          	<?php endfor ?>
      		</select>
      </div>
  </div>
  <!-- /.panel-heading -->
  <div class="panel-body" id="content">
      <!-- /.row -->
  </div>
  <!-- /.panel-body -->
</div>

<script>

  $(document).ready(function()
  {
  	$('#cmbBln').on('change',function()
  	{
  		var bln = $(this).val();
  		$.ajax(
  		{
  			type:'post',
  			data:{'bln':bln},
  			url:base_url+'admin/ukes/page/slctdata',
  			success:function(result)
  			{
  				$('#content').html(result);
  			}
  		})
  	});
  })
</script>
