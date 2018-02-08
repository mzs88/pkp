$(document).ready(function(){
  $("#datetimepicker10").datetimepicker(
  {
    viewMode:'months',
    format:'MMMM-YYYY',
    locale:moment.locale('id')
  });

  $('button').hide();
  function getNum(val)
  {
     if (isNaN(val)) {
       return 0;
     }
     return val;
  }

  $('#cmbUkesA').on('change',function(){
    var date = $("#tgl").val();
    if(!date)
    {
      alertify.set('notifier','position','top-right');
      alertify.warning("Bulan dan tahun masih kosong");
    }
    else
    {
      waitingDialog.show('Loading...');
      var id = $(this).val();
      $.ajax(
      {

       type : "POST",
       data : {'id':id},
       url : base_url +'c_usaha_kesehatan/ukesb',
       success:function(data)
       {

         var cmb = $('#cmbUkesB');
         var opt = $('<option />');
         cmb.empty();
         opt.val('');
         opt.text('--Pilih---');
         cmb.append(opt);

         $.each(JSON.parse(data),function(key, val)
         {
           var opt = $('<option />');
           opt.val(val.idukes_b);
           opt.text(val.ukes_b);
           cmb.append(opt);
         });
         waitingDialog.hide();
       },
       error:function(jqXHR, textStatus, errorThrown){
         alert('error');
       }
      });
    }

    // $.ajax({

    //   type : "POST",
    //   data : {'id' : id, 'pkms' : pkms, 'bln' : bln, 'thn':thn},
    //   url   : base_url+'/ukes/inukes/getNilaiUKKa',
    //   success : function(result){
    //     setTimeout(function(){
    //       var idanalisa = $('#idnilai_a');
    //       var hNilai  = $('#hVartotA');
    //       var nilai   = $('#vartotA');
    //       var analisa = $('#analisaA')
    //       var tndk    = $('#tdlA');
    //       //var countB  = $('#cmbUkkb option').length -1;

    //       nilai.val(0);
    //       hNilai.val(0);
    //       analisa.html('');
    //       tndk.html('');
    //     idanalisa.val('');

    //       $.each(JSON.parse(result),function(key, val){
    //         //var a = getNum(val.nilai);
    //         //var b = parseFloat(a/countB);
    //         idanalisa.val(val.idanalisa_a);
    //         hNilai.val(val.nilai);
    //         nilai.val(val.nilai);
    //         analisa.html(val.analisa);
    //         tndk.html(val.tindak_lanjut);
    //       });
    //     },100);
    //     waitingDialog.hide();
    //   },
    //   error:function(jqXHR, textStatus, errorThrown){
    //     alert('error');
    //   }
    // });

  });

  $('#cmbUkesB').on('change', function()
  {
    waitingDialog.show();
    var id = $(this).val();

    $.ajax(
    {

      type  : 'POST',
      data  : {'id':id},
      url   : base_url+'c_usaha_kesehatan/ukesc',
      success : function(data)
      {

        var cmb = $('#cmbUkesC');
        var opt = $('<option />');
        cmb.empty();
        opt.val('');
        opt.text('--Pilih---');
        cmb.append(opt);

        $.each(JSON.parse(data),function(key, val)
        {
          var opt = $('<option />');
          opt.val(val.idukes_c);
          opt.text(val.ukes_c);
          cmb.append(opt);
        });
        waitingDialog.hide();
      }
    });

    // $.ajax({
    //   type : "POST",
    //   data : {'id' : id, 'pkms' : pkms, 'bln' : bln, 'thn':thn},
    //   url   :base_url+'ukes/inukes/getNilaiUKKb',
    //   success : function(data)
    //   {
    //     setTimeout(function()
    //     {
    //       var idanalisa   = $('#idnilai_b');
    //       var nilai       = $('#vartotB');
    //       var hNilai      = $('#hVartotB');
    //       var analisa     = $('#analisaB');
    //       var tndk        = $('#tdlB');
    //       //var countC      = $("#cmbUkkc option").length -1;

    //       nilai.val(0);
    //       hNilai.val(0);
    //       analisa.html('');
    //       tndk.html('');
    //       idanalisa.val('');

    //       $.each(JSON.parse(data),function(key, val){
    //         //var a = getNum(val.nilai);
    //         //var c = parseFloat(a/countC);
    //         idanalisa.val(val.idanalisa_b);
    //         hNilai.val(val.nilai);
    //         nilai.val(val.nilai);
    //         analisa.html(val.analisa);
    //         tndk.html(val.tindak_lanjut);
    //       });
    //     },100);
    //     waitingDialog.hide();
    //   },
    //   error:function(jqXHR, textStatus, errorThrown){
    //     alert('error');
    //   }
    // });

  });

  $('#cmbUkesC').on('change', function()
  {

    var id = $(this).val();
    var date = $("#tgl").val();
    var arr = date.split("-");
    if(!date)
    {
      alertify.set('notifier','position','top-right');
      alertify.warning("Bulan dan tahun masih kosong");
    }
    else
    {
      waitingDialog.show('Loading...');
      $.ajax({

        type  : 'POST',
        data  : {'id':id, "bln":arr[0], "thn":arr[1]},
        url   : base_url+'c_usaha_kesehatan/ukesd',
        success : function(data)
        {

          var content = $('#content');
          content.html(data);
          $("button").show();
        }
      });
      waitingDialog.hide();
    }


    // $.ajax({
    //   type : "POST",
    //   data : {'id' : id, 'pkms' : pkms, 'bln' : bln, 'thn':thn},
    //   url   : base_url+'/ukes/inukes/getNilaiUKKc',
    //   success : function(data){
    //     var idanalisa   = $('#idnilai_c');
    //     var nilai       = $('#vartotC');
    //     var hNilai      = $('#hVartotC');
    //     var analisa     = $('#analisaC');
    //     var tndk        = $('#tdlC');

    //     nilai.val(0);
    //     hNilai.val(0);
    //     analisa.html('');
    //     tndk.html('');
    //     idanalisa.val('');

    //     $.each(JSON.parse(data),function(key, val){
    //       idanalisa.val(val.idanalisa_c);
    //       nilai.val(val.nilai);
    //       hNilai.val(val.nilai);
    //       analisa.html(val.analisa);
    //       tndk.html(val.tindak_lanjut);
    //       console.log(val.idanalisa_c);
    //     });
    //     //$('#btnSave').show();
    //     waitingDialog.hide();
    //     $('button').show();
    //   },
    //   error:function(jqXHR, textStatus, errorThrown){
    //     alert('error');
    //   }
    // });

  });

  $('#btnSave').on('click',function()
  {
      waitingDialog.show('Loading...');
      var form = $('#myForm');
      var tgl = $("#tgl").val();
      var arr = tgl.split("-");

      var data ={'bln':arr[0],'thn':arr[1]};
      var dtSave = form.serialize()+'&'+$.param(data);

      $.ajax({
        type : 'POST',
        data : dtSave,
        url  : base_url+'c_usaha_kesehatan/savenilaiukes',
        success : function(){
          waitingDialog.hide();
          alertify.set('notifier','position','top-right');
          alertify.success("Data berhasil di proses");
          $("tbody").empty();
          $(this).hide();
        },
        error:function()
        {
          alert("Error");
        }
      });

      // $.ajax({
      //   type  : 'POST',
      //   data  : {'analisa':$('#analisaA').text(),
      //             'tndklnjt':$('#tdlA').text(),
      //             'id':$('#cmbUkka').val(),
      //             'nilai':$('#vartotA').val(),
      //             'table':'analisa_a',
      //             'field':'idanalisa_a',
      //             'fieldUkes':'idukes_a',
      //             'idnilai':$('#idnilai_a').val(),
      //             'pkms':pkms},
      //   url   : base_url+'ukes/inukes/ct_save_analisa',
      //   success :function(html){
      //   }
      // });

      // $.ajax({
      //   type  : 'POST',
      //   data  : {'analisa':$('#analisaB').text(),
      //             'tndklnjt':$('#tdlB').text(),
      //             'id':$('#cmbUkkb').val(),
      //             'nilai':$('#vartotB').val(),
      //             'table':'analisa_b',
      //             'field':'idanalisa_b',
      //             'fieldUkes':'idukes_b',
      //             'idnilai':$('#idnilai_b').val(),
      //             'pkms':pkms},
      //   url   : base_url+'ukes/inukes/ct_save_analisa',
      //   success :function(html){
      //   }
      // });

      // $.ajax({
      //   type  : 'POST',
      //   data  : {'analisa':$('#analisaC').text(),
      //             'tndklnjt':$('#tdlC').text(),
      //             'id':$('#cmbUkkc').val(),
      //             'nilai':$('#vartotC').val(),
      //             'table':'analisa_c',
      //             'field':'idanalisa_c',
      //             'fieldUkes':'idukes_c',
      //             'idnilai':$('#idnilai_c').val(),
      //             'pkms':pkms},
      //   url   : base_url+'ukes/inukes/ct_save_analisa',
      //   success :function(html){
      //   }
      // });

      // waitingDialog.hide();
      // alertify.set('notifier','position','top-center');
      // alertify.success("Data berhasil di prosess");
      // $('button').hide();
  });

  $(document).on('keyup', '#total', function(event) {
    event.preventDefault();
    var target = $(this).parent().closest('tr').find('#tth').val();
    var nTotal = parseFloat($(this).val());
    total = target*nTotal/100;
    //$(this).parent().closest('tr').find('#total').val(nTotal.toFixed(2));
    $(this).parent().closest('tr').find('#target').val(total);

  });

  $(document).on('input',"#pncp", function(){
    if ($(this).val() != null) {
       $(this).parent().closest('tr').find('#riil').addClass('subanu');
    }else{
       $(this).parent().closest('tr').find('#riil').removeClass('subanu');
    }
  });

  $(document).on('change','#pncp', function(){
    var total = parseFloat($(this).parent().closest('tr').find('#total').val());
    var cpaian = parseFloat($(this).val());
    var edit = parseFloat($(this).parent().closest('tr').find('#idnilai').val());

    var countA = $("#cmbUkka option").length -1;
    var countB = $("#cmbUkkb option").length -1;
    var countC = $("#cmbUkkc option").length -1;
    var countD = $(".table tr").length -1;

    if (total !== '') {

      var pncaian = getNum(cpaian/total*100);
      var sub = 0;

      var varTotA = 0;
      var varTotB = 0;
      var varTotC = 0;

      if (edit == 0 ) {
        var varTotA = parseFloat($("#hVartotA").val());
        var varTotB = parseFloat($("#hVartotB").val());
        var varTotC = parseFloat($("#hVartotC").val());
      }

      //if (!isNaN(pncaian)) {
        $(this).parent().closest('tr').find('#riil').val(pncaian);
      //}else{
        //$(this).parent().closest('tr').find('#riil').val(0);
      //}

      $(this).parent().closest('tr').find('.subanu').val(pncaian.toFixed(2));
      $(".subanu").each(function()
      {
        sub += parseFloat($(this).val());
        console.log('this val : '+$(this).val());
        console.log('this total :'+sub);
      });
        console.log('This subtotal :'+sub);

      var subTotC =varTotC+sub/countD;
      $("#vartotC").val(subTotC.toFixed(2) ? subTotC.toFixed(2) : 0);
      console.log(subTotC.toFixed(2) ? subTotC.toFixed(2) : 0)

      var subTotB =  varTotB+subTotC/countC;
      $("#vartotB").val(subTotB.toFixed(2) ? subTotB.toFixed(2) : 0);
      console.log(subTotB.toFixed(2) ? subTotB.toFixed(2) : 0)

      var subTotA = varTotA+subTotB/countB;
      $("#vartotA").val(subTotA.toFixed(2));
      console.log(subTotA.toFixed(2) ? subTotA.toFixed(2) : 0)

    }else{
      alert("Nilai total masih kosong!!!");
      $(this).val('');
    }

  });

});









  // $(document).ready(function(){
  //   $('#takada').click(function() {
  //     var data = $('form').serialize();
  //     console.log('data dari form : '+data);
  //   })
  // });

  // $(document).on('click','#takada', function(){
  //   var data = $('form').serialize();
  //   console.log('data dari form : '+data);
  // })


