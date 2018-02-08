<div class="row">
  <!-- <div class="col-md-2">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="glyphicon glyphicon-filter"></i> </h3>
      </div>
      <div class="panel-body">
        <div class='input-group date' id='datetimepicker10'>
          <input type='text' class="form-control" id="tgl" />
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar">
            </span>
          </span>
        </div>
      </div>
    </div>
  </div> -->

  <div class="col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="glyphicon glyphicon-stats"></i>
        </h3>
      </div>
      <div class="panel-body">
          <div class="col-md-3">
            <div class='input-group date' id='datetimepicker10'>
              <input type='text' class="form-control" id="tgl" placeholder="Bulan & Tahun" />
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar">
                </span>
              </span>
            </div>
          </div>
          <div class="col-md-9">
            <div class="form-group">
              <div>
                <select name="" id="cmbKtgMnj" class="form-control" required="required">
                  <option value="">--Kategori Manajemen--</option>
                  <?php foreach($ktgMnj as $rowMnj): ?>
                    <option value="<?= $rowMnj->id_ktgmanaj?>"><?= $rowMnj->ktgmanaj ?></option>}
                    option
                  <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
      </div>
      <form>
        <table class="table table-hover">
          <thead>
            <tr>
              <th rowspan="2" class="text-center">NO</th>
              <th rowspan="2" class="text-center">Jenis Variable</th>
              <th rowspan="2" class="text-center">Definisi Operasional</th>
              <th colspan="4" class="text-center">Skala</th>
              <th rowspan="2" class="text-center" width="100">Nilai Hasil</th>
            </tr>
            <tr>
              <th class="text-center">Nilai 0</th>
              <th class="text-center">Nilai 4</th>
              <th class="text-center">Nilai 7</th>
              <th class="text-center">Nilai 10</th>
            </tr>
          </thead>
          <tbody id="content">
          </tbody>
        </table>
      </form>
      <div class="panel-footer">
        <button id="btnSave" type="button" class="btn btn-success pull-right"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<script src="<?=base_url()?>assets/vendor/custom/inmnj.js"></script>