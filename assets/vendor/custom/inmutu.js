$(document).ready(function()
{

	$("#datetimepicker10").datetimepicker(
  {
    viewMode:'months',
    format:'MMMM-YYYY',
    locale:moment.locale('id')
  });

	$('button').hide();

	function getNum(val)
	{
     if (isNaN(val))
     {
       return 0;
     }
     return val;
  }

	$('#cmbKtgMutu').on('click',function()
	{
		var idKtg = $(this).val();
		var tgl = $("#tgl").val();
		var arr = tgl.split("-");

		if (!tgl)
		{
			alertify.set('notifier','position','top-right');
      alertify.warning("Bulan dan tahun masih kosong");
		}
		else
		{
			waitingDialog.show();

			$.ajax(
			{
				type:'post',
				data:{'idktg':idKtg,"bln":arr[0], "thn":arr[1]},
				url:base_url+'c_mutu/getinputmutu',
				success:function(result)
				{
					$('#content').html(result);
					waitingDialog.hide();
					$('button').show();
				}
			});
		}

	});

	$('#btnSave').on('click',function()
	{
		waitingDialog.show();
		var form  = $('form');
		var tgl   = $("#tgl").val();
		var arr   = tgl.split("-");
		var idktg = $("#cmbKtgMutu").val();
		var dtAdd = {'bln':arr[0], 'thn':arr[1],'idktg':idktg}
		var data  = form.serialize()+'&'+$.param(dtAdd);

		$.ajax(
		{
			type:'post',
			data:data,
			url:base_url+"c_mutu/savenilaimutu",
			success:function()
			{
				waitingDialog.hide();
				alertify.set('notifier','position','top-right');
				alertify.success('Data berhasil diproses');
				$('button').hide();
			},
			error:function()
			{
				console.log('error');
			}
		})
	});

	// $(document).on('input',"#cpaian", function(){
 //    if ($(this).val() != null) {
 //       $(this).parent().closest('tr').find('#mtuCpain').addClass('subanu');
 //    }else{
 //       $(this).parent().closest('tr').find('#mtuCpain').removeClass('subanu');
 //    }
 //  });

  // function hitung()
  // {
  // 	var tot 				= parseFloat($('tr').closest('tr').find('#total').val());
		// var mtCpn 			= $('tr').closest('tr').find('#mtuCpain');
		// var cpn 				= $('tr').closest('tr').find('#cpaian').val();
		// var count 			= $(".table tr").length -1;
		// var sub 				= 0;
		// var htng 				= 0;
		// var getTotal 		= 0;

		// //console.log(cpn/tot*100)

		// if (!isNaN(tot) && tot !== '')
		// {
		// 	htng = getNum((cpn/tot)*100);
		// 	mtCpn.val(htng);

		// 	$('tr').closest('tr').find('#mtuCpain').val(htng.toFixed(2));
  //     $("#mtuCpain").each(function()
  //     {
  //       sub += parseFloat($(this).val());
  //     });

  //     getTotal = sub/count;
  //     $('#mTotal').val(getTotal.toFixed(2));
		// }
		// else
		// {
		// 	alert('kosong');
		// }
  // }

	// $(document).on('change','#cpaian',function()
	// {
	// 	var tot 				= parseFloat($(this).parent().closest('tr').find('#total').val());
	// 	var mtCpn 			= $(this).parent().closest('tr').find('#mtuCpain');
	// 	var cpn 				= $(this).val();
	// 	var count 			= $(".table tr").length -1;
	// 	var sub 				= 0;
	// 	var htng 				= 0;
	// 	var getTotal 		= 0;

	// 	if (!isNaN(tot) && tot !== '')
	// 	{
	// 		htng = getNum((cpn/tot)*100);
	// 		mtCpn.val(htng);

	// 		$(this).parent().closest('tr').find('.subanu').val(htng.toFixed(2));
 //      $(".subanu").each(function()
 //      {
 //        sub += parseFloat($(this).val());
 //      });

 //      getTotal = sub/count;
 //      //console.log('count :'+count);
 //      //console.log('sub :'+sub);
 //      //console.log('Sub Total :'+getNum(getTotal));
 //      $('#mTotal').val(getTotal);
	// 	}
	// 	else
	// 	{
	// 		alert('kosong');
	// 	}
	// });

	// $(document).on('change','#total',function()
	// {
	// 	var tot = parseFloat($(this).parent().closest('tr').find('#cpaian').val());
	// 	var mtCpn = $(this).parent().closest('tr').find('#mtuCpain');
	// 	var cpn = parseFloat($(this).val());
	// 	var mtTotal = $(this).parent().closest('tr').find('#mtTotal');
	// 	var count = $(".table tr").length -1;

	// 	if (!isNaN(tot) && tot !== '')
	// 	{
	// 		htng = cpn/tot*100;
	// 		mtCpn.val(htng.toFixed(2));

	// 		$(this).parent().closest('tr').find('.subanu').val(htng.toFixed(2));
 //      $(".subanu").each(function(){
 //        sub += parseFloat(htng.toFixed(2));
 //      });
 //      getTotal = sub/count;
 //      mtTotal.val(getTotal.toFixed(2));
 //      //console.log(getTotal);
	// 	}
	// 	else
	// 	{
	// 		alert('kosong');
	// 	}
	// });




})