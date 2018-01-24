$(document).ready(function()
{
	$('button').hide();
	$('#cmbKtgMnj').click(function()
	{
		waitingDialog.show();
		var id = $(this).val();
		console.log(id);
		$.ajax(
		{
			type:'POST',
			data:{'id':id},
			url:base_url+"mnj/page/getvariable",
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
	});

	$(document).on('input',"#nilai", function()
	{
    if ($(this).val() != null)
    {
       $(this).parent().closest('tr').find('#nilai').addClass('total');
    }
    else
    {
       $(this).parent().closest('tr').find('#nilai').removeClass('total');
    }
  });

	$(document).on('change','#nilai',function()
	{
		var total = 0;

		$(this).parent().closest('tr').find('.total').val();
		console.log($(this).parent().closest('tr').find('.total').val())
	  $(".total").each(function()
	  {
	    total += parseFloat($(this).val());
	  });

	  $('#totNilai').val(total);
	  $('#calNilai').val(total);
	});


	$('#btnSave').on('click',function()
	{
		waitingDialog.show();
		var data = $('form').serialize();
		console.log(data);

		$.ajax(
		{
			type:'POST',
			data:data,
			url:base_url+"mnj/page/save",
			success:function()
			{
				waitingDialog.hide();
      	alertify.set('notifier','position','top-center');
      	alertify.success("Data berhasil di prosess");
      	$('button').hide();
			}
		});

	});

});