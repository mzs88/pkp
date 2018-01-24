<script type="text/javascript">
	waitingDialog.show();
</script>
<div class="panel panel-default">
	<div class="panel-heading">Chart	</div>
	<div class="panel-body">
		<div id="chart-rekap"></div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading"> Data</div>
	<div class="panel-body">
		<table class="table table-hover table-stripe">
			<thead>
				<th>Upaya Kesehatan dan Program</th>
				<th>%  Cakupan Sub Variabel Program</th>
				<th>Bobot Upaya Kesehatan dan Program</th>
				<th>Nilai  Program </th>
				<th>Rata2 nilai Upaya</th>
			</thead>
			<tbody>
				<?php $ukesA = $this->Dataload->ukesRkpA($idpkms, $bln, $thn) ?>
				<?php foreach($ukesA as $rowA): ?>
					<tr class="bg-warning">
						<td id="ukesA"><strong><?= $rowA->ukes_a ?></strong></td>
						<td></td>
						<td><strong><?= $rowA->bobot ?></strong></td>
						<td></td>
						<td colspan="" rowspan="" headers=""></td>
					</tr>
					<?php $sumUKES=0; $rtUKES=0;?>
					<?php $ukesB = $this->Dataload->ukesRkpB($rowA->idukes_a, $idpkms, $bln, $thn) ?>
					<?php foreach($ukesB as $rowB): ?>
						<tr>
							<td><?= $rowB->ukes_b ?></td>
							<td><?= round($rowB->nilai,2) ?></td>
							<td><?= $rowB->bobot ?></td>
							<td><?= $rowB->program ?></td>
							<td colspan="" rowspan="" headers=""></td>
							<?php $sumUKES += $rowB->program ?>
						</tr>
					<?php endforeach ?>
					<tr class="bg-info">
						<td colspan="4"><strong>Rata-Rata Nilai <?= $rowA->ukes_a ?> : </strong></td>
						<?php
							if($sumUKES > 0 && count($ukesB) > 0)
							{
								$rtUKES = round($sumUKES/count($ukesB),2);
							}
						?>
						<td><?= $rtUKES ?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				<?php endforeach ?>
				<tr class="bg-warning">
					<td colspan="5"><strong>MANAJEMEN PUSKESMAS</strong></td>
				</tr>
				<?php $sumMNJ=0; $rtMNJ=0; ?>
				<?php $mnjRekap = $this->Dataload->mnjRekap($idpkms, $bln, $thn) ?>
				<?php foreach($mnjRekap as $rowMnj): ?>
					<tr>
						<td><?= $rowMnj->ktgmanaj ?></td>
						<td><?= round($rowMnj->total) ?></td>
						<td><?= $rowMnj->bobot ?></td>
						<td><?= $rowMnj->total * $rowMnj->bobot  ?></td>
						<?php $np = $rowMnj->total * $rowMnj->bobot ?>
						<?php $sumMNJ += $np ?>
						<td colspan="" rowspan="" headers=""></td>
					</tr>
				<?php endforeach ?>
				<tr class="bg-info">
					<td colspan="4"><strong>Rata-rata Nilai Manajemen Puskesmas : </strong></td>
					<?php
						$rt=0;
						if($sumMNJ > 0 && count($mnjRekap)>0)
						{
							$rtMNJ = round($sumMNJ/count($mnjRekap));
						}
					?>
					<td><?= $rtMNJ ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="bg-warning">
					<td colspan="5"><strong>MUTU</strong></td>
				</tr>
				<?php $sumMT=0; $rtMT=0; ?>
				<?php $mtRekap = $this->Dataload->mtRekap($idpkms, $bln, $thn) ?>
				<?php foreach($mtRekap as $rowMt):?>
					<tr>
						<td><?= $rowMt->mtktg ?></td>
						<td><?= round($rowMt->total_var) ?></td>
						<td><?= $rowMt->bobot?></td>
						<td><?= $rowMt->total_var * $rowMt->bobot?></td>
						<?php $program = $rowMt->total_var * $rowMt->bobot ?>
						<?php $sumMT += $program?>
						<td colspan="" rowspan="" headers=""></td>
					</tr>
				<?php endforeach ?>
				<tr class="bg-info">
					<td colspan="4"><strong>Rata2 nilai Upaya : </strong></td>
					<?php
						if($sumMT > 0 && count($mtRekap) >0 )
						{
							$rtMT = round($sumMT/count($mtRekap),2);
						}
					?>
					<td><?= $rtMT ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="bg-danger">
					<td colspan="4">Total</td>
					<td><?= $sumUKES + $sumMNJ + $sumMT ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<script src="<?=base_url()?>assets/vendor/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>assets/vendor/morrisjs/morris.min.js"></script>
<script src="<?=base_url()?>assets/data/rekap.js"></script>
<script type="text/javascript">
	setTimeout(function()
	{
		waitingDialog.hide();
	},200);

	$(document).ready(function()
	{
		// Morris.Bar(
		// {
		// 	element:'chart-rekap',
		// 	data:[{
		// 		x:'11',
		// 		y:'Januari',
		// 		a:'10',
		// 		b:'1'
		// 	},{
		// 		x:'12',
		// 		y:'Februari',
		// 		a:'10',
		// 		b:'2'
		// 	},{
		// 		x:'13',
		// 		y:'Maret',
		// 		a:'10',
		// 		b:'3'
		// 	},{
		// 		x:'14',
		// 		y:'April',
		// 		a:'10',
		// 		b:'4'
		// 	},{
		// 		x:'15',
		// 		y:'Mei',
		// 		a:'10',
		// 		b:'5'
		// 	},{
		// 		x:'16',
		// 		y:'Juni',
		// 		a:'10',
		// 		b:'6'
		// 	},{
		// 		x:'17',
		// 		y:'Juli',
		// 		a:'10',
		// 		b:'7'
		// 	},{
		// 		x:'18',
		// 		y:'Agustus',
		// 		a:'10',
		// 		b:'8'
		// 	},{
		// 		x:'19',
		// 		y:'September',
		// 		a:'10',
		// 		b:'9'
		// 	},{
		// 		x:'20',
		// 		y:'Oktober',
		// 		a:'10',
		// 		b:'10'
		// 	},{
		// 		x:'21',
		// 		y:'November',
		// 		a:'10',
		// 		b:'11'
		// 	},{
		// 		x:'21',
		// 		y:'Desember',
		// 		a:'10',
		// 		b:'12'
		// 	}],
		// 	xkey:'y',
		// 	ykeys:['x','a','b'],
		// 	labels:['Nilai Satuan','anu','Kroto'],
		// 	hideover:'auto',
		// 	resize:true
		// });

		var sendData=[];
		var dt='';
		$('table tbody tr').not('.bg-danger').each(function(i, e)
		{
			var x = 'x';
			var y = 'y';
			var a = 'a';
			var valx = $.trim($(this).find('td:eq(0)').not('#ukesA').text());
			var valy = $.trim($(this).find('td:eq(1)').not('#ukesA').text());
			var vala = $.trim($(this).find('td:eq(3)').not('#ukesA').text());
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
		console.log(dtR);

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


	});
</script>