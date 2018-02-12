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

  $sumRkpA = 0;
  $rtRkpA = 0;
  $rilRkpA = 0;

  $rilMnj = 0;
  $sumMnj = 0;
  $rtMnj = 0;

  $data = array();

  for ($i=1; $i <=12 ; $i++) {

    foreach ($ukesChartA as $rca)
    {

      $b = $this->m_chart_pkms->ukesChartB($rca->idukes_a)->result();
      foreach ($b as $rcb)
      {

        $c = $this->m_chart_pkms->ukesChartC($rcb->idukes_b)->result();
        foreach ($c as $rcc)
        {
          $d = $this->m_chart_pkms->ukesChartD($rcc->idukes_c, $pkms, $i, $thn)->result();
          foreach ($d as $rcd)
          {
            $rilUkesC = @($rcd->pencapaian / $rcd->total) * 100;
            // echo "<div style='background-color:orange'>";
            // echo "<hr><tr class='bg-warning'><td> rilUkesC : ".round(is_nan($rilUkesC) ? 0 : $rilUkesC,2)."</td></tr><br><hr>";
            // echo "</div>";
            // echo monthToName($rcd->bln)."\n";
            $sumUkesC += is_nan($rilUkesC) ? 0 : $rilUkesC;
            $rtUkesC  = $sumUkesC / count($d); // Nilai rata rata ukes C
          }

          // echo "<div style='background-color:blue'><hr><tr><td> rtUkesC : ".round($rtUkesC,2)."</td></tr><br><hr></div>";

          $sumUkesB += $rtUkesC;
          $sumUkesC = 0;
          $rtUkesC = 0;
          $rtUkesB  = $sumUkesB / count($c); // Nilai rata rata ukes B
        }
        // echo "<div style='background-color:#DAF7A6'><hr><tr><td> rtUkesB : ".round($rtUkesB,2)."</td></tr><br><hr></div>";

        $rilRkpA = $rtUkesB * $rcb->bobot;
        $sumRkpA  += $rilRkpA;
        $sumUkesB = 0;
        $rtUkesC = 0;
        $rtRkpA   = $sumRkpA / count($b);
      }
        // echo "<div style='background-color:#FFC300'><hr><tr><td> rtRkpA : ".round($rtRkpA,2)."</td></tr><br><hr></div>";
      // echo $rca->ukes_a." : ".round($rtRkpA,2)."<br>";
        // echo "<hr>";

      $totalUkes += $rtRkpA;
      $sumRkpA   = 0;

    }
      $rtRkpA    = 0;

    // hitungan ukes =====================================================
    // hitungan manajemen ===================================================
    $mnj = $this->m_chart_pkms->loadDataManajChart($pkms, $i, $thn)->result();
    foreach($mnj as $rwm)
    {
      $rilMnj = @($rwm->hasil * $rwm->bobot);
      $sumMnj += is_nan($rilMnj) ? 0 : $rilMnj;
      $rtMnj  = $sumMnj / count($mnj);
    }
    // hitungan manajemen ===================================================

    // hitungan mutu ====================================================
    foreach($ktgMutu as $rowDt)
    {
      $var = $this->m_chart_pkms->loadRekapMutuChart($rowDt->idmt_ktg, $pkms, $i, $thn)->result();
      foreach ($var as $rwv)
      {
        $cpain   = @($rwv->total / $rwv->capaian) * 100;
        $sumMutu += is_nan($cpain) ? 0 : $cpain ;
        // echo "<tr><td>".$sumMutuA."</td></tr>";
      }

      $rilMutu    = @($sumMutu * $rowDt->bobot);
      $sumMutu    = 0;
      $sumRilMutu += is_nan($rilMutu) ? 0 : $rilMutu;
      $rtMutu     = $sumRilMutu / count($ktgMutu);

    }
    // hitungan mutu ====================================================
    // echo "<tr><td>".$rtMutu."</td></tr>";
    $total = round($totalUkes + $rtMnj + $rtMutu,2);
    // echo "<div style='background-color:#FF5733'><hr><tr><td>".monthToName($i)." : ".$total."</td></tr><hr></div>";
    // echo "<hr>";
    $data[] = array('x'=> monthToName($i), 'y'=>$total);
    // $data[] = array('x'=> $i, 'y'=>$total);
    $sumRilMutu = 0;
    $sumMutu    = 0;
    $total      = 0;
    $totalUkes  = 0;
    $rtMnj      = 0;
    $rtMutu     = 0;
  }
    echo json_encode($data);

    // foreach($ukesRkpA as $rowA)
    // {
    //     $b = $this->m_chart_pkms->ukesRkpB($rowA->idukes_a)->result();
    //     foreach($b as $rowB)
    //     {
    //       $c = $this->m_chart_pkms->ukesRkpC($rowB->idukes_b)->result();
    //       foreach($c as $rowC)
    //       {
    //         $d = $this->m_chart_pkms->ukesRkpD($rowC->idukes_c, $rwp->id_pkms, $bln, $thn)->result();
    //         foreach($d as $rowD)
    //         {
    //           $rilUkesC = $rowD->pencapaian / $rowD->total * 100;
    //           // echo "<tr class='bg-warning'><td>".$nd++."</td><td>".round($rilUkesC,2)."</td></tr>";
    //           $sumUkesC += $rilUkesC;
    //           $rtUkesC = $sumUkesC / count($d); // Nilai rata rata ukes C
    //         }
    //           $nd=1;
    //         // echo "<tr><td colspan='5'> Ukes C ".round($rtUkesC,2)."</td></tr>";
    //         $sumUkesB += $rtUkesC;
    //         $sumUkesC = 0;
    //         $rtUkesB = $sumUkesB / count($c); // Nilai rata rata ukes B
    //       }
    //       // echo "<tr class='bg-primary'><td colspan='5'> Ukes B ".round($rtUkesB,2)."</td></tr>";
    //       // $sumUkesA += $rtUkesB;
    //       // $sumUkesB = 0;
    //       // $rtUkesB  = 0;
    //       // $rilUkesB = 0;
    //       // $rtlUkesA = $sumUkesA / count($b); // Nilai rata rata ukes A
    //       $rilRkpA = $rtUkesB * $rowB->bobot;
    //       // echo "<tr><td>".round($rilRkpA)."</td></tr>";
    //       $sumRkpA += $rilRkpA;
    //       $sumUkesB = 0;
    //       $rtRkpA = $sumRkpA / count($b);
    //     }
    //       $totalUkes += $rtRkpA;
    //       // echo "<tr><td>".round($totalUkes)."</td></tr>";
    // }

    // // data menajemen =========================================================

    // $mnj = $this->m_chart_pkms->loadDataManaj($pkms, $bln, $thn)->result();
    // foreach($mnj as $rwm)
    // {
    //   $rilMnj = $rwm->hasil * $rwm->bobot;
    //   $sumMnj += $rilMnj;
    //   $rtMnj = $sumMnj / count($mnj);
    // }

    // // data mutu ==============================================================

    // foreach($ktgMutu as $rowDt)
    // {
    //   $var = $this->m_chart_pkms->loadRekapMutu($rowDt->idmt_ktg, $pkms, $bln, $thn)->result();
    //   foreach ($var as $rwv)
    //   {
    //     $cpain = $rwv->total / $rwv->capaian * 100;
    //     $sumMutu += $cpain;
    //     // echo "<tr><td>".$sumMutuA."</td></tr>";
    //   }

    //   $rilMutu = $sumMutu * $rowDt->bobot;
    //   $sumMutu = 0;
    //   $sumRilMutu += $rilMutu;
    //   $rtMutu = $sumRilMutu / count($ktgMutu);

    // }

    // // puskesmas =============================================================
    // $sumRilMutu = 0; $sumMutu = 0;
    // // echo "<tr><td>".$rtMutu."</td></tr>";
    // $total = round($totalUkes + $rtMnj + $rtMutu,2);
    // $data[] = array('x'=> $bln, 'y'=>$total);
    // echo json_encode($data);
?>