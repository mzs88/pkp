<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Icon Header -->
  <link rel="icon" type="image/png" href="<?=base_url()?>assets/image/favicon/favicon.ico">

  <!-- Bootstrap Core CSS -->
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="<?=base_url()?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?=base_url()?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

   <!-- Alertify CSS -->
  <link href="<?=base_url()?>assets/vendor/alertify/css/alertify.min.css" rel="stylesheet" type="text/css">

  <!-- Custom Fonts -->
  <link href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- jQuery -->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="<?=base_url()?>assets/vendor/metisMenu/metisMenu.min.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="<?=base_url()?>assets/dist/js/sb-admin-2.js"></script>

   <!-- Alert JavaScript -->
  <script src="<?=base_url()?>assets/vendor/waitingfor/waitingfor.js"></script>
  <script src="<?=base_url()?>assets/vendor/alertify/alertify.min.js"></script>
  <script>
    var base_url = "<?= base_url() ?>";
  </script>

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">Silahkan Login</h3>
          </div>
          <div class="panel-body">
            <form action="<?= base_url() ?>c_login/verifikasi" method="POST" onsubmit="return chekForm()">
              <fieldset>
                <div class="form-group">
                  <input class="form-control" id="userName" placeholder="Username" name="UserName" type="text" autofocus>
                </div>
                <div class="form-group">
                  <input class="form-control" id="passWord" placeholder="Password" name="PassWord" type="password" value="">
                </div>
                <div class="checkbox">
                  <label>
                      <input name="remember" type="checkbox" value="Remember Me">Remember Me
                  </label>
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <button class="btn btn-lg btn-success btn-block"" type="submit" id="btnLogin" name="BtnLogin">Login</button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function chekForm()
    {
      var userName = $("#passWord").val();
      var passWord = $("#passWord").val();

      if(!$("#userName").val())
      {
        alertify.warning("Username Kosong");
        $("userName").focus();
        return false;
      }

      if (!$("#passWord").val())
      {
        alertify.warning("Password Kosong");
        $("#passWord").focus();
        return false;
      }

      waitingDialog.show();
    };

    var sesInfo = "<?= $this->session->flashdata('Error', 'Login Gagal'); ?>"
    if(sesInfo)
    {
      alertify.error(sesInfo);
    }

    // $(document).ready(function()
    // {
    //   $("#btnLogin").on("click",function()
    //   {
    //     var userName = $("#passWord").val();
    //     var passWord = $("#passWord").val();

    //     if(!$("#userName").val())
    //     {
    //       alertify.warning("Username Kosong");
    //       $("userName").focus();
    //       return false;
    //     }

    //     if (!$("#passWord").val())
    //     {
    //       alertify.warning("Password Kosong");
    //       $("#passWord").focus();
    //       return false;
    //     }

    //     waitingDialog.show();

    //     $.ajax(
    //     {
    //       type:"post",
    //       data:{"uname":userName, "pass":passWord},
    //       url:base_url+"c_login/verifikasi",
    //       success:function(data)
    //       {
    //         if (data=="Admin")
    //         {
    //           window.location.href = base_url+"c_admin_home";
    //           //return true;
    //         }
    //         if(data=="Pkms")
    //         {
    //           window.location.href = base_url+"c_pkms_home";
    //           //return true;
    //         }
    //         waitingDialog.hide();
    //       }
    //     })
    //   })
    // })
  </script>

</body>

</html>
