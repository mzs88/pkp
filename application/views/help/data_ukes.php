<?php
  $sumUkesC = 0;
  $rtUkesC = 0;
  $rilUkesC = 0;
  $arilUkesC = 0;

  $sumUkesB = 0;
  $rtUkesB  = 0;
  $rilUkesB = 0;

  $sumUkesA = 0;
  $rtlUkesA = 0;
  $rilUkesA = 0;

  $nd = 1;
?>
<?php $noa=1;?>
<?php foreach($dtUkesA as $rowA):?>
  <?php
    $b = $this->m_data_ukes->loadUkesB($rowA->idukes_a);
    foreach($b as $rowB)
    {
      $c = $this->m_data_ukes->loadUkesC($rowB->idukes_b);
      foreach($c as $rowC)
      {
        $d = $this->m_data_ukes->loadNilaiUkes($rowC->idukes_c, $pkms, $bln, $thn)->result();
        foreach($d as $rowD)
        {
          $rilUkesC = @($rowD->pencapaian / $rowD->total) * 100;
          // echo "<tr class='bg-warning'><td>".$nd++."</td><td>".$rowD->pencapaian."-".$rowD->total."</td></tr>";
          if(is_nan($rilUkesC))
          {
            $rilUkesC = 0;
          }
          else
          {
            $sumUkesC += $rilUkesC;
            $rtUkesC = $sumUkesC / count($d); // Nilai rata rata ukes C
          }
        }
          $nd=1;
        // echo "<tr><td colspan='5'> Ukes C ".round($rtUkesC,2)."</td></tr>";
        $sumUkesB += $rtUkesC;
        $sumUkesC = 0;
        $rtUkesB = $sumUkesB / count($c); // Nilai rata rata ukes B
      }
      // echo "<tr class='bg-primary'><td colspan='5'> Ukes B ".round($rtUkesB,2)."</td></tr>";
      $sumUkesA += $rtUkesB;
      $sumUkesB = 0;
      // $rtUkesB  = 0;
      // $rilUkesB = 0;
      $rtlUkesA = $sumUkesA / count($b); // Nilai rata rata ukes A
    }
  ?>
  <tr class="bg-success">
    <td><?= $noa++; ?></td>
    <td colspan="8"><strong><?= $rowA->ukes_a?></strong></td>
    <td class="text-center"><strong><?= round($rtlUkesA,2) ?></strong></td>
    <td colspan="4"></td>
  </tr>
  <?php $sumUkesA = 0; ?>

  <!-- ============================================= -->

  <?php $ukkb = $this->m_data_ukes->loadUkesB($rowA->idukes_a); $noba=1; $nob=1;?>
  <?php foreach($ukkb as $rowB):?>
    <?php
      $c = $this->m_data_ukes->loadUkesC($rowB->idukes_b);
      foreach($c as $rowC)
      {
        $d = $this->m_data_ukes->loadNilaiUkes($rowC->idukes_c, $pkms, $bln, $thn)->result();
        foreach($d as $rowD)
        {
          $rilUkesC = @($rowD->pencapaian / $rowD->total) * 100;
          //echo "<tr class='bg-warning'><td>".round($rilUkesC,2)."</td></tr>";
          if (is_nan($rilUkesC)) {
            $rilUkesC = 0;
          }
          $sumUkesC += $rilUkesC;
          $rtUkesC = $sumUkesC / count($d); // Nilai rata rata ukes C
        }
        //echo "<tr><td colspan='5'> Ukes C ".round($rtUkesC,2)."</td></tr>";
        $sumUkesB += $rtUkesC;
        $sumUkesC = 0;
        //$rtUkesC = 0;
        //$rilUkesC = 0;
        $rtUkesB = $sumUkesB / count($c); // Nilai rata rata ukes B
      }
    ?>
    <tr class="bg-info">
      <td><?= ($noa - 1).".".$nob++?></td>
      <td colspan="8"><strong><?= $rowB->ukes_b ?></strong></td>
      <td class="text-center"><strong><?= round($rtUkesB,2) ?></strong></td>
      <td colspan="4"></td>
    </tr>
    <<?php $sumUkesB = 0; $rtUkesB = 0; ?>
    <!-- ==================================================== -->

    <?php $c=0; $ukkc = $this->m_data_ukes->loadUkesC($rowB->idukes_b); $noc=1?>
    <?php foreach($ukkc as $rowC):?>
      <?php
        $d = $this->m_data_ukes->loadNilaiUkes($rowC->idukes_c, $pkms, $bln, $thn)->result();
        foreach($d as $rowD)
        {
          $rilUkesC = @($rowD->pencapaian / $rowD->total) * 100;
          // echo "<tr class='bg-warning'><td>".round($rilUkesC,2)."</td></tr>";
          if (is_nan($rilUkesC)) {
            $rilUkesC = 0;
          }
          $sumUkesC += $rilUkesC;
          $rtUkesC = $sumUkesC / count($d);
        }
      ?>
      <tr>
        <td colspan="15"></td>
      </tr>
      <tr class="bg-warning" id="tr-varC">
        <td><?= ($noa-1).".".($nob-1).".".$noc++?></td>
        <td colspan="7"><strong>Nilai Rata-Rata <?= $rowC->ukes_c ?></strong></td>
        <td class="text-center"><strong><?= round($rtUkesC,2) ?></strong></td>
        <td colspan="6"></td>
      </tr>
      <?php $sumUkesC=0; $rtUkesC = 0 ; ?>

      <!-- ========================================================== -->

      <?php $d=0; $ukkd = $this->m_data_ukes->loadNilaiUkes($rowC->idukes_c, $pkms, $bln, $thn)->result(); $nod=1?>
      <?php foreach($ukkd as $rowD):?>
        <tr>
          <td><?= ($noa-1).".".($nob-1).".".($noc-1).".".$nod++?></td>
          <td id="ukes_d<?= $rowD->idukes_d ?>"><?= $rowD->ukes_d ?></td>
          <td class="text-center"><?= $rowD->op." ".$rowD->nilai ?></td>
          <td><?= $rowD->sasaran ?></td>
          <input type="hidden" name="idssrn<?= $rowD->idukes_d ?>" id="idssrn<?= $rowD->idukes_d ?>" value="<?= $rowD->id_sasaran ?>">
          <td class="text-center"><?= $rowD->total ?></td>
          <td class="text-center"><?= $rowD->target ?></td>
          <td class="text-center"><?= $rowD->pencapaian ?></td>
          <?php
            $arilUkesC = @($rowD->pencapaian / $rowD->total) * 100;
            if (is_nan($arilUkesC)) {
              $arilUkesC = 0;
            }
          ?>

          <td><?= round($arilUkesC,2) ?></td>
          <td colspan="2"></td>
          <td><?= $rowD->analisa ?></td>
          <td><?= $rowD->tindak_lanjut ?></td>
          <td colspan="2"></td>
          <!-- <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ukesd<?= $rowD->idukes_d ?>">Input</button></td> -->
        </tr>
      <?php endforeach ?>
    <?php endforeach ?>
  <?php endforeach ?>
<?php endforeach ?>


