   <!-- main menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true" style="background-color: #688754!important;">
      <!-- main menu header-->
      
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" style="background-color: #688754!important;">
             <li class=" navigation-header">
        <center>
          <span>Menu Utama</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
          data-original-title="General"></i>
        </center>
        </li>


    
        <li class="<?php if($sidebar=="dashboard"): ?>active<?php endif;?> nav-item"><a href="<?php echo base_url();?>dashboard"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
        </li>


        <li class=" nav-item"><a href="#"><i class="ft-list"></i><span class="menu-title" data-i18n="">Data Master</span></a>
          <ul class="menu-content">
<?php if($this->session->userdata('level')=="admin"):?>
            <li class="<?php if($sidebar=="pengguna"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>pengguna"><i class="fa fa-circle-o"></i>Pengguna</a>
            </li>
<?php endif;?>
            <li class="<?php if($sidebar=="pegawai"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>pegawai"><i class="fa fa-circle-o"></i>Pegawai</a>
            </li>

            <li class="<?php if($sidebar=="jabatan"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>jabatan"><i class="fa fa-circle-o"></i>Jabatan</a>
            </li>

            <li class="<?php if($sidebar=="pangkat"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>pangkat"><i class="fa fa-circle-o"></i>Pangkat</a>
            </li>

            <li class="<?php if($sidebar=="kode_surat"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>kode_surat"><i class="fa fa-circle-o"></i>Kode Surat</a>
            </li>

            <li class="<?php if($sidebar=="sifat_surat"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>sifat_surat"><i class="fa fa-circle-o"></i>Sifat Surat</a>
            </li>

            <li class="<?php if($sidebar=="bidang_kegiatan"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>bidang_kegiatan"><i class="fa fa-circle-o"></i>Bidang Kegiatan</a>
            </li>
            
          </ul>
        </li>


        <li class=" nav-item"><a href="#"><i class="fa fa-envelope"></i><span class="menu-title" data-i18n="">E-Arsip</span></a>
          <ul class="menu-content">

            <li class="<?php if($sidebar=="surat_masuk"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>surat_masuk"><i class="fa fa-circle-o"></i>Surat Masuk</a>
            </li>
            <li class="<?php if($sidebar=="surat_keluar"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>surat_keluar"><i class="fa fa-circle-o"></i>Surat Keluar</a>
            </li>
            <li class="<?php if($sidebar=="sppd"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>sppd"><i class="fa fa-circle-o"></i>SPPD</a>
            </li>
            <li class="<?php if($sidebar=="surat_tugas"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>surat_tugas"><i class="fa fa-circle-o"></i>Surat Tugas</a>
            </li>
            <li class="<?php if($sidebar=="surat_keputusan"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>surat_keputusan"><i class="fa fa-circle-o"></i>Surat Keputusan</a>
            </li>
            
          </ul>
        </li>


        <li class=" nav-item"><a href="#"><i class="fa fa-calendar"></i><span class="menu-title" data-i18n="">Agenda Kegiatan</span></a>
          <ul class="menu-content">

             <li class="<?php if($sidebar=="agenda_kegiatan"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>agenda_kegiatan"><i class="fa fa-circle-o"></i>Agenda Kegiatan</a>
            </li>
             <li class="<?php if($sidebar=="hasil_kegiatan"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>hasil_kegiatan"><i class="fa fa-circle-o"></i>Hasil Kegiatan</a>
            </li>
            
          </ul>
        </li>


     




         <li class=" nav-item"><a href="#"><i class="fa fa-print"></i><span class="menu-title" data-i18n="">Laporan Rekap</span></a>
          <ul class="menu-content">

            <li class="<?php if($sidebar=="agenda_kegiatan2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>agenda_kegiatan/lihat"><i class="fa fa-circle-o"></i>Agenda Kegiatan</a>
            </li>

            <li class="<?php if($sidebar=="hasil_kegiatan2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>hasil_kegiatan/lihat"><i class="fa fa-circle-o"></i>Hasil Kegiatan</a>
            </li>

            <li class="<?php if($sidebar=="surat_masuk2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>surat_masuk/lihat"><i class="fa fa-circle-o"></i>Surat Masuk</a>
            </li>

            <li class="<?php if($sidebar=="surat_keluar2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>surat_keluar/lihat"><i class="fa fa-circle-o"></i>Surat Keluar</a>
            </li>

            <li class="<?php if($sidebar=="surat_masuk3"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>surat_masuk/lihat2"><i class="fa fa-circle-o"></i>Disposisi</a>
            </li>

            <li class="<?php if($sidebar=="sppd2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>sppd/lihat"><i class="fa fa-circle-o"></i>SPPD</a>
            </li>

            <li class="<?php if($sidebar=="surat_tugas2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>surat_tugas/lihat"><i class="fa fa-circle-o"></i>Surat Tugas</a>
            </li>

            <li class="<?php if($sidebar=="surat_keputusan2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>surat_keputusan/lihat"><i class="fa fa-circle-o"></i>Surat Keputusan</a>
            </li>

            <li class="<?php if($sidebar=="grafik2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>grafik/lihat"><i class="fa fa-circle-o"></i>Grafik Agenda <br>Kegiatan</a>
            </li>

            
          </ul>
        </li>



      <li><a href="<?php echo base_url();?>login/logout"><i class="ft-log-out"></i><span class="menu-title" data-i18n="">Logout</span></a>
        </li>
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->