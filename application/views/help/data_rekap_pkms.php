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

	$sumMutu = 0;
	$rilMutu = 0;
	$rtMutu = 0;
	$sumRilMutu = 0;

	$sumMutuA = 0;
	$rilMutuA = 0;
	$rtMutuA = 0;
	$sumRilMutuA = 0;

  $totalUkes = 0;

  $noa=1;
  $nomnj = 1;
  $no = 4;

  $sumRkpA = 0;
  $rtRkpA = 0;
  $rilRkpA = 0;

  $rilMnj = 0;
  $sumMnj = 0;
  $rtMnj = 0;
?>

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
    <td id="ukesA" colspan="2"><strong><?= $rowA->ukes_a?></strong></td>
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
<?php
  foreach($ktgMutu as $rowDt)
  {
    $var = $this->m_data_rekap->loadRekapMutu($rowDt->idmt_ktg, $pkms, $bln, $thn)->result();
    foreach ($var as $rwv)
    {
      $cpain = $rwv->total / $rwv->capaian * 100;
      $sumMutu += $cpain;
      // echo "<tr><td>".$sumMutuA."</td></tr>";
    }

    $rilMutu = $sumMutu * $rowDt->bobot;
    $sumMutu = 0;
    $sumRilMutu += $rilMutu;
    $rtMutu = $sumRilMutu / count($ktgMutu);

  }
  // echo "<tr><td>".$rtMutu."</td></tr>";
?>
<tr class="bg-success">
  <td><strong>5</strong></td>
  <td colspan="2"><strong>MUTU</strong></td>
  <td class="text-center">0</td>
  <td></td>
  <td class="text-center"><?= round($rtMutu,2) ?></td>
</tr>
<?php //$sumRilMutu = 0; $sumMutu = 0;?>

<?php foreach($ktgMutu as $rowDt): ?>
<?php
  $var = $this->m_data_rekap->loadRekapMutu($rowDt->idmt_ktg, $pkms, $bln, $thn)->result();
  foreach ($var as $rwv)
  {
    $cpain = $rwv->total / $rwv->capaian * 100;
    $sumMutu += $cpain;
  }

  $rilMutu = $sumMutu * $rowDt->bobot;
?>
  <tr>
    <td><?= $no++; ?></td>
    <td colspan=""><?= $rowDt->mtktg ?></td>
    <td class="text-center"><?= round($sumMutu,2) ?></td>
    <td class="text-center"><?= $rowDt->bobot ?></td>
    <td class="text-center"><?= round($rilMutu,2) ?></td>
  </tr>

<?php $sumRilMutu = 0; $sumMutu = 0;?>
<?php endforeach ?>
<!-- penilaian mutu -->

<tr class="bg-danger">
  <td colspan="5"><strong>Total</strong></td>
  <td class="text-center"><?= round($totalUkes + $rtMnj + $rtMutu,2) ?></td>
</tr>