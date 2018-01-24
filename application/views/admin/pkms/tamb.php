<?php
	$msg = $this->session->flashdata('success');
	if (!empty($msg)) :
?>
<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?= $msg ?> dan klick link <a href="<?= base_url() ?>index.php/ctrl_pkms">Hasil</a> untuk melihat data.
</div>
<?php endif ?>
<form method="POST" action="<?=base_url()?>admin/pkms/page/savepkms">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="col-md-6">
        <input type="hidden" name="idpkms" value="<?= $idpkms ?>">
        <div class="form-group">
          <label>Kode</label>
          <input class="form-control" type="text" id="kode" name="kode" value="<?= $kode ?>">
          <p class="help-block"></p>
        </div>
        <div class="form-group">
          <label>Puskesmas</label>
          <input class="form-control" type="text" id="nama" name="nama" value="<?= $nama ?>">
          <p class="help-block"></p>
        </div>
        <div class="form-group">
          <label>Kep. Puskesmas</label>
          <input class="form-control" type="text" id="kep" name="kep" value="<?= $kep ?>">
          <p class="help-block"></p>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input class="form-control" type="text" id="almt" name="almt" value="<?= $almt ?>">
          <p class="help-block"></p>
        </div>
        <div class="form-group">
          <label>Telepon</label>
          <input class="form-control" type="text" id="tlpn" name="tlpn" value="<?= $tlpn ?>">
          <p class="help-block"></p>
        </div>
        <div class="form-group">
          <label>Jenis</label>
          <input class="form-control" type="text" id="plyn" name="plyn" value="<?= $jns ?>">
          <p class="help-block"></p>
        </div>
				<input type="hidden" name="idop" id="idop" value=<?= $this->session->userdata('idop'); ?>/>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Email</label>
          <input class="form-control" type="email" id="email" name="email" value="<?= $email ?>" required="true">
          <p class="help-block"></p>
        </div>
        <div class="form-group">
          <label>Longitude/Lintang (LS/LU)</label>
          <input class="form-control" type="text" id="long" name="long" value="<?= $long ?>" required="true">
          <p class="help-block"></p>
        </div>
        <div class="form-group">
          <label>Latitude/Bujur (BT)</label>
          <input class="form-control" type="text" id="lat" name="lat" value="<?= $lat ?>" required="true">
          <p class="help-block"></p>
        </div>
        <div class="form-group">
          <label>Luas Wilayah</label>
          <input class="form-control" type="text" id="luas" name="luas" value="<?= $luas ?>">
          <p class="help-block"></p>
        </div>
        <div class="form-group">
          <label>Poned</label>
          <input class="form-control" type="text" id="pone" name="poned" value="<?= $poned ?>">
          <p class="help-block"></p>
        </div>
        <!-- <div class="alert alert-success alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  Password default menggunakan kode puskesmas.
				</div> -->
      </div>
    </div>
    <div class="panel-footer">
      <a href="<?= base_url() ?>admin/pkms/page" class="btn btn-default">Batal</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
