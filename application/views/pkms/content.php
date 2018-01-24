<!-- Morris Charts JavaScript -->
<script src="<?=base_url()?>assets/vendor/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>assets/vendor/morrisjs/morris.min.js"></script>
<script src="<?=base_url()?>assets/data/morris-data.js"></script>

<div class="row">
  <div class="col-lg-12">
    <!-- /.panel -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
        <div class="pull-right">
          <div class="btn-group">
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
              Actions
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
              <li><a href="#">Action</a>
              </li>
              <li><a href="#">Another action</a>
              </li>
              <li><a href="#">Something else here</a>
              </li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>Data</th>
                    <th>Nilai</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nilaiA = $this->loadukes->rkpUkesA()?>
                      <?php foreach($nilaiA as $rowNilaiA) :?>
                        <tr>
                          <td><?= $rowNilaiA->ukes_a ?></td>
                          <td><?= $rowNilaiA->nilai ?></td>
                        </tr>
                      <?php endforeach ?>
                </tbody>
              </table>
            </div>
              <!-- /.table-responsive -->
          </div>
            <!-- /.col-lg-4 (nested) -->
            <div class="col-lg-8">
              <div id="morris-bar-chart"></div>
            </div>
            <!-- /.col-lg-8 (nested) -->
        </div>
          <!-- /.row -->
      </div>
        <!-- /.panel-body -->
    </div>
      <!-- /.panel -->

  </div>
        <!-- /.col-lg-8 -->
</div>

<?php $ukesA = $this->Dataload->ukesRkpA(1, 1, 2018); $a='';?>
<?php foreach($ukesA as $rowA): ?>
<?php
  $a = $rowA->ukes_a;
  json_encode($a);
 ?>

<?php endforeach ?>

<script type="text/javascript">
  console.log('<?=$a ?>');
</script>