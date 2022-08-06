
<style type="text/css">
  #overlay4 {
    background: #ffffff;
    color: #666666;
    position: fixed;
    height: 100%;
    width: 100%;
    z-index: 5000;
    top: 0;
    left: 0;
    float: left;
    text-align: center;
    padding-top: 25%;
    display: none;
  }
</style>
<div id="overlay4">
  <img src="<?php echo base_url();?>assets/load2.gif" alt="Loading" /><br/>
  HARAP TUNGGU, SEDANG MEMPROSES DATA
</div>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/css/pages/users.css"> 

 <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- Stats -->



        <div class="row">
<?php if($this->session->userdata('level')!="pegawai"):?>
            <div class="col-xl-6 col-lg-3 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-success">
                      <i class="fa fa-envelope font-large-2 white"></i>
                    </div>
                    <div class="p-2 media-body">
                      <h6 style="font-size: 13px; font-weight: bold; font-family: 'Times New Roman'" class="success">JUMLAH SURAT MASUK</h6>
                       <h5 style="font-weight: bold; font-family: 'Times New Roman'" class="text-bold-400 mb-0"><?php $jum=$this->db->query("SELECT * FROM sppd")->num_rows(); echo $jum;?></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-lg-3 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-primary">
                      <i class="fa fa-envelope font-large-2 white"></i>
                    </div>
                    <div class="p-2 media-body">
                      <h6 style="font-size: 13px; font-weight: bold; font-family: 'Times New Roman'" class="success">JUMLAH SURAT KELUAR</h6>
                       <h5 style="font-weight: bold; font-family: 'Times New Roman'" class="text-bold-400 mb-0"><?php $jum=$this->db->query("SELECT * FROM surat_tugas")->num_rows(); echo $jum;?></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>



           <div class="col-lg-12 mb-12">

        <!-- Project Card Example -->

        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">VISI & MISI</h6>
                <div class="card-body">
                  <b>VISI</b><br>
                  <ol>
                 <li> BERSAMA MEWUJUDKAN TAPIN MAJU, SEJAHTERA DAN AGAMIS.</li>
                  </ol>
                  <br>
                  <br>
                  <b>MISI</b><br>
                  <ol>
                  <li>Meningkatkan kemampuan organisasi dalam menjalankan tugas pokok dan fungsi..</li>
<li>Meningkatkan kualitas hasil monitoring dan evaluasi kerja Dinas Pemuda dan Olahraga.</li>
<li>Mewujudkan kemandirian pemuda yang berkarakter, berkapasitas, berprestasi dan berdaya saing.</li>
<li>Mewujudkan masyarakat yang sehat jasmani, rohani dan berprestasi.</li>
<li>Meningkatkan kualitas sarana prasarana pelayanan publik.</li>
  </ol>
            </div>
            </div>
            
        </div>
        



    </div>

<?php endif;?>


      
     

            

             


          </div>

        
          
          



        <div class="row">

    <!-- Content Column -->
 




</div>


        <!--/ Product sale & buyers -->
        
        <!-- Social & Weather -->
      
        <!-- Basic Horizontal Timeline -->
      
        <!--/ Basic Horizontal Timeline -->
      </div>
    </div>
  </div>

    <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>





  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/extensions/jquery.knob.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/charts/jquery.sparkline.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo base_url();?>assets/template/app-assets/js/scripts/pages/dashboard-fitness.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>



<?php if($this->session->flashdata('berhasil_simpan_topten') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: '----',
})
 </script>
<?php endif; ?>




 


