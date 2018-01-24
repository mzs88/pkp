
<div class="row">
	
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Panel heading</div>
			<div class="panel-body">
				<p>Text goes here...</p>
			</div>
	
			<!-- Table -->
			<table id="rkppkp" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th rowspan="2">No.</th>
					<th rowspan="2">Upaya Kesehatan dan Kegiatan</th>
					<th rowspan="2" style="width: 5%">Target Tahun <?= date("Y") ?> (T) dalam %</th>
					<th rowspan="2" style="width: 10%">Satuan Sasaran (S)</th>
					<th rowspan="2" style="width: 5%">Total</th>
					<th rowspan="2" style="width: 5%">Target</th>
					<th rowspan="2" style="width: 5%">Pencapaian (P)</th>
					<th colspan="3">% Cakupan</th>
					<th rowspan="2">Analisa</th>
					<th rowspan="2">Rencana Tindak Lanjut</th>
					<th>Check</th>
				</tr>
				<tr>
					<th>Riil</th>
					<th>Sub Variable (Terhadap Target Sasaran)</th>
					<th>Variable & Total Nilai Program</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ukka as $ra) : ?>
				<tr class="danger">
					<td><?= $ra->id_ukka?></td>
					<td><?= $ra->ukka?></td>
					<td colspan="7"></td>
					<td><?= floatval($ra->var_tot) ?>%</td>
					<td><?= $ra->analisa ?></td>
					<td><?= $ra->tndk_lnjt ?></td>
					<?php foreach ($ukkb as $b) : ?>
					<tr class="success">
						<td><?= $b->id_ukkb?></td>
						<td><?= $b->ukkb?></td>
						<td colspan="7"></td>
						<td><?= floatval($b->var_tot) ?>%</td>
						<td><?= $b->analisa?></td>
						<td><?= $b->tndk_lnjt?></td>
					</tr>

						<?php
							$sub = 0;
							foreach($ukkc as $c) :
						?>
						<tr class="warning">
							<td><?= $c->id_ukkc?></td>
							<td><?= $c->ukkc?></td>
							<td colspan="6"></td>
							<td><?= floatval($c->var_tot) ?>%</td>
							<td></td>
							<td><?= $c->analisa?></td>
							<td><?= $c->tindak_lanjut?></td>
							<?php $anu=0; echo $anu += $c->var_tot;?>
						</tr>
							<?php
								foreach($ukkd as $d) :
							?>
							<tr>
								<td><?= $d->id_ukkd?></td>
								<td><?= $d->ukkd?></td>
								<td><?= $d->tth?>%</td>
								<td><?= $d->sasaran?></td>
								<td><?= $d->total?>%</td>
								<td><?= $d->target?>%</td>
								<td><?= $d->pencapaian?>%</td>
								<td><?= number_format($d->riil,2)?>%</td>
								<td colspan="2"></td>
								<td><?= $d->analisa?></td>
								<td><?= $d->tindak_lanjut?></td>
								<?php $sub += $d->riil ?>
								<td><textarea></textarea></td>
								<td><button class="btn btn-danger btn-sm">Check</button></td>
							</tr>
								
				</tr>

							<?php endforeach ?>
						<?php endforeach ?>
					<?php endforeach ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	
</div>





