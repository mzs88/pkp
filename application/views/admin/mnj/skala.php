<div class="panel panel-default">
  <div class="panel-heading">
    <i class="fa fa-bar-chart-o fa-fw"></i>
    <div class="pull-right">
      <div class="btn-group">
        <button class="btn btn-primary btn-xs">Tambah</button>
      </div>
    </div>

  </div>
  <div class="panel-body">
    <table class="table table-bordered" id="tb_skl">
      <thead>
        <tr>
          <th rowspan="2" class="text-center">NO</th>
          <th rowspan="2" class="text-center">Jenis Variable</th>
          <th rowspan="2" class="text-center">Definisi Operasional</th>
          <th colspan="4" class="text-center">Skala</th>
          <th colspan="3" class="text-center">Deskripsi</th>
          <th rowspan="2" class="text-center">Opsi</th>
        </tr>
        <tr>
          <th class="text-center">Nilai 0</th>
          <th class="text-center">Nilai 4</th>
          <th class="text-center">Nilai 7</th>
          <th class="text-center">Nilai 10</th>
          <th class="text-center">Buat</th>
          <th class="text-center">Edit</th>
          <th class="text-center">Author</th>
        </tr>
      </thead>
      <tbody>
        <?php $ktgmnj = $this->loadskala->md_ktg(); $noa=1;?>
        <?php foreach($ktgmnj as $row):?>
          <tr class="bg-success">
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
            <td></td>
          </tr>
          <?php $vardo = $this->loadskala->md_skala($row->id_ktgmanaj); $noba=1; $nob=1;?>
          <?php foreach($vardo as $rowvardo):?>
            <tr class="">
              <td class="text-center"><?= ($noa - 1).".".$nob++?></td>
              <td><?= $rowvardo->mnj_var ?></td>
              <td><?= $rowvardo->mnj_do ?></td>
              <td><?= $rowvardo->nilai_0?></td>
              <td><?= $rowvardo->nilai_4?></td>
              <td><?= $rowvardo->nilai_7?></td>
              <td><?= $rowvardo->nilai_10?></td>
              <td><?= $rowvardo->create_date?></td>
              <td><?= $rowvardo->edit_date?></td>
              <td><?= $rowvardo->nama?></td>
              <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#skala<?= $rowvardo->id_manajvar ?>">Input</button></td>

              <!-- Modal -->
              <div class="modal fade" id="skala<?= $rowvardo->id_manajvar ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel"><?= $row->ktgmanaj ?></h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nilai 0</label>
                        <textarea name="nnol<?= $rowvardo->id_manajvar ?>" id="nnol<?= $rowvardo->id_manajvar ?>" class="form-control" rows="2" cols="80"><?= $rowvardo->nilai_0 ?></textarea>
                      </div>
                      <div class="form-group">
                        <label>Nilai 4</label>
                        <textarea name="n4<?= $rowvardo->id_manajvar ?>" id="n4<?= $rowvardo->id_manajvar ?>" class="form-control" rows="2" cols="80"><?= $rowvardo->nilai_4 ?></textarea>
                      </div>
                      <div class="form-group">
                        <label>Nilai 7</label>
                        <textarea name="n7<?= $rowvardo->id_manajvar ?>" id="n7<?= $rowvardo->id_manajvar ?>" class="form-control" rows="2" cols="80"><?= $rowvardo->nilai_7 ?></textarea>
                      </div>
                      <div class="form-group">
                        <label>Nilai 10</label>
                        <textarea name="n10<?= $rowvardo->id_manajvar ?>" id="n10<?= $rowvardo->id_manajvar ?>" class="form-control" rows="2" cols="80"><?= $rowvardo->nilai_10 ?></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-primary" id="saveskala<?= $rowvardo->id_manajvar ?>">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.modal -->

              <script type="text/javascript">
                $('#saveskala<?=$rowvardo->id_manajvar?>').click(function(){
                  var nnol    = $('#nnol<?= $rowvardo->id_manajvar ?>').val();
                  var npat    = $('#n4<?= $rowvardo->id_manajvar ?>').val();
                  var ntu   = $('#n7<?= $rowvardo->id_manajvar ?>').val();
                  var nluh    = $('#n10<?= $rowvardo->id_manajvar ?>').val();
                  $.ajax({
                    type  : 'POST',
                    data  : {'nnol'     :nnol,
                              'npat'    :npat,
                              'ntu'     :ntu,
                              'nluh'    :nluh,
                              'id'      :'<?= $rowvardo->idmnj_nilai ?>',
                              'idmnj'   :'<?= $rowvardo->id_manajvar ?>',
                              'idop'    :'<?= $this->session->userdata('idop');?>'},
                    url   : '<?= base_url() ?>admin/mnj/dataskala/save',
                    success :function(){
                      location.reload();
                    }
                  });
                })
              </script>


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
      $('#tb_skl').DataTable();
    })
  </script>
