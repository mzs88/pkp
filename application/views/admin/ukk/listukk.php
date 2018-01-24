<?php $ukka = $this->loaddata->mdl_ukesa(); $no_a="1"?>
<?php foreach($ukka as $row):?>
	<div class="panel-group" id="ukk">
		<div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#ukk" href="#ukes_a<?= $row->idukes_a ?>"><?= $no_a++." ".$row->ukes_a ?></a>
        </h4>
      </div>
      <div id="ukes_a<?= $row->idukes_a ?>" class="panel-collapse collapse in">
        <div class="panel-body">
					<?php $ukkb = $this->loaddata->mdl_ukesb($row->idukes_a); $no_b="1"?>
					<?php foreach($ukkb as $row):?>
					<div class="panel-group" id="ukk_b">
						<div class="panel panel-danger">
				      <div class="panel-heading">
				        <h4 class="panel-title">
				          <a data-toggle="collapse" data-parent="#ukk_b" href="#ukes_b<?= $row->idukes_b ?>" aria-expanded="false" class="collapsed"><?= ($no_a-1).".".$no_b++." ".$row->ukes_b ?></a>
				        </h4>
				      </div>
				      <div id="ukes_b<?= $row->idukes_b ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
				        <div class="panel-body">
									<?php $ukkc = $this->loaddata->mdl_ukesc($row->idukes_b); $no_c="1"?>
									<?php foreach($ukkc as $row):?>
									<div class="panel-group" id="ukk_c">
										<div class="panel panel-warning">
								      <div class="panel-heading">
								        <h4 class="panel-title">
								          <a data-toggle="collapse" data-parent="#ukk" href="#ukes_c<?= $row->idukes_c ?>" aria-expanded="false" class="collapsed"><?= ($no_a-1).".".($no_b-1).".".$no_c++." ".$row->ukes_c ?></a>
								        </h4>
								      </div>
								      <div id="ukes_c<?= $row->idukes_c ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
								        <div class="panel-body">
													<?php $ukkd = $this->loaddata->mdl_ukesd($row->idukes_c); $no_d="1"?>
													<?php foreach($ukkd as $row):?>
													<div class="panel-group" id="ukk_b">
														<div class="panel panel-info">
												      <div class="panel-heading">
												        <h4 class="panel-title">
												          <a data-toggle="collapse" data-parent="#ukk" href="#ukes_d<?= $row->idukes_d ?>" aria-expanded="false" class="collapsed"><?= ($no_a-1).".".($no_b-1).".".($no_c-1).".".$no_d++." ".$row->ukes_d ?></a>
												        </h4>
												      </div>
												      <div id="ukes_d<?= $row->idukes_d ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
												        <!-- <div class="panel-body">
																</div> -->
												      </div>
												    </div>
													</div>
													<?php endforeach ?>
												</div>
								      </div>
								    </div>
									</div>
									<?php endforeach ?>
								</div>
				      </div>
				    </div>
					</div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
	</div>
<?php endforeach ?>
