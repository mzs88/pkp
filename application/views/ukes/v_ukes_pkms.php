<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading"><i class="glyphicon glyphicon-stats"></i> Data</div>
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
			<div class="table-bordered table-responsive">
				<table class="table table-hover">
					<thead>
		        <tr>
		          <th rowspan="2" class="text-center" width="30">NO</th>
		          <th rowspan="2" class="text-center">UKK</th>
		          <th rowspan="2" class="text-center">Target Tahun <?= date("Y") ?> %</th>
		          <th rowspan="2" class="text-center" width="100">Satuan Sasaran</th>
		          <th rowspan="2" class="text-center" width="50">Total</th>
		          <th rowspan="2" class="text-center" width="50">Target</th>
		          <th rowspan="2" class="text-center" width="50">Pencapaian</th>
		          <th rowspan="2" class="text-center">Riil</th>
		          <th rowspan="2" class="text-center">Variable</th>
		          <th rowspan="2" class="text-center">Var Total</th>
		          <th rowspan="2" class="text-center">Analisa d</th>
		          <th rowspan="2" class="text-center">Tindak lanjut</th>
		          <th colspan="2" class="text-center">Revisi</th>
		        </tr>
		        <tr>
		          <th>Tanggal</th>
		          <th>Coments</th>
		        </tr>
		      </thead>
					<tbody id="dataUkes">

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	//$("#tbData").DataTable();

	function viewData(bln, thn) {
		window.open(base_url+"ukes/inukes/viewukes?bln="+bln+"&thn="+thn);
	}

	$(document).ready(function()
	{


	  //$('#anu').scrollspy({ target: '#ukesScrollSpy' })

		// $('#ukesScrollSpy').affix({
		//     offset: {
		//       top: $('#ukesScrollSpy').offset().top
		//       // bottom: ($('footer').outerHeight(true) + $('.application').outerHeight(true)) + 40
		//     }
		// });

		$("#tgl").datetimepicker(
	  {
	    viewMode:'months',
	    format:'MMMM-YYYY',
	    locale:moment.locale('id')
	  });


	  $("#btnSearch").click(function()
	  {
	  	if(!$("#tgl").val())
	  	{
		  	alertify.warning("Tanggal Kosing");
	  	}
	  	else
	  	{
	  		waitingDialog.show();
		  	var tgl = $("#tgl").val();
		  	var arr = tgl.split("-");

		  	$.ajax(
		  	{
		  		type:"post",
		  		data:{"bln":arr[0], "thn":arr[1]},
		  		url:base_url+"c_usaha_kesehatan/getdatafilter",
		  		success:function(data)
		  		{
		  			var content = $("#dataUkes");
		  			content.html(data);
		  		}
		  	});

		  	$.ajax(
		  	{
		  		type:"post",
		  		data:{"bln":arr[0], "thn":arr[1]},
		  		url:base_url+"c_usaha_kesehatan/scrollviewukes",
		  		success:function(data)
		  		{
		  			var content = $("#dataScroll");
		  			content.html(data);
		  			waitingDialog.hide();
		  		}
		  	})
	  	}

	  })



	  // $('#anu').scrollspy({ target: '#ukesScrollSpy' })

		// $("#cmbThn").on('change',function()
		// {
		// 	var bln = $("#cmbBln").val();
		// 	var thn = $(this).val();

		// 	$.ajax(
		// 	{
		// 		type:"post",
		// 		data:{"bln":bln, "thn":thn},
		// 		url:base_url+"ukes/inukes/dtCnt",
		// 		success:function(result)
		// 		{
		// 			$("#cntData").html(result);
		// 		}
		// 	})
		// })
	})
</script>
