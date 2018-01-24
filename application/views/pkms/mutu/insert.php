<div class="panel panel-default">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<select name="cmbKtg" id="cmbKtg" class="form-control">
			<option>--Pilih--</option>
			<?php foreach($ktgMutu as $rowMutu): ?>
				<option value="<?= $rowMutu->idmt_ktg ?>"><?= $rowMutu->mtktg ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="panel-footer"></div>
</div>

<div class="panel panel-default">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form>
		<table class="table table-striped table-hover">
			<thead>
	      <tr>
	        <th class="text-center" rowspan="2">NO</th>
	        <th width="200" class="text-center" rowspan="2">Jenis Variable</th>
	        <th width="200" class="text-center" rowspan="2">Definisi Oprasional</th>
	        <th width="200" class="text-center" rowspan="2">Cara Penghitungan</th>
	        <th class="text-center" rowspan="2">Target</th>
	        <th class="text-center" rowspan="2">Total</th>
	        <th class="text-center" rowspan="2">Capaian</th>
	        <th class="text-center" rowspan="2">% Capaian</th>
	        <th class="text-center" rowspan="2">Analisa</th>
	        <th class="text-center" rowspan="2">Tindak Lanjut</th>
	      </tr>
	    </thead>
	    <input type="text" name="mTotal" id="mTotal">
	    <tbody id="content">
	    </tbody>
		</table>
		</form>
	</div>
	<div class="panel-footer">
		<button class="btn btn-danger" id="btnSave">Save</button>
	</div>
</div>

<script src="<?=base_url()?>assets/vendor/custom/inmutu.js"></script>