<?php
  $sumKtg = 0;
  $sumTot = 0;
?>
<?php $noa=1; foreach($ktgmnj as $row):?>
  <tr class="bg-success">
    <td class="text-center"><?= $noa++; ?></td>
    <td colspan="10"><?= $row->ktgmanaj ?></td>
  </tr>
  <?php $varNiEv = $this->m_data_mnj->loadVarNiEv($row->id_ktgmanaj,$idpkms, $bln, $thn)->result(); $noba=1; $nob=1;?>
  <?php foreach($varNiEv as $rowVarNiEv):?>
    <tr>
      <td class="text-center"><?= ($noa - 1).".".$nob++?></td>
      <td><?= $rowVarNiEv->mnj_var ?></td>
      <td><?= $rowVarNiEv->mnj_do ?></td>
      <td><?= $rowVarNiEv->nilai_0 ?></td>
      <td><?= $rowVarNiEv->nilai_4 ?></td>
      <td><?= $rowVarNiEv->nilai_7 ?></td>
      <td><?= $rowVarNiEv->nilai_10 ?></td>
      <td class="text-center"><?= $rowVarNiEv->hasil ?></td>
      <td><?= $rowVarNiEv->coments?></td>
      <td><?= $rowVarNiEv->rev_date?></td>
      <td><button id="btnnilai" class="btn btn-sm btn-primary">Update</button></td>
    </tr>
    <?php $sumKtg += $rowVarNiEv->hasil ?>
  <?php endforeach ?>
  <tr class="bg-warning">
    <td colspan="7"><strong><?= $row->ktgmanaj ?></strong></td>
    <td class="text-center"><strong><?= $sumKtg ?></strong></td>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td colspan="11"></td>
  </tr>
  <?php $sumTot += $sumKtg; ?>
  <?php $sumKtg = 0; ?>
<?php endforeach ?>
<tr>
  <td colspan="7"><strong>TOTAL NILAI KINERJA MANAJEMEN  (I s/d XII)</strong></td>
  <td colspan=""><strong><?= $sumTot ?></strong></td>
  <td colspan="3"></td>
</tr>