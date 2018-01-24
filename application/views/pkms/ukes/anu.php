
<div class="row">
  <table class="table table-strip table-hover" id="tbukes">
    <thead>
      <tr>
        <th  class="text-center">NO</th>
        <th  class="text-center" width="200">UKK</th>
        <th  class="text-center">Target Tahun <?= date("Y") ?> %</th>
        <th  class="text-center">Satuan Sasaran</th>
        <!-- <th  class="text-center">Opsi</th> -->
      </tr>
    </thead>

    <tbody>
      <?php $ukkA = $this->loadukes->md_ukesa($this->session->userdata('idpkms')); $noa=1;?>
      <?php foreach($ukkA as $rowA):?>
        <tr class="bg-success" data-toggle="modal" data-target="#ukesa<?= $rowA->idukes_a ?> ">
          <td><?= $noa++; ?></td>
          <td colspan="3"><?= $rowA->ukes_a ?></td>
          <!-- <?php $anA = $this->loadukes->md_ana($row->idukes_a, $this->session->userdata('idpkms'))?>
          <?php foreach ($anA as $rowAnA) :?>
            <td><?= $rowAnA->analisa ?></td>
            <td><?= $rowAnA->tindak_lanjut ?></td>          
          <?php endforeach ?> -->

          <!-- <td class="text-center"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ukesa<?= $rowA->idukes_a ?> ">Input</button></td> -->
          <!-- Modal -->
          <div class="modal fade" id="ukesa<?= $rowA->idukes_a ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Analisa & Tindak Lanjut</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Analisis</label>
                    <textarea name="analisis<?= $rowA->idukes_a ?>" id="analisis<?= $rowA->idukes_a ?>" class="form-control" rows="2" cols="80"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Tindak Lanjut</label>
                    <textarea name="tndklnjt<?= $rowA->idukes_a ?>" id="tndklnjt<?= $rowA->idukes_a ?>" class="form-control" rows="2" cols="80"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="button" class="btn btn-primary" id="submitA<?= $rowA->idukes_a ?>">Simpan a</button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.modal -->

          <script type="text/javascript">
            $('#submitA<?= $rowA->idukes_a ?>').click(function(){
              var anu = $('#analisis<?= $rowA->idukes_a ?>').val();
              var ani = $('#tndklnjt<?= $rowA->idukes_a ?>').val();
              $.ajax({
                type  : 'POST',
                data  : {'analisa':anu,
                          'tndklnjt':ani,
                          'id':'<?= $rowA->idukes_a ?>',
                          'table':'analisa_a',
                          'field':'idukes_a',
                          'pkms':'<?= $this->session->userdata('idpkms');?>'},
                url   : '<?= base_url() ?>ukes/inukes/ct_save_analisa',
                success :function(html){
                      location.reload();
                }
              });
            })
          </script>
          

        </tr>
        <?php $ukkB = $this->loadukes->mdl_ukesb($rowA->idukes_a,$this->session->userdata('idpkms')); $noba=1; $nob=1;?>
        <?php foreach($ukkB as $rowB):?>
          <tr class="bg-info" data-toggle="modal" data-target="#ukesb<?= $rowB->idukes_b ?>">
            <td><?= ($noa - 1).".".$nob++?></td>
            <td colspan="3"><?= $rowB->ukes_b ?></td>
            <!-- <?php $anB = $this->loadukes->md_anb($row->idukes_b, $this->session->userdata('idpkms'))?>
            <?php foreach ($anB as $rowAnB) :?>
            <td><?= $rowAnB->analisa ?></td>
            <td><?= $rowAnB->tindak_lanjut ?></td> -->
              
            <!-- <?php endforeach ?> -->
            <!-- <td class="text-center"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ukesb<?= $rowB->idukes_b ?>">Input</button></td> -->
            <!-- Modal -->
            <div class="modal fade" id="ukesb<?= $rowB->idukes_b ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Analisa & Tindak Lanjut</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Analisis</label>
                      <textarea name="analis_b<?= $rowB->idukes_b ?>" id="analis_b<?= $rowB->idukes_b ?>" class="form-control" rows="2" cols="80"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Tindak Lanjut</label>
                      <textarea name="tndk_b<?= $rowB->idukes_b ?>" id="tndk_b<?= $rowB->idukes_b ?>" class="form-control" rows="2" cols="80"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="submitB<?= $rowB->idukes_b ?>">Simpan b</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.modal -->

            <script type="text/javascript">
              $('#submitB<?= $rowB->idukes_b ?>').click(function(){
                var analisis = $('#analis_b<?= $rowB->idukes_b ?>').val();
                var tndklnjt = $('#tndk_b<?= $rowB->idukes_b ?>').val();
                $.ajax({
                  type  : 'POST',
                  data  : {'analisa':analisis,
                            'tndklnjt':tndklnjt,
                            'id':'<?= $rowB->idukes_b ?>',
                            'table':'analisa_b',
                            'field':'idukes_b',
                            'pkms':'<?= $this->session->userdata('idpkms');?>'},
                  url   : '<?= base_url() ?>ukes/inukes/ct_save_analisa',
                  success :function(html){
                    location.reload();
                  }
                });
              })
            </script>
            

          </tr>
          <?php $ukkC = $this->loadukes->mdl_ukesc($rowB->idukes_b,$this->session->userdata('idpkms')); $noc=1?>
          <?php foreach($ukkC as $rowC):?>
            <tr class="bg-warning" data-toggle="modal" data-target="#ukesc<?= $rowC->idukes_c ?>">
              <td><?= ($noa-1).".".($nob-1).".".$noc++?></td>
              <td colspan="3"><?= $rowC->ukes_c ?></td>
              <!-- <?php $anC = $this->loadukes->md_anc($row->idukes_c, $this->session->userdata('idpkms'))?>
              <?php foreach ($anC as $rowAnC) :?>
              <td><?= $rowAnC->analisa ?></td>
              <td><?= $rowAnC->tindak_lanjut ?></td>
                
              <?php endforeach ?> -->
              <!-- <td class="text-center"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ukesc<?= $rowC->idukes_c ?>">Input</button></td> -->
              <!-- Modal -->
              <div class="modal fade" id="ukesc<?= $rowC->idukes_c ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Analisa & Tindak Lanjut</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Analisis</label>
                        <textarea name="analis_c<?= $rowC->idukes_c ?>" id="analis_c<?= $rowC->idukes_c ?>" class="form-control" rows="2" cols="80"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Tindak Lanjut</label>
                        <textarea name="tndk_c<?= $rowC->idukes_c ?>" id="tndk_c<?= $rowC->idukes_c ?>" class="form-control" rows="2" cols="80"></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-primary" id="ant_c<?= $rowC->idukes_c ?>">Simpan c</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.modal -->

              <script type="text/javascript">
                $('#ant_c<?= $rowC->idukes_c ?>').click(function(){
                  var analisis = $('#analis_c<?= $rowC->idukes_c ?>').val();
                  var tndklnjt = $('#tndk_c<?= $rowC->idukes_c ?>').val();
                  $.ajax({
                    type  : 'POST',
                    data  : {'analisa':analisis,
                              'tndklnjt':tndklnjt,
                              'id':'<?= $rowC->idukes_c ?>',
                              'table':'analisa_c',
                              'field':'idukes_c',
                              'pkms':'<?= $this->session->userdata('idpkms');?>'},
                    url   : '<?= base_url() ?>ukes/inukes/ct_save_analisa',
                    success :function(html){
                      location.reload();
                    }
                  });
                })
              </script>
              
            </tr>
            <?php $ukkD = $this->loadukes->mdl_ukesd($rowC->idukes_c,$this->session->userdata('idpkms')); $nod=1?>
            <?php foreach($ukkD as $rowD):?>
              <tr class="bg-red" data-toggle="modal" data-target="#ukesd<?= $rowD->idukes_d ?>">
                <td><?= ($noa-1).".".($nob-1).".".($noc-1).".".$nod++?></td>
                <td><?= $rowD->ukes_d ?></td>
                <td class="text-center"><?= $rowD->op." ".$rowD->nilai ?> %</td>
                <td class="text-center"><?= $rowD->sasaran ?></td>
                <!-- <?php $nPkp = $this->loadukes->md_npkp($rowd->idukes_d, $this->session->userdata('idpkms'))?>
                <?php foreach ($nPkp as $rowD) :?>
                <td><?= $rowD->total ?></td>
                <td><?= $rowD->target ?></td>
                <td><?= $rowD->pencapaian ?></td>
                <td><?= $rowD->riil ?></td>
                <td><?= $rowD->analisa ?></td>
                <td><?= $rowD->tindak_lanjut ?></td>
                  
                <?php endforeach ?> -->
                <input type="hidden" name="idssrn<?= $rowD->idukes_d ?>" id="idssrn<?= $rowD->idukes_d ?>" value="<?= $rowD->id_sasaran ?>">
                <!-- <td class="text-center"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ukesd<?= $rowD->idukes_d ?>">Input</button></td> -->

                <!-- Modal -->
                <div class="modal fade" id="ukesd<?= $rowD->idukes_d ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"><?= $rowD->ukes_d ?></h4>
                      </div>
                      <div class="modal-body">
                        <div class="rowd">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Total</label>
                              <input type="text" class="form-control text-center" name="total_d<?= $rowD->idukes_d ?>" id="total_d<?= $rowD->idukes_d ?>" value="">
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Target</label>
                              <input type="text" class="form-control text-center" name="target_d<?= $rowD->idukes_d ?>" id="target_d<?= $rowD->idukes_d ?>" value="">
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Pencapaian</label>
                              <input type="text" class="form-control text-center" name="pncp_d<?= $rowD->idukes_d ?>" id="pncp_d<?= $rowD->idukes_d ?>" value="">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Analisis</label>
                          <textarea name="analisa_d<?= $rowD->idukes_d ?>" id="analisa_d<?= $rowD->idukes_d ?>" class="form-control" rowds="2" cols="80"></textarea>
                        </div>
                        <div class="form-group">
                          <label>Tindak Lanjut</label>
                          <textarea name="tndklnjt_d<?= $rowD->idukes_d ?>" id="tndklnjt_d<?= $rowD->idukes_d ?>" class="form-control" rowds="2" cols="80"></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="btn_d<?= $rowD->idukes_d ?>">Simpan d</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.modal -->

                <script type="text/javascript">
                  $('#btn_d<?= $rowD->idukes_d ?>').click(function(){
                    var total     = $('#total_d<?= $rowD->idukes_d ?>').val();
                    var target    = $('#target_d<?= $rowD->idukes_d ?>').val();
                    var pncp      = $('#pncp_d<?= $rowD->idukes_d ?>').val();
                    var analisis  = $('#analisa_d<?= $rowD->idukes_d ?>').val();
                    var tndklnjt  = $('#tndklnjt_d<?= $rowD->idukes_d ?>').val();
                    var idssrn    = $('#idssrn<?= $rowD->idukes_d ?>').val();
                    $.ajax({
                      type  : 'POST',
                      data  : {'analisa':analisis,
                                'tndklnjt':tndklnjt,
                                'total':total,
                                'target':target,
                                'pncp':pncp,
                                'id':'<?= $rowD->idukes_d ?>',
                                'pkms':'<?= $this->session->userdata('idpkms');?>',
                                'idssrn':idssrn},
                      url   : '<?= base_url() ?>ukes/inukes/ct_save_nilai',
                      success :function(html){
                        location.reload();
                      }
                    });
                  })

                  $(document).ready(function() {
                    $("#total_d<?= $rowD->idukes_d ?>").keydown(function (e) {
                      // Allow: backspace, delete, tab, escape, enter and .
                      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                         // Allow: Ctrl/cmd+A
                        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: Ctrl/cmd+C
                        (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: Ctrl/cmd+X
                        (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: home, end, left, right
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                             // let it happen, don't do anything
                             return;
                      }
                      // Ensure that it is a number and stop the keypress
                      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                      }
                    });

                    $("#target_d<?= $rowD->idukes_d ?>").keydown(function (e) {
                      // Allow: backspace, delete, tab, escape, enter and .
                      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                         // Allow: Ctrl/cmd+A
                        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: Ctrl/cmd+C
                        (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: Ctrl/cmd+X
                        (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: home, end, left, right
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                             // let it happen, don't do anything
                             return;
                      }
                      // Ensure that it is a number and stop the keypress
                      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                      }
                    });

                    $("#pncp_d<?= $rowD->idukes_d ?>").keydown(function (e) {
                      // Allow: backspace, delete, tab, escape, enter and .
                      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                         // Allow: Ctrl/cmd+A
                        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: Ctrl/cmd+C
                        (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: Ctrl/cmd+X
                        (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: home, end, left, right
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                             // let it happen, don't do anything
                             return;
                      }
                      // Ensure that it is a number and stop the keypress
                      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                      }
                    });
                  });
                </script>
                

              </tr>
            <?php endforeach ?>
            <?php
              $vardo = $this->loadukes->mdl_subvar($rowC->idukes_c);
              $a=0;
              foreach($vardo as $row){
                $this->session->set_flashdata("subvar".$rowC->idukes_c,$row->subvar);
                //$a += str_replace(",", "", $row->subvar);
              }
            ?>
          <?php endforeach; $b=0; ?>

        <?php endforeach ?>
      <?php endforeach ?>
    </tbody>
  </table>
