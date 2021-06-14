<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UKM Administrator | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>SISTEM INFORMASI MONITORING KEGIATAN UKM DI POLINEMA</b></a>
    
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div id="sukses"></div>
    <p class="login-box-msg">Silahkan login di bawah ini.</p>

    <form action="" method="post" id="formLogin">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" id="user" placeholder="Username" autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="pass" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" id="kirim" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!--
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
     /.social-auth-links -->

    <a href="#">I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
      $("#kirim").click(function() {
        //cek data user
        $.ajax({
            url: '<?php echo base_url(); ?>webmin/login',
            type: 'POST',
            dataType: 'json',
            data: $('#formLogin').serialize(),
        })
        .done(function(data) {
            if (data.pesan == "berhasil") 
            {
              $("#sukses").fadeIn('slow').html("<br><div class='alert alert-success'><b>Anda berhasil login ! </b><i>Sedang mengalihkan</i></div>");
              setTimeout(function() {
                window.location="<?php echo base_url(); ?>webmin";
              }, 1000);
            } else if(data.pesan == "gagal"){
              $("#sukses").fadeIn('slow').html("<br><div class='alert alert-danger'><b>Sistem Gagal !</b></div>");
              setTimeout(function() {
                $("#sukses").fadeOut('slow');
              }, 700);
              $('#user').val("");
              $('#pass').val("");
              $('#user').focus();
            } else {
              $("#sukses").fadeIn('slow').html("<br><div class='alert alert-info'><b>Username dan Password salah !</b></div>");
              setTimeout(function() {
                $("#sukses").fadeOut('slow');
              }, 700);
              $('#user').val("");
              $('#pass').val("");
              $('#user').focus();
            }
        })
        .fail(function() {
          alert("gagal sistem");
        });
        return false
      });
  });
</script>
</body>
</html>
