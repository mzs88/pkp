<?php
	$bln = array('1'=>'Januari',
								'2'=>'Februari',
								'3'=>'Maret',
								'4'=>'April',
								'5'=>'Mei',
								'6'=>'Juni',
								'7'=>'Juli',
								'8'=>'Agustus',
								'9'=>'September',
								'10'=>'Oktober',
								'11'=>'November',
								'12'=>'Desember');
?>
<div class="panel panel-default">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<div class="list-group">
			<?php $CollectMnj = $this->Dataload->CllData($idpkms) ?>
			<?php foreach($CollectMnj as $rowDt): ?>
				<a href="<?=base_url()?>mnj/page/viewdata?	date=<?=$rowDt->bulan?>&bln=<?= $bln[$rowDt->bulan]?>" class="list-group-item">
	        <i class="fa fa-calendar fa-fw"></i> <?= $bln[$rowDt->bulan] ?>
	        <span class="pull-right text-muted small"><em><?= $rowDt->tahun ?></em>
	        </span>
	      </a>
			<?php endforeach ?>
		</div>
	</div>
	<div class="panel-footer"></div>
</div>