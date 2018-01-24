<?php 
	$msg = $this->session->flashdata('success');
	if (!empty($msg)) :
?>
<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?= $msg ?> dan klick link <a href="<?= base_url() ?>index.php/ctrl_pkms">Hasil</a> untuk melihat data.
</div>
<?php endif ?>
<form method="POST" action="<?=base_url()?>index.php/ctrl_user/ct_save">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="col-md-6">
        <input type="hidden" name="idop" value="<?= $idop ?>">
        <div class="form-group">
          <label>Username</label>
          <input class="form-control" type="text" id="uname" name="uname" value="<?= $uname ?>">
          <p class="help-block"></p>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input class="form-control" type="email" id="email" name="email" value="<?= $email ?>">
          <p class="help-block"></p>
        </div>
        <div class="form-group">
          <label>Status</label>
          <select name="sts" id="sts" class="form-control">
            <option value="<?= ($sts != '') ? ($sts==0) ? '0' : '1'  : '--Pilih--' ?>"><?= ($sts != '') ? ($sts == 0) ? 'Admin' : 'User' :'--Pilih--'  ?></option>
            <option value="0">Admin</option>
            <option value="1">User</option>
          </select>
          <p class="help-block"></p>
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input class="form-control" type="text" id="nama" name="nama" value="<?= $nama ?>">
          <p class="help-block"></p>
        </div>
      </div>
    </div>
    <div class="panel-footer">
      <a href="<?= base_url() ?>index.php/ctrl_user" class="btn btn-default">Tutup</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>

<script type="text/javascript">
  function chekPass(){
    var repass = $("#repass").val();
    var pass = $("#pass").val();
    if (pass !== repass ) {
      $("#msgRepass").html('<b><i>Password tidak sama, silahkan ulangi lagi</i></b>');
      $("#repass").focus();
      return false;
    }else{
      $("#msgRepass").html('');
    }
  }
</script>