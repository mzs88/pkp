<script src="<?= base_url() ?>assets/vendor/custom/inputukes.js" type="text/javascript" charset="utf-8" async defer></script>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="glyphicon glyphicon-stats"></i> Data</h3>
			</div>
			<div class="panel-body">
				<div class="form-group col-md-3">
					<label for="cmbUkesA" control-label">Bulan & Tahun</label>
          <div id='datetimepicker10' class='input-group date'>
            <input type='text' class="form-control" id="tgl" />
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar">
              </span>
            </span>
          </div>
        </div>

        <div class="form-group col-md-3">
					<label for="cmbUkesA" control-label">Ukes A:</label>
					<div class="">
						<select name="CmbUkesA" id="cmbUkesA" class="form-control" required="required">
							<option value="">--Pilih--</option>
							<?php foreach($dtUkesA as $rowA): ?>
								<option value="<?= $rowA->idukes_a ?>"><?= $rowA->ukes_a ?></option>}
								option
							<?php endforeach ?>
						</select>
					</div>
				</div>

				<div class="form-group col-md-3">
					<label for="cmbUkesB" class="control-label">Ukes B:</label>
					<div class="">
						<select name="CmbUkesB" id="cmbUkesB" class="form-control" required="required">
							<option value="">--Pilih--</option>
						</select>
					</div>
				</div>

				<div class="form-group col-md-3">
					<label for="cmbUkesC" class=" control-label">Ukes C:</label>
					<div class="">
						<select name="CmbUkesC" id="cmbUkesC" class="form-control" required="required">
							<option value="">--Pilih--</option>
						</select>
					</div>
				</div>
			</div>
			<form id="myForm">
				<div class="table-bordered">
					<table class="table  table-hover">
						<thead>
							<tr>
								<th>Usaha Kesehatan</th>
								<th class="text-center">Target Tahunan <?= date("Y") ?></th>
								<th>Sasaran</th>
								<th class="text-center">Total</th>
								<th class="text-center">Target</th>
								<th class="text-center">Pencapaian</th>
								<th>Analisa</th>
								<th>Tindak Lanjut</th>
							</tr>
						</thead>
						<tbody id="content">
							<!-- <p class="text-center">Tidak ada Data</p> -->
						</tbody>
					</table>
				</div>
			</form>
			<div class="panel-footer">
				<button id="btnSave" type="button" class="btn btn-success">button</button>
			</div>
		</div>
	</div>
</div>