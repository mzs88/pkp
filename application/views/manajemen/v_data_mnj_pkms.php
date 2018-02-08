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
		        <th rowspan="2" class="text-center">NO</th>
		        <th rowspan="2" class="text-center">Jenis Variable</th>
		        <th rowspan="2" class="text-center">Definisi Operasional</th>
		        <th colspan="4" class="text-center">Skala</th>
		        <th rowspan="2" class="text-center" width="75">Nilai Hasil</th>
		        <th colspan="2" class="text-center">Revisi</th>
		        <th rowspan="2" class="text-center">Opsi</th>
		      </tr>
		      <tr>
		        <th class="text-center">Nilai 0</th>
		        <th class="text-center">Nilai 4</th>
		        <th class="text-center">Nilai 7</th>
		        <th class="text-center">Nilai 10</th>
		        <th class="text-center">Coments</th>
		        <th class="text-center">Tanggal</th>
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
	  		url:base_url+"c_manajemen/getdatamnj",
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