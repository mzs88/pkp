<?php
  $sumUkesC = 0;
  $rtUkesC = 0;
  $rilUkesC = 0;

  $sumUkesB = 0;
  $rtUkesB  = 0;
  $rilUkesB = 0;

  $sumUkesA = 0;
  $rtlUkesA = 0;
  $rilUkesA = 0;

  $totalUkes = 0;

  $noa=1;
  $nomnj = 1;
  $no = 4;

  $sumRkpA = 0;
  $rtRkpA = 0;
  $rilRkpA = 0;

  $pkms = 1;
  $bln = 1;
  $thn = 2018;

  $rilMnj = 0;
  $sumMnj = 0;
  $rtMnj = 0;
?>
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
			<tbody>
				<?php foreach($ukesRkpA as $rowA):?>

					<!-- penghitung rata rata nilai rekap -->
					<?php
				    $b = $this->m_data_rekap->ukesRkpB($rowA->idukes_a)->result();
				    foreach($b as $rowB)
				    {
				      $c = $this->m_data_rekap->ukesRkpC($rowB->idukes_b)->result();
				      foreach($c as $rowC)
				      {
				        $d = $this->m_data_rekap->ukesRkpD($rowC->idukes_c, $pkms, $bln, $thn)->result();
				        foreach($d as $rowD)
				        {
				          $rilUkesC = $rowD->pencapaian / $rowD->total * 100;
				          // echo "<tr class='bg-warning'><td>".$nd++."</td><td>".round($rilUkesC,2)."</td></tr>";
				          $sumUkesC += $rilUkesC;
				          $rtUkesC = $sumUkesC / count($d); // Nilai rata rata ukes C
				        }
				          $nd=1;
				        // echo "<tr><td colspan='5'> Ukes C ".round($rtUkesC,2)."</td></tr>";
				        $sumUkesB += $rtUkesC;
				        $sumUkesC = 0;
				        $rtUkesB = $sumUkesB / count($c); // Nilai rata rata ukes B
				      }
				      // echo "<tr class='bg-primary'><td colspan='5'> Ukes B ".round($rtUkesB,2)."</td></tr>";
				      // $sumUkesA += $rtUkesB;
				      // $sumUkesB = 0;
				      // $rtUkesB  = 0;
				      // $rilUkesB = 0;
				      // $rtlUkesA = $sumUkesA / count($b); // Nilai rata rata ukes A
				      $rilRkpA = $rtUkesB * $rowB->bobot;
							// echo "<tr><td>".round($rilRkpA)."</td></tr>";
		        	$sumRkpA += $rilRkpA;
		        	$sumUkesB = 0;
		        	$rtRkpA = $sumRkpA / count($b);
				    }
		        	$totalUkes += $rtRkpA;
							// echo "<tr><td>".round($totalUkes)."</td></tr>";
				  ?>
					<!-- penghitung rata rata nilai rekap -->
					<tr class="bg-success">
				    <td><?= $noa++; ?></td>
				    <td colspan="2"><strong><?= $rowA->ukes_a?></strong></td>
				    <td class="text-center"><?= $rowA->bobot?></td>
				    <td colspan="" rowspan="" headers=""></td>
				    <td class="text-center"><?= round($rtRkpA,2) ?></td>
				  </tr>

				  <?php $ukkb = $this->m_data_rekap->ukesRkpB($rowA->idukes_a)->result(); $noba=1; $nob=1;?>
				  <?php foreach($ukkb as $rowB):?>

						<!-- penghitungan nilai rekap -->
						<?php
							$c = $this->m_data_rekap->ukesRkpC($rowB->idukes_b)->result();
				      foreach($c as $rowC)
				      {
				        $d = $this->m_data_rekap->ukesRkpD($rowC->idukes_c, $pkms, $bln, $thn)->result();
				        foreach($d as $rowD)
				        {
				          $rilUkesC = $rowD->pencapaian / $rowD->total * 100;
				          // echo "<tr class='bg-warning'><td>".$nd++."</td><td>".round($rilUkesC,2)."</td></tr>";
				          $sumUkesC += $rilUkesC;
				          $rtUkesC = $sumUkesC / count($d); // Nilai rata rata ukes C
				        }
				          $nd=1;
				        // echo "<tr><td colspan='5'> Ukes C ".round($rtUkesC,2)."</td></tr>";
				        $sumUkesB += $rtUkesC;
				        $sumUkesC = 0;
				        $rtUkesB = $sumUkesB / count($c); // Nilai rata rata ukes B
				      }
						?>
						<!-- penghitungan nilai rekap -->

						<tr>
				      <td><?= ($noa - 1).".".$nob++?></td>
				      <td><?= $rowB->ukes_b ?></td>
				      <td class="text-center"><?= round($rtUkesB,2) ?></td>
				      <td class="text-center"><?= $rowB->bobot ?></td>
				      <?php $rilRkpA = $rtUkesB * $rowB->bobot ?>
				      <td class="text-center"><?= round($rilRkpA,2) ?></td>
				      <?php $sumRkpA += $rilRkpA ?>
				      <td></td>
				    </tr>
				    <?php $sumUkesB = 0; ?>
					<?php endforeach ?>
					<?php $sumRkpA = 0; ?>
				<?php endforeach ?>

				<!-- penilaian manajemen -->
				<?php
					$mnj = $this->m_data_rekap->loadDataManaj($pkms, $bln, $thn)->result();
					foreach($mnj as $rwm)
					{
						$rilMnj = $rwm->hasil * $rwm->bobot;
						$sumMnj += $rilMnj;
						$rtMnj = $sumMnj / count($mnj);
					}
				?>
				<tr class="bg-success">
					<td>4</td>
					<td colspan="2"><strong>MANAJEMEN PUSKESMAS</strong></td>
					<td class="text-center">0</td>
					<td></td>
					<td class="text-center"><?= round($rtMnj) ?></td>
				</tr>

				<?php $mnj = $this->m_data_rekap->loadDataManaj($pkms, $bln, $thn)->result() ?>
				<?php foreach($mnj as $rwm):?>
					<tr>
						<td><?= ($no).".".$nomnj++ ?></td>
						<td><?= $rwm->ktgmanaj ?></td>
						<td class="text-center"><?= $rwm->hasil ?></td>
						<td class="text-center"><?= $rwm->bobot ?></td>
						<?php
							$rilMnj = $rwm->hasil * $rwm->bobot;
						?>
						<td class="text-center"><?= round($rilMnj,2) ?></td>
					</tr>
				<?php endforeach ?>
				<!-- penilaian manajemen -->
				<!-- penilaian mutu -->
				<tr class="bg-success">
					<td><strong>5</strong></td>
					<td colspan="2">MUTU</td>
					<td class="text-center">0</td>
					<td></td>
					<td class="text-center">0</td>
				</tr>

				<!-- penilaian mutu -->
				<tr class="bg-danger">
					<td colspan="5"><strong>Total</strong></td>
					<td class="text-center"><?= round($totalUkes + $rtMnj,2) ?></td>
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