<script type="text/javascript">
	waitingDialog.show();
</script>
<div class="panel panel-success">
	<div class="panel-heading">Chart	</div>
	<div class="panel-body">
		<div id="chart-rekap"></div>
	</div>
</div>
<div class="panel panel-success">
	<div class="panel-heading"> Data</div>
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
	<div class="table table-bordered table-responsive">
		<table class="table table-hover">
			<thead>
				<th>No</th>
				<th>Upaya Kesehatan dan Program</th>
				<th class="text-center">%  Cakupan Sub Variabel Program</th>
				<th class="text-center">Bobot Upaya Kesehatan dan Program</th>
				<th class="text-center">Nilai  Program </th>
				<th class="text-center">Rata2 nilai Upaya</th>
			</thead>
			<tbody id="content">

			</tbody>
		</table>
	</div>
</div>

<script src="<?=base_url()?>assets/vendor/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>assets/vendor/morrisjs/morris.min.js"></script>
<script src="<?=base_url()?>assets/data/rekap.js"></script>
<script type="text/javascript">
	$("#tgl").datetimepicker(
  {
    viewMode:'months',
    format:'MMMM-YYYY',
    locale:moment.locale('id')
  });
	setTimeout(function()
	{
		waitingDialog.hide();
	},200);

	$("#btnSearch").on("click", function()
	{
		// alert('anu');
		var tgl = $("#tgl").val();
		var arr = tgl.split("-");

		if(!tgl)
		{
			alertify.warning("Tidak ada paramerter");
		}
		else
		{
			waitingDialog.show();

			$.ajax(
			{
				type:"post",
				data:{"bln":arr[0], "thn":arr[1]},
				url:base_url+"c_rekap/getrekap",
				success:function(result)
				{
					$("#content").empty();
					$("#chart-rekap").empty();
					$("#content").html(result);

					setTimeout(function()
					{
						var sendData=[];
						var dt='';
						$('table tbody tr').not('.bg-danger').each(function(i, e)
						{
							var x = 'x';
							var y = 'y';
							var a = 'a';
							var valx = $.trim($(this).find('td:eq(1)').not('#ukesA').text());
							var valy = $.trim($(this).find('td:eq(2)').not('#ukesA').text());
							var vala = $.trim($(this).find('td:eq(4)').not('#ukesA').text());
							if (valx !== ''  && vala !== ''  && valy !== '' )
							{
								var obj = {};
								obj[x] = valx;
								obj[y] = valy;
								obj[a]	= vala;
							}
							else
							{
								var obj = {};
								obj[x] = 'Kosong';
								obj[y] = 0;
								obj[a]	= 0;
							}

							//obj[a] = vala;
							sendData.push(obj);
						});

						dt = JSON.stringify(sendData);
						dtR = JSON.parse(dt);
						// console.log(dtR);

						Morris.Bar(
						{
							element:'chart-rekap',
							data : dtR,
							xkey:'x',
							ykeys:['y','a'],
							labels:['Nilai','Rata2'],
							hideover:'auto',
							resize:true
						});
					waitingDialog.hide();
					},0)
				}
			})
		}
	})

	$(document).ready(function()
	{



	});
</script>