<div class="panel panel-default">
  <div class="panel-heading">

  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label>Label</label>
          <select name="cmbUkka" id="cmbUkka" class="form-control">
            <option value="">--Pilih--</option>}
            option
            <?php $ukkA = $this->loadukes->mdlUkesA() ?>
            <?php foreach ($ukkA as $rowA) : ?>
            <option value="<?= $rowA->idukes_a ?>"><?= $rowA->ukes_a?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label for="">Nilai</label>
          <input type="hidden" name="idnilai_a" id="idnilai_a">
          <input type="hidden" name="hVartotA" id="hVartotA">
          <input class="form-control" type="text" readonly="true" id="vartotA" value="0">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="">Analisis</label>
          <textarea rows="1" name="analisaA" id="analisaA" class="form-control"></textarea>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="">Tindak Lanjut</label>
          <textarea  rows="1" name="tdlA" id="tdlA" class="form-control"></textarea>
        </div>
      </div>
    </div>



    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label>Label</label>
          <select name="cmbUkkb" id="cmbUkkb" class="form-control">
            <option value="">--Pilih--</option>
          </select>
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label for="">Nilai</label>
          <input type="hidden" name="idnilai_b" id="idnilai_b">
          <input type="hidden" name="hVartotB" id="hVartotB">
          <input class="form-control" type="text" readonly="true" id="vartotB" value="0">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="">Analisis</label>
          <textarea  rows="1" name="analisaB" id="analisaB" class="form-control"></textarea>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="">Tindak Lanjut</label>
          <textarea  rows="1" name="tdlB" id="tdlB" class="form-control"></textarea>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label>Label</label>
          <select name="cmbUkkc" id="cmbUkkc" class="form-control">
            <option value="">--Pilih--</option>
          </select>
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label for="">Nilai</label>
          <input type="hidden" name="idnilai_c" id="idnilai_c">
          <input type="hidden" name="hVartotC" id="hVartotC">
          <input class="form-control" type="text" readonly="true" id="vartotC" value="0">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="">Analisis</label>
          <textarea  rows="1" name="analisaC" id="analisaC" class="form-control"></textarea>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="">Tindak Lanjut</label>
          <textarea  rows="1" name="tdlC" id="tdlC" class="form-control"></textarea>
        </div>
      </div>
    </div>

  </div>
  <div class="panel-footer">

  </div>
</div>


<div class="panel panel-default">
  <div class="panel-heading"></div>
  <div class="panel-body">
    <form id="myForm">
      <table class="table table-stripe">
        <thead>
          <th>Ukes D</th>
          <th>Targetn <?=date("Y") ?></th>
          <th>Sasaran</th>
          <th class="text-center" width="100">Total</th>
          <th class="text-center" width="100">Target</th>
          <th class="text-center" width="100">Pencapaian</th>
          <th class="text-center" width="100">Riil</th>
          <th>Analisa</th>
          <th>Tindak Lanjut</th>
        </thead>
        <tbody class="content"></tbody>
      </table>
    </form>
  </div>
  <div class="panel-footer">
    <button class="btn btn-danger" id="btnSave">Save</button>
  </div>
</div>

 <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

<script>
  var pkms = '<?= $this->session->userdata('idpkms');?>';
  var bln = '<?= date('m') ?>'
  var thn = '<?= date('Y') ?>';
</script>


<script src="<?=base_url()?>assets/vendor/custom/inukes.js"></script>

