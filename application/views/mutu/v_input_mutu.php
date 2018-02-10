<div class="row">

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
                <select name="" id="cmbKtgMutu" class="form-control" required="required">
                  <option value="">--Kategori Penilaian Mutu--</option>
                  <?php foreach($ktgMutu as $rowMnj): ?>
                    <option value="<?= $rowMnj->idmt_ktg?>"><?= $rowMnj->mtktg ?></option>}
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
              <th class="text-center" rowspan="2">NO</th>
              <th width="200" class="text-center" rowspan="2">Jenis Variable</th>
              <th width="200" class="text-center" rowspan="2">Definisi Oprasional</th>
              <th width="200" class="text-center" rowspan="2">Cara Penghitungan</th>
              <th class="text-center" rowspan="2">Target</th>
              <th class="text-center" rowspan="2">Total</th>
              <th class="text-center" rowspan="2">Capaian</th>
              <th class="text-center" rowspan="2">Analisa</th>
              <th class="text-center" rowspan="2">Tindak Lanjut</th>
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

<script src="<?=base_url()?>assets/vendor/custom/inmutu.js"></script>