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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/vendors/css/extensions/unslider.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/vendors/css/weather-icons/climacons.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/fonts/meteocons/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/css/app.css">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/css/pages/timeline.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/assets/css/style.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/vendors/css/forms/toggle/switchery.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/css/plugins/forms/validation/form-validation.css">
  
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <?php 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format((int)$angka,0,',','.');
  return $hasil_rupiah;
}
?>

     <?php 
function kirikananf($angka){
  
  $hasil_rupiah = "" . number_format((int)$angka,0,',','.');
  return $hasil_rupiah;
}
?>
<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}?>
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
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"  
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark bg-gradient-x-default navbar-shadow" style="background-color: #688754;" >
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <!-- <li class="nav-item">
            <a class="navbar-brand" href="#">
            
               <img class="brand-text text-center" width="80px" height="40px" src="<?php echo base_url();?>assets/logo.png">
               <h2 class="brand-text" style="font-size: 17px">TOPCOM</h2>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="navbar-brand" href="#">
              <img class="brand-logo" alt="stack admin logo" width="30" height="34" src="<?php echo base_url();?>assets/logo.png">
              <marquee direction="left"><h2 class="brand-text" style="font-size: 18px">SISTEM INFORMASI AGENDA KEGIATAN DAN DATA E-ARSIP SURAT MENYURAT DINAS PEMUDA DAN OLAHRAGA KABUPATEN TAPIN</h2></marquee>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
       
           
          </ul>
          <ul class="nav navbar-nav float-right">
         
          
           
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="avatar avatar-online">


                  <?php if (empty($this->session->userdata('foto'))):?>
                      <img src="<?php echo base_url();?>assets/image/profil3.png" class="round" alt="avatar" >
                  <?php else:?>
                      <img src="<?php echo base_url();?>assets/image/<?php echo $this->session->userdata('foto'); ?>" class="round" alt="avatar" >
                  <?php endif;?>
                  

              <i></i></span>
                <span class="user-name"><?php echo $this->session->userdata('nama_lengkap'); ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><!-- <a class="dropdown-item" href="<?php echo base_url();?>profile"><i class="ft-user"></i> Edit Profile</a> -->
                <a class="dropdown-item" href="<?php echo base_url();?>login/logout"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

