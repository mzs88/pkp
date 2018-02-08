<?php foreach($dtUkesA as $rowA):?>
	<li><a href="#ukes_a<?= $rowA->idukes_a ?>"><?= $rowA->ukes_a ?></a></li>
  <?php $ukkb = $this->m_data_ukes->loadUkesB($rowA->idukes_a); $noba=1; $nob=1;?>
  <ul class="nav nav-second-level">
  <?php foreach($ukkb as $rowB):?>
  	<li><a href="#ukes_b<?= $rowB->idukes_b ?>"><?= $rowB->ukes_b ?></a></li>
  <?php $c=0; $ukkc = $this->m_data_ukes->loadUkesC($rowB->idukes_b); $noc=1?>
    <?php foreach($ukkc as $rowC):?>
    	<ul class="nav nav-third-level">
    	<li><a href="#ukes_c<?= $rowC->idukes_c ?>"><?= $rowC->ukes_c ?></a></li>
      <?php $d=0; $ukkd = $this->m_data_ukes->loadNilaiUkes($rowC->idukes_c, $pkms, $bln, $thn)->result(); $nod=1?>
      <?php foreach($ukkd as $rowD):?>
      	<li><a href="#ukes_d<?= $rowD->idukes_d ?>"><?= $rowD->ukes_d ?></a></li>
      <?php endforeach ?>
    <?php endforeach ?>
	  </ul>
  <?php endforeach ?>
  </ul>
<?php endforeach ?>