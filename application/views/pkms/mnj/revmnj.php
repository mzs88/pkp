<div class="row">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th rowspan="2" class="text-center">NO</th>
        <th rowspan="2" class="text-center">Jenis Variable</th>
        <th rowspan="2" class="text-center">Definisi Operasional</th>
        <th colspan="4" class="text-center">Skala</th>
        <th rowspan="2" class="text-center" width="75">Nilai Hasil</th>
        <th colspan="2" class="text-center">Revisi</th>
        <th rowspan="2" class="text-center">Opsi</th>
      </tr>
      <tr>
        <th class="text-center">Nilai 0</th>
        <th class="text-center">Nilai 4</th>
        <th class="text-center">Nilai 7</th>
        <th class="text-center">Nilai 10</th>
        <th class="text-center">Coments</th>
        <th class="text-center">Tanggal</th>
      </tr>
    </thead>

    <tbody>
      <?php $ktgmnj = $this->loadrev->mdl_mnjktg(); $noa=1;?>
      <?php foreach($ktgmnj as $row):?>
        <tr class="bg-success">
          <td class="text-center"><?= $noa++; ?></td>
          <td colspan="10"><?= $row->ktgmanaj ?></td>
        </tr>
        <?php $vardo = $this->loadrev->mdl_rev($row->id_ktgmanaj); $noba=1; $nob=1;?>
        <?php foreach($vardo as $rowvardo):?>
          <tr class="bg-info">
            <td class="text-center"><?= ($noa - 1).".".$nob++?></td>
            <td><?= $rowvardo->mnj_var ?></td>
            <td><?= $rowvardo->mnj_do ?></td>
            <td><?= $rowvardo->nilai_0?></td>
            <td><?= $rowvardo->nilai_4?></td>
            <td><?= $rowvardo->nilai_7?></td>
            <td><?= $rowvardo->nilai_10?></td>
            <td><input class="form-control text-center" name="hasilnilai<?= $rowvardo->id_manajvar ?>" id="hasilnilai<?= $rowvardo->id_manajvar ?>" value="<?= $rowvardo->hasil ?>" /></td>
            <td><?= $rowvardo->coments?></td>
            <td><?= $rowvardo->rev_date?></td>
            <td><button id="btnnilai<?=$rowvardo->id_manajvar?>" class="btn btn-sm btn-primary">Update</button></td>
            <?php
              $hasil += $rowvardo->hasil;
            ?>
            <script type="text/javascript">
              $('#btnnilai<?=$rowvardo->id_manajvar?>').click(function(){
                var nilai = $('#hasilnilai<?= $rowvardo->id_manajvar ?>').val();
                $.ajax({
                  type  : 'POST',
                  data  : {'hasil':nilai,
                            'id':'<?= $rowvardo->id_manajvar ?>',
                            'pkms':'<?= $this->session->userdata('idpkms');?>'},
                  url   : '<?= base_url() ?>mnj/Page/ct_save',
                  success :function(){
                    alert('Sukses');
                  }
                });
              })
            </script>
          </tr>
        <?php endforeach ?>
        <tr>
          <td colspan="7">Jumlah Hasil <?= $row->ktgmanaj ?></td>
          <?php $jumlah = $this->loadrev->mdl_jumlah($row->id_ktgmanaj) ?>
          <?php foreach($jumlah as $hsl): ?>
            <td><?=$hsl->hasil?></td>
          <?php endforeach ?>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
