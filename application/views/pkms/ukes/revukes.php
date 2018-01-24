<table class="table">
  <thead>
    <tr>
      <th rowspan="2" class="text-center">NO</th>
      <th rowspan="2" class="text-center" width="200">UKK</th>
      <th rowspan="2" class="text-center">Target Tahun <?= date("Y") ?> %</th>
      <th rowspan="2" class="text-center">Satuan Sasaran</th>
      <th rowspan="2" class="text-center" width="50">Total</th>
      <th rowspan="2" class="text-center" width="50">Target</th>
      <th rowspan="2" class="text-center" width="50">Pencapaian</th>
      <th rowspan="2" class="text-center">Riil</th>
      <th rowspan="2" class="text-center">Variable</th>
      <th rowspan="2" class="text-center">Var Total</th>
      <th rowspan="2" class="text-center">Analisa d</th>
      <th rowspan="2" class="text-center">Tindak lanjut</th>
      <th colspan="2" class="text-center">Revisi</th>
      <th rowspan="2" class="text-center">Opsi</th>
    </tr>
    <tr>
      <th>Tanggal</th>
      <th>Coments</th>
    </tr>
  </thead>
  <tbody>
    <?php $ukka = $this->loadrev->mdl_ukesa($idpkms,$date,$thn); $noa=1;?>
    <?php foreach($ukka as $rowA):?>
      <tr class="bg-success">
        <td><?= $noa++; ?></td>
        <td colspan="8"><?= $rowA->ukes_a ?></td>
        <td class="text-center" id="varA"><?= $rowA->nilai ?></td>
        <td><?= $rowA->analisa ?></td>
        <td><?= $rowA->tindak_lanjut ?></td>
        <td><?= $rowA->rev_date ?></td>
        <td><?= $rowA->coments ?></td>
        <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ukesa<?= $rowA->idukes_a ?>">Input</button></td>
      </tr>
      <?php $ukkb = $this->loadrev->mdl_ukesb($rowA->idukes_a, $idpkms, $date); $noba=1; $nob=1;?>
      <?php foreach($ukkb as $rowB):?>
        <tr class="bg-info">
          <td><?= ($noa - 1).".".$nob++?></td>
          <td colspan="8"><?= $rowB->ukes_b ?></td>
          <td class="text-center" id="varB"><?= $rowB->nilai ?></td>
          <td><?= $rowB->analisa ?></textarea></td>
          <td><?= $rowB->tindak_lanjut?></textarea></td>
          <td><?= $rowB->rev_date ?></td>
          <td><?= $rowB->coments ?></td>
          <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ukesb<?= $rowB->idukes_b ?>">Input</button></td>
        </tr>
        <?php $c=0; $ukkc = $this->loadrev->mdl_ukesc($rowB->idukes_b,$idpkms, $date); $noc=1?>
        <?php foreach($ukkc as $rowC):?>
          <tr class="bg-warning" id="tr-varC">
            <td><?= ($noa-1).".".($nob-1).".".$noc++?></td>
            <td colspan="7"><?= $rowC->ukes_c ?></td>
            <td class="text-center" id="varC"><?= $rowC->nilai ?></td>
            <td></td>
            <td><?= $rowC->analisa ?></td>
            <td><?= $rowC->tindak_lanjut ?></td>
            <td><?= $rowC->rev_date ?></td>
            <td><?= $rowC->coments ?></td>
            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ukesc<?= $rowC->idukes_c ?>">Input</button></td>
          </tr>
          <?php $d=0; $ukkd = $this->loadrev->mdl_ukesd($rowC->idukes_c, $idpkms, $date); $nod=1?>
          <?php foreach($ukkd as $rowD):?>
            <tr id="tr-riil">
              <td><?= ($noa-1).".".($nob-1).".".($noc-1).".".$nod++?></td>
              <td><?= $rowD->ukes_d ?></td>
              <td><?= $rowD->op." ".$rowD->nilai ?></td>
              <td><?= $rowD->sasaran ?></td>
              <input type="hidden" name="idssrn<?= $rowD->idukes_d ?>" id="idssrn<?= $rowD->idukes_d ?>" value="<?= $rowD->id_sasaran ?>">
              <td id="total"><?= $rowD->total ?></td>
              <td id="target"><?= $rowD->target ?></td>
              <td id="pencapaian"><?= $rowD->pencapaian ?></td>
              <td class="text-center" id="riil"><?= $rowD->riil ?></td>
              <?= $this->session->set_flashdata('count', count($ukkd));?>
              <?= $this->session->set_flashdata('riil', $d += $rowD->riil); ?>
              <td></td>
              <td></td>
              <td><?= $rowD->analisa ?></td>
              <td><?= $rowD->tindak_lanjut ?></td>
              <td><?= $rowD->rev_date ?></td>
              <td><?= $rowD->coments ?></td>
              <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ukesd<?= $rowD->idukes_d ?>">Input</button></td>
            </tr>
          <?php endforeach ?>
        <?php endforeach ?>
      <?php endforeach ?>
    <?php endforeach ?>
  </tbody>
</table>