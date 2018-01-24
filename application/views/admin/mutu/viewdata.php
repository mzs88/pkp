<div class="panel panel-default">
  <div class="panel-heading"></div>
  <div class="panel-body">
    <table class="table table-hover talbe-striped" id="tb_mutu">
      <thead>
        <tr>
          <th class="text-center" rowspan="2">NO</th>
          <th width="200" class="text-center" rowspan="2">Jenis Variable</th>
          <th width="200" class="text-center" rowspan="2">Definisi Oprasional</th>
          <th width="200" class="text-center" rowspan="2">Cara Penghitungan</th>
          <th class="text-center" rowspan="2">Target</th>
          <th class="text-center" rowspan="2">Total</th>
          <th class="text-center" rowspan="2">Capaian</th>
          <th class="text-center" rowspan="2">% Capaian</th>
          <th class="text-center" rowspan="2">Analisa</th>
          <th class="text-center" rowspan="2">Tindak Lanjut</th>
          <th class="text-center" colspan="2">Revisi</th>
          <th class="text-center" rowspan="2">Opsi</th>
        </tr>
        <tr>
          <th class="text-center">Tanggal</th>
          <th class="text-center">Comments</th>
        </tr>

      </thead>

      <tbody>
        <?php $ukka = $this->loaddata->mdl_varmutu($idpkms); $noa=1;?>
        <?php foreach($ukka as $row):?>
          <tr>
            <td><?= $noa++; ?></td>
            <td><?= $row->variable ?></td>
            <td><?= $row->operasional ?></td>
            <td><?= $row->penghitungan ?></td>
            <td class="text-center"><?= $row->op.$row->target ?> %</td>
            <td><?= $row->total ?></td>
            <td><?= $row->capaian  ?></td>
            <td><?= $row->capaian/$row->total*100  ?></td>
            <td><?= $row->analisa ?></td>
            <td><?= $row->tndk_lnjt ?></td>
            <td><?= $row->rev_date ?></td>
            <input type="hidden" name="idmtrkp" id="idmtrkp" value="<?= $row->idmt_rekap?>">
            <td><textarea name="cmt" id="cmt" cols="" rows="1" class="form-control"><?= $row->comments ?></textarea></td>
            <td class="text-center"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mutu<?= $row->idmt_op_htng ?>">Revisi</button></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <div class="panel-footer"></div>
</div>

<script type="text/javascript">
  $(document).ready(function()
  {

    $('#tb_mutu').DataTable();

    $('button').on('click',function()
    {
      var idmtrkp = $(this).closest('tr').find('#idmtrkp').val();
      var cmt = $(this).closest('tr').find('#cmt').val();

      console.log('Id Mt rekap : '+idmtrkp+', coment : '+cmt);
    })
  })
</script>