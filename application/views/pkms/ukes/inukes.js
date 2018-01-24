$(document).ready(function(){

  function getNum(val) {
     if (isNaN(val)) {
       return 0;
     }
     return val;
  }

  $('#cmbUkka').on('change',function(){
    var id = $(this).val();
    $.ajax({

     type : "POST",
     data : {'id':id},
     url : base_url +'/ukes/inukes/loadUkkB',
     success:function(data){

       var cmb = $('#cmbUkkb');
       var opt = $('<option />');
       cmb.empty();
       opt.val('');
       opt.text('--Pilih---');
       cmb.append(opt);

       $.each(JSON.parse(data),function(key, val) {

         var opt = $('<option />');
         opt.val(val.idukes_b);
         opt.text(val.ukes_b);
         cmb.append(opt);

       });
     },
     error:function(jqXHR, textStatus, errorThrown){
       alert('error');
     }
    });

    $.ajax({

      type : "POST",
      data : {'id' : id, 'pkms' : pkms, 'date' : date},
      url   : base_url+'/ukes/inukes/getNilaiUKKa',
      success : function(result){
        var hNilai   = $('#hVartotA');
        var nilai   = $('#vartotA');
        var analisa = $('#analisaA')
        var tndk    = $('#tdlA');

        nilai.val(0);
        hNilai.val(0);
        analisa.html('');
        tndk.html('');

        $.each(JSON.parse(result),function(key, val){
          hNilai.val(val.nilai);
          nilai.val(val.nilai);
          analisa.html(val.analisa);
          tndk.html(val.tindak_lanjut);
        });
      },
      error:function(jqXHR, textStatus, errorThrown){
        alert('error');
      }
    });

  });

  $('#cmbUkkb').on('change', function(){
    var id = $(this).val();

    $.ajax({

      type  : 'POST',
      data  : {'id':id},
      url   : base_url+'/ukes/inukes/loadUkkC',
      success : function(data){

        var cmb = $('#cmbUkkc');
        var opt = $('<option />');
        cmb.empty();
        opt.val('');
        opt.text('--Pilih---');
        cmb.append(opt);

        $.each(JSON.parse(data),function(key, val) {

          var opt = $('<option />');
          opt.val(val.idukes_c);
          opt.text(val.ukes_c);
          cmb.append(opt);

        });
      }
    });

    $.ajax({
      type : "POST",
      data : {'id' : id, 'pkms' : pkms, 'date' : date},
      url   :base_url+'ukes/inukes/getNilaiUKKb',
      success : function(data){
        var nilai   = $('#vartotB');
        var hNilai   = $('#hVartotB');
        var analisa = $('#analisaB');
        var tndk    = $('#tdlB');

        nilai.val(0);
        hNilai.val(0);
        analisa.html('');
        tndk.html('');

        $.each(JSON.parse(data),function(key, val){
          hNilai.val(val.nilai);
          nilai.val(val.nilai);
          analisa.html(val.analisa);
          tndk.html(val.tindak_lanjut);
        });
      },
      error:function(jqXHR, textStatus, errorThrown){
        alert('error');
      }
    });

  });

  $('#cmbUkkc').on('change', function(){
    var id = $(this).val();
    $.ajax({

      type  : 'POST',
      data  : {'id':id},
      url   : base_url+'/ukes/inukes/loadUkkD',
      success : function(data){

        var content = $('.content');

        content.html(data);

      }
    });

    $.ajax({
      type : "POST",
      data : {'id' : id, 'pkms' : pkms, 'date' : date},
      url   : base_url+'/ukes/inukes/getNilaiUKKc',
      success : function(data){
        var nilai   = $('#vartotC');
        var hNilai   = $('#hVartotC');
        var analisa = $('#analisaC');
        var tndk    = $('#tdlC');

        console.log(id);
        console.log('id puskesmas : '+pkms);
        console.log('Tanggal buat : '+date);

        nilai.val(0);
        hNilai.val(0);
        analisa.html('');
        tndk.html('');

        $.each(JSON.parse(data),function(key, val){
          nilai.val(val.nilai);
          hNilai.val(val.nilai);
          analisa.html(val.analisa);
          tndk.html(val.tindak_lanjut);
          console.log(val.nilai);
        });
      },
      error:function(jqXHR, textStatus, errorThrown){
        alert('error');
      }
    });

  });

  $('#btnSave').on('click',function(event){
      var form = $('#myForm');
      console.log('data dari form : '+form.serialize());

      $.ajax({
        type : 'POST',
        data : form.serialize(),
        url  : base_url+'ukes/inukes/ct_save_nilai',
        success : function(data){
          alert('Suksess');
        }
      });
  });

  $(document).on('keyup', '#total', function(event) {
    event.preventDefault();
    var target = $(this).parent().closest('tr').find('#tth').val();
    var total = $(this).val();
    total = target*total/100;
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

    var countA = $("#cmbUkka option").length -1;
    var countB = $("#cmbUkkb option").length -1;
    var countC = $("#cmbUkkc option").length -1;
    var countD = $(".table tr").length -1;

    if (total !== '') {

      var pncaian = getNum(cpaian/total*100);
      var sub = 0;

      var varTotA = parseFloat($("#hVartotA").val());
      var varTotB = parseFloat($("#hVartotB").val());
      var varTotC = parseFloat($("#hVartotC").val());

      //if (!isNaN(pncaian)) {
        $(this).parent().closest('tr').find('#riil').val(pncaian);
      //}else{
        //$(this).parent().closest('tr').find('#riil').val(0);
      //}

      $(this).parent().closest('tr').find('.subanu').val(pncaian.toFixed(2));
      $(".subanu").each(function(){
        sub += parseFloat($(this).val());
      });

      var subTotC =varTotC+sub/countD;
      $("#vartotC").val(subTotC.toFixed(2) ? subTotC.toFixed(2) : 0);
      console.log('vartot C : '+varTotC);
      console.log('Subtotal Riil :'+sub);
      console.log('Count D :'+countD);

      var subTotB =  varTotB+subTotC/countC;
      $("#vartotB").val(subTotB.toFixed(2) ? subTotB.toFixed(2) : 0);

      var subTotA = varTotA+subTotB/countB;
      $("#vartotA").val(subTotA.toFixed(2));

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


