<div class="list-group">
	<?php foreach($getdata as $rowDt): ?>
		<a href="<?=base_url()?>admin/ukes/page/viewukes?pkms=<?=$rowDt->id_pkms?>&bln=<?= $rowDt->bulan?>" class="list-group-item">
      <i class="fa fa-calendar fa-fw"></i> <?= $rowDt->nm_pkms ?>
      <span class="pull-right text-muted small"><em><?= $rowDt->tahun ?></em>
      </span>
    </a>
	<?php endforeach ?>
</div>