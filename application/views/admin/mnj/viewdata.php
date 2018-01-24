  <div class="panel panel-default">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
      <table class="table table-bordered" id="tb-mj">
        <thead>
          <tr>
            <th rowspan="2" class="text-center">NO</th>
            <th rowspan="2" class="text-center" width="200">Jenis Variable</th>
            <th rowspan="2" class="text-center" width="200">Definisi Operasional</th>
            <th colspan="4" class="text-center" width="200">Skala</th>
            <th rowspan="2" class="text-center" width="75">Nilai Hasil</th>
            <th rowspan="2" class="text-center">Comments</th>
            <th rowspan="2" class="text-center">Opsi</th>
          </tr>
          <tr>
            <th class="text-center" width="100">Nilai 0</th>
            <th class="text-center" width="100">Nilai 4</th>
            <th class="text-center" width="100">Nilai 7</th>
            <th class="text-center" width="100">Nilai 10</th>
          </tr>
        </thead>
        <tbody>
          <?php $ktgmnj = $this->loadpenilaian->mdl_mnjktg(); $noa=1; $sum=0;?>
          <?php foreach($ktgmnj as $row):?>
            <tr class="bg-danger">
              <td class="text-center"><?= $noa++; ?></td>
              <td><?= $row->ktgmanaj ?></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <?php $vardo = $this->loadpenilaian->mdl_rev($row->id_ktgmanaj,$idpkms); $noba=1; $nob=1;?>
            <?php foreach($vardo as $rowvardo):?>
              <tr class="">
                <td class="text-center"><?= ($noa - 1).".".$nob++?></td>
                <td><?= $rowvardo->mnj_var ?></td>
                <td><?= $rowvardo->mnj_do ?></td>
                <td><?= $rowvardo->nilai_0?></td>
                <td><?= $rowvardo->nilai_4?></td>
                <td><?= $rowvardo->nilai_7?></td>
                <td><?= $rowvardo->nilai_10?></td>
                <input type="hidden" id="idmnjrkp" value="<?= $rowvardo->idmanaj_penilaian ?>">
                <td class="text-center"><?= $rowvardo->hasil ?></td>
                <td><textarea name="cmt" id="cmt" cols="" rows="5" class="form-control"><?= $rowvardo->coments?></textarea></td>
                <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#skala<?= $rowvardo->id_manajvar ?>">Revisi</button></td>
              </tr>
            <?php endforeach ?>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>

<script type="text/javascript">
$(document).ready(function()
{
  $('#tb-mj').DataTable();

  $('button').on('click',function()
  {
    var cmt = $(this).closest('tr').find('#cmt').val();
    var idrkp = $(this).closest('tr').find('#idmnjrkp').val();

    $.ajax(
    {
      url:base_url+"admin/mnj/Datapenilaian/saveEva",
      type:'post',
      data:{id:idrkp,cmt:cmt,idop:idop,rev:1},
      success:function(data)
      {
        alertify.set('notifier','position','top-center');
        alertify.success("Data berhasil di prosess");
      },
      error:function(jqXHR, textStatus, errorThrown)
      {
        alertify.set('notifier','position','top-center');
        alertify.error("Data Error");
      }
    })


    console.log('Id Rekap : '+idrkp+' Comments : '+cmt);

  })
});
</script>