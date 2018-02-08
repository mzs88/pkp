function editTrgt(id,ukk,idukk,idssrn,op,thn,nilai,sat)
{
	$("#mdl-edit").on('show.bs.modal',function()
		{
			//console.log(idukk);
			$("#idTarget").val(id);
			$("#cmb_ukkdEdt option[value='"+idukk+"']").prop('selected',true);
			$("#cmb_sasaranEdt option[value='"+idssrn+"']").prop('selected',true);
			$("#cmb_opEdt option[value='"+op+"']").prop("selected",true);
			$("#cmb_thnEdt option[value='"+thn+"']").prop("selected",true);
			$("#cmb_satEdt option[value='"+sat+"']").prop("selected",true);
			$("#nilaiTrgtEdt").val(nilai);
		}).modal("show");
}

$(document).ready(function()
{

	$("#tb_tth").DataTable(
	{
		responsive:true
	});

	//Edit Target
	$("#btnUpdate").on('click',function()
	{
		waitingDialog.show();

		var id = $("#idTarget").val();
		var ukk = $("#cmb_ukkdEdt").val();
		var ssrn = $("#cmb_sasaranEdt").val();
		var nTgt = $("#nilaiTrgtEdt").val();
		var op = $("#cmb_opEdt").val();
		var sat = $("#cmb_satEdt").val();
		var thn = $("#cmb_thnEdt").val();


		$.ajax(
		{
			type:"POST",
			data:
			{
				'id'   :id,
				'idukd'  :ukk,
				'idssrn' : ssrn,
				'trgt' : nTgt,
				'op':op,
				'operator':idop,
				'sat':sat,
				'thn':thn
			},
			url :base_url+"admin/target/page/edttarget",
			success:function()
			{

				//$('#mdl-edit').modal('hide');
				waitingDialog.hide();
				alertify.set('notifier','position','top-center');
				alertify.success('Data berhasil dirubah');
				location.reload();
			},
			error:function(jqXHR, textStatus, errorThrown)
			{

				alertify.set('notifier','position','top-center');
				alertify.error('System Error');

			}
		});

		waitingDialog.hide();
	})

	$('#btn-tambah').on('click',function()
	{
		$('#tambah').modal('show');
	})


	$('#simpan').on('click',function()
	{

		var sasaran   = $('#cmb_sasaran').val();
		var ukkd    	= $('#cmb_ukkd').val();
		var op      	= $('#cmb_op').val();
		var trgt  		= $('#trgt').val();
		var thn  			= $('#cmb_thn').val();
		var operator 	= idop;
		var sat 			= $("#cmb_sat").val();

		if(sasaran == '' | ukkd == '' | trgt == '')
		{
			alertify.set('notifier','position','top-center');
    	alertify.warning("Data kosong");
		}
		else
		{
			waitingDialog.show();
			$.ajax(
			{
				type: 'POST',
				data:
				{
					'idssrn'  :sasaran,
					'idukd'   :ukkd,
					'op'      :op,
					'trgt'    :trgt,
					'thn'     :thn,
					'operator':operator,
					'sat'			:sat
				},
				url:base_url+'admin/target/page/addtarget',
				success:function()
				{
					waitingDialog.hide();
					$('#tambah').modal('hide');
					alertify.set('notifier','position','top-center');
    			alertify.success("Data berhasil disimpan");
    			location.reload();
				}
			});
		}

	});

	// $("button[name|='btn-edt']").on('click',function()
	// {

	// 	var iddelete = $(this).closest('tr').find('#idtarget').val();
	// 	$('#mdl-edit').modal('show');

	// 	$('#id-target').val(iddelete);

	// 	console.log(iddelete);

	// })

	// $("button[name|='btn-hps']").on('click',function()
	// {

	// 	var iddelete = $(this).closest('tr').find('#idtarget').val();
	// 	console.log(iddelete);
	// 	alertify.confirm('Hapus ?', 'Yakin Anda akan menghapus data Target Tahunan',function()
	// 	{
	// 		waitingDialog.show();
	// 		$.ajax(
	// 		{
	// 			type:'POST',
	// 			data:{'id':iddelete},
	// 			url :base_url+'admin/target/page/deltarget',
	// 			success:function()
	// 			{
	// 				waitingDialog.hide();
	// 				alertify.set('notifier','position','top-center');
	// 				alertify.success("Data berhasil dihapus");
	// 				location.reload();
	// 			}
	// 		})
	// 	}, function()
	// 	{
	// 		location.reload();
	// 	})

	// });

	// $("button[name|='btn-smpn-edt']").on('click',function()
	// {
	// 	var valtth = $('#val-tth').val();
	// 	var idtarget = $('#id-target').val();
	// 	//console.log(iddelete+valtth);
	// 	if(valtth != '')
	// 	{

	// 		waitingDialog.show();
	// 		$.ajax(
	// 		{
	// 			type:"POST",
	// 			data:{'id':idtarget, 'val':valtth},
	// 			url :base_url+"admin/target/page/edttarget",
	// 			success:function()
	// 			{

	// 				$('#mdl-edit').modal('hide');
	// 				waitingDialog.hide();
	// 				alertify.set('notifier','position','top-center');
	// 				alertify.success('Data berhasil dirubah');
	// 				location.reload();
	// 			},
	// 			error:function(jqXHR, textStatus, errorThrown)
	// 			{

	// 				alertify.set('notifier','position','top-center');
	// 				alertify.error('System Error');

	// 			}
	// 		});
	// 	}
	// 	else
	// 	{
	// 		alertify.set('notifier','position','top-center');
	// 		alertify.warning('Data tidak boleh kosong')
	// 	}
	// })



})

$(document).ready(function() {
	$("#trgt, #val-tth").keydown(function (e) {
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