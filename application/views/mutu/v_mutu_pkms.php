<div class="row">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="glyphicon glyphicon-stats"></i></h3>
		</div>
		<div class="panel-body">
			<div class="btn-group pull-right" role="group" aria-label="">
			  <button type="button" class="btn btn-default" aria-label="Print"><i class="glyphicon glyphicon-print"></i></button>
			  <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-export"></i></button>
			  <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-import"></i></button>
			</div>

			<div class="form-group input-group col-md-2 pull-right">
        <input id="tgl" type="text" class="form-control" placeholder="Bulan & Tahun">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button" id="btnSearch"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
		</div>
		<div class="table table-bordered">
			<table class="table table-hover">
				<thead>
					<tr>
						<th rowspan="2" class="text-center">No</th>
						<th rowspan="2" class="text-center col-sm-2">Jenis Variable</th>
						<th rowspan="2" class="text-center col-sm-2">Definisi Operasional</th>
						<th rowspan="2" class="text-center col-sm-2">Cara Penghitungan</th>
						<th rowspan="2" class="text-center">Target</th>
						<th rowspan="2" class="text-center">Total</th>
						<th rowspan="2" class="text-center">Capian</th>
						<th rowspan="2" class="text-center">% Capaian</th>
						<th rowspan="2" class="text-center">Analisa</th>
						<th rowspan="2" class="text-center">Rencana Tindak Lanjut</th>
						<th colspan="2" class="text-center">Refisi</th>
					</tr>
					<tr>
						<th class="text-center">Catatan</th>
						<th class="text-center">Tgl Rev</th>
					</tr>
				</thead>
				<tbody id="dtmnj">
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$("#tgl").datetimepicker(
  {
    viewMode:'months',
    format:'MMMM-YYYY',
    locale:moment.locale('id')
  });

  $("#btnSearch").click(function()
  {
  	var tgl = $("#tgl").val();
  	var arr = tgl.split("-");

  	if(!tgl)
  	{
  		alertify.warning("Tidak ada parameter yang dicari");
  	}
  	else
  	{
  		waitingDialog.show();
  		$.ajax(
	  	{
	  		type:"post",
	  		data:{"bln":arr[0], "thn":arr[1]},
	  		url:base_url+"c_mutu/getdatamutu",
	  		success:function(data)
	  		{
	  			waitingDialog.hide();
	  			var content = $("#dtmnj");
	  			content.html(data);

	  		}
	  	});
  	}
  })


</script>