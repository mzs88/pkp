<?php
  $sumUkesD = 0;
  $rtUkesD = 0;
  $rilUkesD = 0;

  $sumUkesC = 0;
  $rtUkesC  = 0;
  $rilUkesC = 0;

  $sumUkesB = 0;
  $rtlUkesB = 0;
  $rilUkesB = 0;
?>
<?php $noa=1;?>
<?php foreach($dtUkesA as $rowA):?>
  <tr class="bg-success">
    <td><?= $noa++; ?></td>
    <td colspan="14" id="ukes_a<?= $rowA->idukes_a ?>"><?= $rowA->ukes_a ?></td>
  </tr>
  <?php $ukkb = $this->m_data_ukes->loadUkesB($rowA->idukes_a); $noba=1; $nob=1;?>
  <?php foreach($ukkb as $rowB):?>
    <tr class="bg-info">
      <td><?= ($noa - 1).".".$nob++?></td>
      <td colspan="14" id="ukes_b<?= $rowB->idukes_b ?>"><?= $rowB->ukes_b ?></td>
    </tr>
    <?php $c=0; $ukkc = $this->m_data_ukes->loadUkesC($rowB->idukes_b); $noc=1?>
    <?php foreach($ukkc as $rowC):?>
      <tr class="bg-warning" id="tr-varC">
        <td><?= ($noa-1).".".($nob-1).".".$noc++?></td>
        <td colspan="14" id="ukes_c<?= $rowC->idukes_c ?>"><?= $rowC->ukes_c ?></td>
      </tr>
      <?php $d=0; $ukkd = $this->m_data_ukes->loadNilaiUkes($rowC->idukes_c, $pkms, $bln, $thn)->result(); $nod=1?>
      <?php foreach($ukkd as $rowD):?>
        <tr class="bg-warning">
          <?php
            $rilUkesD = $rowD->pencapaian * $rowD->total / 100;
            $sumUkesD += $rilUkesD;
            $rtUkesD = $sumUkesD / count($ukkd);
          ?>
          <td><?= ($noa-1).".".($nob-1).".".($noc-1).".".$nod++?></td>
          <td id="ukes_d<?= $rowD->idukes_d ?>"><?= $rowD->ukes_d ?></td>
          <td class="text-center"><?= $rowD->op." ".$rowD->nilai ?></td>
          <td><?= $rowD->sasaran ?></td>
          <input type="hidden" name="idssrn<?= $rowD->idukes_d ?>" id="idssrn<?= $rowD->idukes_d ?>" value="<?= $rowD->id_sasaran ?>">
          <td class="text-center"><?= $rowD->total ?></td>
          <td class="text-center"><?= $rowD->target ?></td>
          <td class="text-center"><?= $rowD->pencapaian ?></td>
          <td><?= $rilUkesD ?></td>
          <td colspan="2"></td>
          <td><?= $rowD->analisa ?></td>
          <td><?= $rowD->tindak_lanjut ?></td>
          <td colspan="2"></td>
          <!-- <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ukesd<?= $rowD->idukes_d ?>">Input</button></td> -->

        </tr>
      <?php endforeach ?>
          <tr>
            <td colspan="8"><strong>Nilai Rata-Rata <?= $rowC->ukes_c ?></strong></td>
            <td><strong><?= round($rtUkesD,2) ?></strong></td>
            <td colspan="6"></td>
          </tr>
          <?php
            $sumUkesC += $rtUkesD;
            $rtUkesC = $sumUkesC / count($ukkc);
          ?>
    <tr>
      <td colspan="15"></td>
    </tr>
    <?php endforeach ?>
    <tr>
      <td colspan="9"><strong>Nilai Rata-Rata <?= $rowB->ukes_b ?></strong></td>
      <td><strong><?= round($rtUkesC,2) ?></strong></td>
      <td colspan="5"></td>
    </tr>
    <?php
      $sumUkesB += $rtUkesC;
      $rtUkesB = $sumUkesB / count($dtUkesA);
    ?>
    <tr>
      <td colspan="15"></td>
    </tr>
  <?php endforeach ?>
    <tr>
      <td colspan="10"><strong>Nilai Rata-Rata <?= $rowA->ukes_a?></strong></td>
      <td><strong><?= round($rtUkesB,2) ?></strong></td>
      <td colspan="4"></td>
    </tr>
<?php endforeach ?>

