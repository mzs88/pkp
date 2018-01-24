<?php
	$msg = $this->session->flashdata('success');
	if (!empty($msg)) :
?>
<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?= $msg ?> dan klick link <a href="<?= base_url() ?>index.php/ctrl_pkms">Hasil</a> untuk melihat data.
</div>
<?php endif ?>
<form method="POST" action="<?=base_url()?>index.php/ctrl_target/ct_simpan">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="col-md-6">
        <div class="form-group">
          <label for="">UKK</label>
          <select class="form-control" id="cmb_ukkd" name="cmb_ukkd">
            <option value="<?= $idslctUKK ?>"><?= $slctUKK ?></option>
            <?php foreach($dbukkd->result() as $rows) : ?>
              <option value="<?= $rows->idukes_d ?>"><?= $rows->ukes_d ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">Sasaran</label>
          <select class="form-control" id="cmb_sasaran" name="cmb_sasaran">
            <option value="<?= $idslctSsrn ?>"><?= $slctSsrn ?></option>
            <?php foreach($ssrn->result() as $rows) : ?>
              <option value="<?= $rows->id_sasaran ?>"><?= $rows->sasaran ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">Operator</label>
          <select class="form-control" id="cmb_op" name="cmb_op">
            <option value="<?= $slctOP ?>"><?= $slctOP ?></option>
            <option value="<"><</option>
            <option value="=">=</option>
            <option value=">">></option>
          </select>
        </div>
        <div class="form-group">
          <label>Target</label>
          <input class="form-control" type="number" id="trgt" name="trgt" value="<?= $trgt ?>">
          <p class="help-block"></p>
        </div>
        <div class="form-group">
          <label for="">Tahun</label>
          <select class="form-control" id="cmb_thn" name="cmb_thn">
            <option value="<?= $slctThn ?>"><?= $slctThn ?></option>
            <?php
              $thn = date('Y');
              for ($i=2000; $i <= $thn ; $i++) :
            ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php
              endfor;
            ?>
          </select>
        </div>
      </div>
    </div>
    <div class="panel-footer">
      <a href="<?= base_url() ?>index.php/ctrl_target" class="btn btn-default">Batal</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
