
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>SISTEM INFORMASI AGENDA KEGIATAN DAN DATA E-ARSIP SURAT MENYURAT DINAS PEMUDA DAN OLAHRAGA KABUPATEN TAPIN</title>
  <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/logo.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/logo.png">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/css/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS--> 
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/css/app.css">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/css/pages/login-register.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/assets/css/style.css">
  <link href="<?php echo base_url();?>assets/alert/sweetalert2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/alert/sweetalert2.min.css" rel="stylesheet">
  <script src="<?php echo base_url();?>assets/alert/sweetalert2.min.js"></script>
 <script src="<?php echo base_url();?>assets/alert/sweetalert2.js"></script>
  <!-- END Custom CSS-->
</head>
<style type="text/css">
  
  body {
    background: rgba(0, 0, 0, .20) url('<?php echo base_url();?>assets/bg.PNG')!important;
    background-blend-mode: darken;
    background-repeat: no-repeat!important;
    background-size: cover!important;
    position: static!important;
  }
</style>
<body class="vertical-layout vertical-menu 1-column  blank-page blank-page"
data-open="click" data-menu="vertical-menu" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-12 box-shadow-1 p-0">
              <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                      <br>
                    <img src="<?php echo base_url();?>assets/logo.png" width="80px"  alt="branding logo">
                    <h5 style="font-weight: bold; font-family: 'Times New Roman'; font-weight: bold; color: black;">SISTEM INFORMASI AGENDA KEGIATAN DAN DATA E-ARSIP SURAT MENYURAT DINAS PEMUDA DAN OLAHRAGA KABUPATEN TAPIN</h5>
                  </div>
                  
                </div>
                <div class="card-content">
                <h4 style="text-shadow: 0px 0px 0.5px#000000; font-weight: bold; font-size: 19px;" ><center></center></h4>
                  <div class="card-body">
                    <form class="form-horizontal" action="<?php echo base_url();?>login/aksi_login" method="POST" novalidate>
                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="username" name="username" class="form-control"  placeholder="Username"
                        required>
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </fieldset>

                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" name="password" class="form-control"  placeholder="Password"
                        required>
                        <div class="form-control-position">
                          <i class="fa fa-key"></i>
                        </div>
                      </fieldset>
                   <div class="form-group row">
                    <div class="col-md-6 col-12 text-center text-md-left">
                     
                    </div>
                  </div>
                      <button type="submit" class="btn btn-success btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
                  <div class="card-body">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="<?php echo base_url();?>assets/template/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
</body>
</html>

<?php if($this->session->flashdata('username_salah') == TRUE): ?>
 <script type="text/javascript">
 swal("", "Username Tidak Ditemukan!", "error");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('pw_salah') == TRUE): ?>
 <script type="text/javascript">
 swal("", "Password Anda Salah!", "error");
 </script>
<?php endif; ?>



<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
 swal("", "AKUN ANDA BERHASIL DI BUAT, SILAHKAN LOGIN", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_up') == TRUE): ?>
 <script type="text/javascript">
 swal("", "PASSWORD ANDA BERHASIL DI UBAH, SILAHKAN LOGIN KEMBALI", "success");
 </script>
<?php endif; ?>