function editUser(id, nama, email)
  {
  	//return alert(id);
  	//$("#mdl-edt").modal("show");
  	$("#mdl-edt").on('show.bs.modal',function()
  	{
  		$(this).find('.modal-title').empty();
  		$(this).find('.modal-title').append("<i class='glyphicon glyphicon-user'></i> Edit Nama <i>"+nama+"</i>");
  		$("#edtName").val(nama);
  		$("#edtEmail").val(email);
  		$("#idEdit").val(id);
  	}).modal('show');
  	console.log(id);
  	return false;
  }

  function hpsUser(id, nama)
  {
  	alertify.confirm('Hapus', 'Yakin akan menghapus User '+nama+ " ?",
  		function()
  		{
  			waitingDialog.show();
  			$.ajax(
  			{
  				type:"post",
  				data:{'id':id},
  				url:base_url+"/admin/user/page/usrdel",
  				success:function()
  				{
  					waitingDialog.hide();
  					alertify.success("Data berhasil dihapus");
  					location.reload();
  				}
  			})
  		},
  		function()
  		{
  		  alertify.error('Cancel')
  		});
  }

  function rstPass(id, user)
  {
  	alertify.confirm('Reset Password', 'Yakin akan mereset password User '+user+ " ?",
  		function()
  		{
  			waitingDialog.show();
  			$.ajax(
  			{
  				type:"post",
  				data:{'id':id,'usr':user},
  				url:base_url+"/admin/user/page/usrrst",
  				success:function()
  				{
  					waitingDialog.hide();
  					alertify.success("Data berhasil direset");
  					location.reload();
  				}
  			})
  		},
  		function()
  		{
  		  alertify.error('Cancel')
  		});
  }


	$(document).ready(function()
	{

	  $('#tb_pkms').DataTable(
	  	{
	  		responsive:true
	  	});


	  $("#btn-add").on('click',function()
	  {
	  	$("#mdl-add").modal('show');
	  });

	  $("#btn-save").on('click',function()
	  {
	  	waitingDialog.show();

	  	var nama   = $('#addName').val();
	  	var user   = $("#addUser").val();
	  	var pass   = $("#addPass").val();
	  	var rePswd = $("#rePassAdd").val();
	  	var eml    = $("#addEmail").val();

	  	if(pass != rePswd)
	  	{
	  		alertify.warning("Password tidak sama");
	  	}
	  	else
	  	{
	  		$.ajax(
	  		{
	  			type:'post',
	  			data:
	  			{
	  				'nama' :nama,
	  				'uname':user,
	  				'pass' :rePswd,
	  				'email':eml
	  			},
	  			url:base_url+"admin/user/page/usradd",
	  			success:function()
	  			{
	  				waitingDialog.hide();
	  				alertify.success("Data berhasil disimpan");
	  				location.reload();
	  			}
	  		})
	  	}
	  });

	  $("#btn-update").on('click',function()
	  {
	  	waitingDialog.show();

	  	var edtNama = $("#edtName").val();
	  	var edtEmail = $("#edtEmail").val();
	  	var id = $("#idEdit").val();

	  	$.ajax(
	  	{
	  		type:"post",
	  		data:{'id':id, 'nama':edtNama, 'email':edtEmail},
	  		url:base_url+"admin/user/page/usredit",
	  		success:function()
	  		{
	  			waitingDialog.hide();
	  			alertify.success("Data berhasil dirubah");
	  			location.reload();
	  		}
	  	})
	  })
	});