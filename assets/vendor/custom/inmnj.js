$(document).ready(function()
{

	$("#datetimepicker10").datetimepicker(
  {
    viewMode:'months',
    format:'MMMM-YYYY',
    locale:moment.locale('id')
  });

	$('button').hide();

	$('#cmbKtgMnj').click(function()
	{

		//console.log(id);
		var id = $(this).val();
		var arr = $("#tgl").val().split("-");

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
				type:'POST',
				data:{'id':id, "bln":arr[0], "thn":arr[1]},
				url:base_url+"c_manajemen/getdatainput",
				success:function(result)
				{
					$('#content').html(result);
					waitingDialog.hide();
					$('button').show();
				},
				error:function(jqXHR, textStatus, errorThrown)
				{
					console.log('Error');
				}
			});
		}
	});

	// $(document).on('input',"#nilai", function()
	// {
 //    if ($(this).val() != null)
 //    {
 //       $(this).parent().closest('tr').find('#nilai').addClass('total');
 //    }
 //    else
 //    {
 //       $(this).parent().closest('tr').find('#nilai').removeClass('total');
 //    }
 //  });

	// $(document).on('change','#nilai',function()
	// {
	// 	var total = 0;

	// 	$(this).parent().closest('tr').find('.total').val();
	// 	console.log($(this).parent().closest('tr').find('.total').val())
	//   $(".total").each(function()
	//   {
	//     total += parseFloat($(this).val());
	//   });

	//   $('#totNilai').val(total);
	//   $('#calNilai').val(total);
	// });



	// $("input[name='nilai']").on("focusin",function()
	// {
	// 	//alert("focusin");
	// 	$(this).select();
	// })


	$('#btnSave').on('click',function()
	{
		waitingDialog.show();
		//var tgl = ;
		var arr = $("#tgl").val().split("-");
		var idktg = $("#cmbKtgMnj").val();
		var data = {'bln':arr[0],'thn':arr[1], 'ktg':idktg};
		var dtSave = $('form').serialize()+'&'+$.param(data);

		$.ajax(
		{
			type:'POST',
			data:dtSave,
			url:base_url+"c_manajemen/savenilaimnj",
			success:function()
			{
				waitingDialog.hide();
      	alertify.set('notifier','position','top-center');
      	alertify.success("Data berhasil di prosess");
      	$("tbody").empty();
      	$('button').hide();
			}
		});

	});

});