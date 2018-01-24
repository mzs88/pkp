<table class="table">
  <thead>
    <tr>
      <th class="text-center">NO</th>
      <th class="text-center" width="200">UKK</th>
      <th class="text-center">Target Tahun <?= date("Y") ?> %</th>
      <th class="text-center">Satuan Sasaran</th>
      <th class="text-center" width="50">Total</th>
      <th class="text-center" width="50">Target</th>
      <th class="text-center" width="50">Pencapaian</th>
      <th class="text-center">Riil</th>
      <th class="text-center">Variable</th>
      <th class="text-center">Var Total</th>
      <th class="text-center">Analisa d</th>
      <th class="text-center">Tindak lanjut</th>
      <th class="text-center">Comments</th>
      <th class="text-center">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php $ukka = $this->dataload->dtukesa($idpkms,$bln); $noa=1;?>
    <?php foreach($ukka as $rowA):?>
      <tr class="bg-success">
        <td><?= $noa++; ?></td>
        <td colspan="8"><?= $rowA->ukes_a ?></td>
        <td class="text-center" id="varA"><?= $rowA->nilai ?></td>
        <td><?= $rowA->analisa ?></td>
        <td><?= $rowA->tindak_lanjut ?></td>
        <td><textarea name="comments" id="comment" cols="" rows="1" class="form-control"></textarea></td>
        <input type="hidden" name="idanalisa" id="idanalisa" value="<?= $rowA->idanalisa_a ?>">
        <input type="hidden" name="ideva" id="ideva" value="<?= $rowA->ideva_a ?>">
        <input type="hidden" name="ideva" id="field" value="ideva_a">
        <input type="hidden" name="ideva" id="fana" value="idanalisa_a">
              <input type="hidden" name="ideva" id="tb" value="eva_a">
        <td><button class="btn btn-danger btn-sm">save</button></td>
      </tr>
      <?php $ukkb = $this->dataload->mdl_ukesb($rowA->idukes_a, $idpkms, $bln); $noba=1; $nob=1;?>
      <?php foreach($ukkb as $rowB):?>
        <tr class="bg-info">
          <td><?= ($noa - 1).".".$nob++?></td>
          <td colspan="8"><?= $rowB->ukes_b ?></td>
          <td class="text-center" id="varB"><?= $rowB->nilai ?></td>
          <td><?= $rowB->analisa ?></textarea></td>
          <td><?= $rowB->tindak_lanjut?></textarea></td>
          <td><textarea name="comments" id="comment" cols="" rows="1" class="form-control"></textarea></td>
          <input type="hidden" name="ideva" id="ideva" value="<?= $rowB->ideva_b ?>">
          <input type="hidden" name="idanalisa" id="idanalisa" value="<?= $rowB->idanalisa_b ?>">
          <input type="hidden" name="ideva" id="field" value="ideva_b">
          <input type="hidden" name="ideva" id="fana" value="idanalisa_b">
              <input type="hidden" name="ideva" id="tb" value="eva_b">
          <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ukesb<?= $rowB->idukes_b ?>">Input</button></td>
        </tr>
        <?php $c=0; $ukkc = $this->dataload->mdl_ukesc($rowB->idukes_b,$idpkms, $bln); $noc=1?>
        <?php foreach($ukkc as $rowC):?>
          <tr class="bg-warning" id="tr-varC">
            <td><?= ($noa-1).".".($nob-1).".".$noc++?></td>
            <td colspan="7"><?= $rowC->ukes_c ?></td>
            <td class="text-center" id="varC"><?= $rowC->nilai ?></td>
            <td></td>
            <td><?= $rowC->analisa ?></td>
            <td><?= $rowC->tindak_lanjut ?></td>
            <input type="hidden" name="ideva" id="ideva" value="<?= $rowC->ideva_c ?>">
            <input type="hidden" name="idanalisa" id="idanalisa" value="<?= $rowC->idanalisa_c ?>">
            <input type="hidden" name="ideva" id="field" value="ideva_c">
            <input type="hidden" name="ideva" id="fana" value="idanalisa_c">
              <input type="hidden" name="ideva" id="tb" value="eva_c">
            <td><textarea name="comments" id="comment" cols="" rows="1" class="form-control"></textarea></td>
            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ukesc<?= $rowC->idukes_c ?>">Input</button></td>
          </tr>
          <?php $d=0; $ukkd = $this->dataload->mdl_ukesd($rowC->idukes_c, $idpkms, $bln); $nod=1?>
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
              <input type="hidden" name="ideva" id="ideva" value="<?= $rowD->ideva_pkp ?>">
              <input type="hidden" name="idanalisa" id="idanalisa" value="<?= $rowD->idnilai_pkp ?>">
              <input type="hidden" name="ideva" id="field" value="ideva_pkp">
              <input type="hidden" name="ideva" id="fana" value="idnilai_pkp">
              <input type="hidden" name="ideva" id="tb" value="eva_pkp">
              <td><?= $rowD->analisa ?></td>
              <td><?= $rowD->tindak_lanjut ?></td>
              <td><textarea name="comments" id="comment" cols="" rows="1" class="form-control"></textarea></td>
              <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ukesd<?= $rowD->idukes_d ?>">Input</button></td>
            </tr>
          <?php endforeach ?>
        <?php endforeach ?>
      <?php endforeach ?>
    <?php endforeach ?>
  </tbody>
</table>
Id Operator : <?php echo $this->session->userdata('idop'); ?>

<script type="text/javascript">

  $(document).ready(function()
  {
    $('button').on('click',function()
    {
      var cmt = $(this).closest('tr').find('textarea').val();
      var id = $(this).closest('tr').find('#idanalisa').val();
      var ideva = $(this).closest('tr').find('#ideva').val();
      var field = $(this).closest('tr').find('#field').val();
      var fana = $(this).closest('tr').find('#fana').val();
      var table = $(this).closest('tr').find('#tb').val();
      console.log('Revisi : '+cmt+'Id analisa :'+id+' Id Evaluasi : '+ideva);

      $.ajax(
      {
        type:'post',
        data:
        {
          id:id,
          ideva:ideva,
          cmt:cmt,
          field:field,
          fana:fana,
          table:table
        },
        url:base_url+"admin/ukes/page/saveeva",
        success:function(data)
        {
          alertify.set('notifier','position','top-center');
          alertify.success('Data berhasil diproses');
        }
      })
    })
  })
</script>