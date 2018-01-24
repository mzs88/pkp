<div class="panel panel-default">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<div class="list-group">
			<?php $dtUkes = $this->loadukes->DataUkes($idpkms) ?>
			<?php foreach($dtUkes as $rowDt): ?>
				<a href="<?=base_url()?>ukes/inukes/viewrekap?date=<?=$rowDt->bln?>&bln=<?= $rowDt->bulan?>&thn=<?= $rowDt->tahun?>" class="list-group-item">
	        <i class="fa fa-calendar fa-fw"></i> <?= $rowDt->bulan ?>
	        <span class="pull-right text-muted small"><em><?= $rowDt->tahun ?></em>
	        </span>
	      </a>
			<?php endforeach ?>
		</div>
	</div>
	<div class="panel-footer"></div>
</div>