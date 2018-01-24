<div class="panel panel-default">
  <div class="panel-heading">
    <div class="row">
      <div class="col-md-10">
          <select name="cmbKtgMnj" id="cmbKtgMnj" class="form-control">
            <option value="">--Pilih--</option>
            <?php $ktgMnj = $this->Dataload->MnjKtg() ?>
            <?php foreach ($ktgMnj as $rowKtg) : ?>
            <option value="<?= $rowKtg->id_ktgmanaj ?>"><?= $rowKtg->ktgmanaj?></option>
            <?php endforeach ?>
          </select>
      </div>
      <div class="col-md-2">
        <input class="form-control text-center" type="text" id="calNilai" name="calNilai" value="0">
      </div>
    </div>

  </div>
  <div class="panel-body">
    <form>
      <input type="hidden" name="totNilai" id="totNilai" value="0">
      <table class="table table-bordered">
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
  </div>
  <div class="panel-footer">
    <button class="btn btn-danger" id="btnSave">Save</button>
  </div>
</div>

<script src="<?=base_url()?>assets/vendor/custom/inmnj.js"></script>
