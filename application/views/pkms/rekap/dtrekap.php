<div class="panel panel-default">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<div class="list-group">
			<?php $pkmsRekap = $this->Dataload->pkmsRekap($idpkms) ?>
			<?php foreach($pkmsRekap as $rowRkp): ?>
				<a href="<?=base_url()?>rekap/page/viewrekap?	bln=<?=$rowRkp->bln?>&nmbln=<?= $rowRkp->bulan?>&thn=<?= $rowRkp->tahun ?>" class="list-group-item">
	        <i class="fa fa-calendar fa-fw"></i> <?= $rowRkp->bulan ?>
	        <span class="pull-right text-muted small"><em><?= $rowRkp->tahun ?></em></span>
	      </a>
			<?php endforeach ?>
		</div>
	</div>
	<div class="panel-footer"></div>
</div>