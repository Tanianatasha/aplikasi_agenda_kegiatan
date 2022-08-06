<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sistem Informasi Kejaksaan Tinggi Kalimantan Selatan</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/logo.png">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/foundation/6.2.0/foundation.min.css'>

      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/buku.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/book.css">
  
</head>

<body>

  <div id="main-container" class="main-container nav-effect-1">

  <nav class="nav-menu nav-effect-1" id="menu-1">
    <h2 class=""></h2>
    <ul>
      <li><a class="" href="<?php echo base_url();?>admin">Login Admin</a></li>
    </ul>
  </nav>

  <div class="main clearfix">

    <!-- Header Content -->
    <header id="header" class="page-header">
      <div class="page-header-container row">

        <!-- Logo -->
        <div class="main-logo">
          <a href="#" class="logo"></a>
        </div>

        <div class="menu-search">
          <!-- Main Navigation -->
          <div class="main-navigation">
            <a href="#">Menu</a>
          </div>

          <!-- Search -->
          <div class="catalog-search">
            <input class="shuffle-search input_field " type="search" autocomplete="off" value="" maxlength="128" id="input-search" />
            <label class="input_label" for="input-search">
              <span class="input_label-content">Cari Buku</span>
              <span class="input_label-search"></span>
            </label>
          </div>

        </div>
      </div>
    </header>


    <!-- Main Section -->
    <div class="page-container">

      <div class="page-title category-title">
        <!-- <h1>Book Viewer</h1> -->
      </div>

      <section id="book_list">

        <div class="toolbar row">
          <div class="filter-options small-12 medium-9 columns">
            <a href="#" class="filter-item active" data-group="all">Semua Kategori</a>
            <a href="#" class="filter-item" data-group="buku">Buku / Referensi</a>
            <a href="#" class="filter-item" data-group="majalah">Majalah</a>
            <a href="#" class="filter-item" data-group="peraturan">Peraturan</a>
          </div>

          
        </div>

        <div class="grid-shuffle">
          <ul id="grid" class="row">

          <?php foreach($data_daskrimti_buku as $row): ?>
          
          	<li class="book-item small-12 medium-6 columns" data-groups='["buku"]' data-date-created='2005' data-title="Harry Potter and the Half-Blood Prince" data-color='#658539'>
              <div class="bk-img">
                <div class="bk-wrapper">
                <?php if($row->cover_pustaka == ""): ?> 
                  <div class="book">
                  <div class="title">
                      <center>
                      <img style="margin: 6px 0px 0px 0px" src="<?php echo base_url();?>assets/logo.png" width="50px" height="50px">
                      <p style="font-size: 15pt; color: white; "><b>BUKU</b></p>
                    </center>
                  </div>
                  </div>
                  <?php endif; ?>
                    <?php if($row->cover_pustaka == TRUE ): ?> 
                    	
                  <img style="margin: 6px 0px 0px 0px" src="<?php echo base_url(). 'assets/cover_pustaka/'.$row->cover_pustaka;?>" width="130px" height="190px">
              
                <?php endif; ?>
   
                </div>
              </div>
              <div class="item-details">
                <h3 class="book-item_title"><?php echo $row->judul_buku;?></h3>
                <p class="author"><?php echo $row->nama_pengarang;?></p>
                <p><?php echo $row->abstrak;?></p>
                <a href="#" class="button ">Details</a>
              </div>
              <div class="overlay-details">
                <a href="#" class="close-overlay-btn">Tutup</a>
                <div class="overlay-image">
                <?php if($row->cover_pustaka == ""): ?> 
                  <div class="book">
                  <div class="title">
                      <center>
                      <img style="margin: 6px 0px 0px 0px" src="<?php echo base_url();?>assets/logo.png" width="50px" height="50px">
                      <p style="font-size: 15pt; color: white; "><b>BUKU</b></p>
                    </center>
                  </div>
                </div>
                <?php endif; ?>
                <?php if($row->cover_pustaka == TRUE ): ?> 
                  <img style="margin: 6px 0px 0px 0px" src="<?php echo base_url(). 'assets/cover_pustaka/'.$row->cover_pustaka;?>" width="130px" height="190px">
                <?php endif; ?>
                </div>
                <div class="overlay-desc activated">
                  <h2 class="overlay_title"><?php echo $row->judul_buku;?></h2>
                  <p>Nama Pengarang : <?php echo $row->nama_pengarang;?></p>
                  <p>Penerbit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row->penerbit;?></p>
                  <p>Tahun terbit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :<?php echo $row->tahun_terbit;?></p>
                  <p>Abstrak&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :<?php echo $row->abstrak;?></p>
                  
                </div>
                
              </div>
            </li>

            
             <?php endforeach; ?>



                       <?php foreach($data_daskrimti_majalah as $row): ?>
          
          	<li class="book-item small-12 medium-6 columns" data-groups='["majalah"]' data-date-created='2005' data-title="Harry Potter and the Half-Blood Prince" data-color='#658539'>
              <div class="bk-img">
                <div class="bk-wrapper">
                <?php if($row->cover_pustaka == ""): ?> 
                  <div class="book">
                  <div class="title">
                      <center>
                      <img style="margin: 6px 0px 0px 0px" src="<?php echo base_url();?>assets/logo.png" width="50px" height="50px">
                      <p style="font-size: 15pt; color: white; "><b>MAJALAH</b></p>
                    </center>
                  </div>
                  </div>
                  <?php endif; ?>
                    <?php if($row->cover_pustaka == TRUE ): ?> 
                    	
                  <img style="margin: 6px 0px 0px 0px" src="<?php echo base_url(). 'assets/cover_pustaka/'.$row->cover_pustaka;?>" width="130px" height="190px">
              
                <?php endif; ?>
   
                </div>
              </div>
              <div class="item-details">
                <h3 class="book-item_title"><?php echo $row->judul_majalah;?></h3>
                <p class="author"><?php echo $row->penerbit;?></p>
                <p><?php echo $row->kala_terbit;?></p>
                <a href="#" class="button ">Details</a>
              </div>
              <div class="overlay-details">
                <a href="#" class="close-overlay-btn">Tutup</a>
                <div class="overlay-image">
                <?php if($row->cover_pustaka == ""): ?> 
                  <div class="book">
                  <div class="title">
                      <center>
                      <img style="margin: 6px 0px 0px 0px" src="<?php echo base_url();?>assets/logo.png" width="50px" height="50px">
                      <p style="font-size: 15pt; color: white; "><b>MAJALAH</b></p>
                    </center>
                  </div>
                </div>
                <?php endif; ?>
                <?php if($row->cover_pustaka == TRUE ): ?> 
                  <img style="margin: 6px 0px 0px 0px" src="<?php echo base_url(). 'assets/cover_pustaka/'.$row->cover_pustaka;?>" width="130px" height="190px">
                <?php endif; ?>
                </div>
                <div class="overlay-desc activated">
                    <h2 class="overlay_title"><?php echo $row->judul_majalah;?></h2>
                  <p>Penerbit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row->penerbit;?></p>
                  <p>Tempat Terbit &nbsp;&nbsp;: <?php echo $row->tempat_terbit;?></p>
                  <p>Kala Terbit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :<?php echo $row->kala_terbit;?></p>
                  <p>volume &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :<?php echo $row->volume;?></p>
                  
                </div>
                
              </div>
            </li>

            
             <?php endforeach; ?>

                                    <?php foreach($data_daskrimti_peraturan as $row): ?>
          
          	<li class="book-item small-12 medium-6 columns" data-groups='["peraturan"]' data-date-created='2005' data-title="Harry Potter and the Half-Blood Prince" data-color='#658539'>
              <div class="bk-img">
                <div class="bk-wrapper">
                <?php if($row->cover_pustaka == ""): ?> 
                  <div class="book">
                  <div class="title">
                      <center>
                      <img style="margin: 6px 0px 0px 0px" src="<?php echo base_url();?>assets/logo.png" width="50px" height="50px">
                      <p style="font-size: 15pt; color: white; "><b>PERATURAN</b></p>
                    </center>
                  </div>
                  </div>
                  <?php endif; ?>
                    <?php if($row->cover_pustaka == TRUE ): ?> 
                    	
                  <img style="margin: 6px 0px 0px 0px" src="<?php echo base_url(). 'assets/cover_pustaka/'.$row->cover_pustaka;?>" width="130px" height="190px">
              
                <?php endif; ?>
   
                </div>
              </div>
              <div class="item-details">
                <h3 class="book-item_title"><?php echo $row->judul_peraturan;?></h3>
                <p class="author"><?php echo $row->penerbit;?></p>
                <p><?php echo $row->tempat_terbit;?></p>
                <a href="#" class="button ">Details</a>
              </div>
              <div class="overlay-details">
                <a href="#" class="close-overlay-btn">Tutup</a>
                <div class="overlay-image">
                <?php if($row->cover_pustaka == ""): ?> 
                  <div class="book">
                  <div class="title">
                      <center>
                      <img style="margin: 6px 0px 0px 0px" src="<?php echo base_url();?>assets/logo.png" width="50px" height="50px">
                      <p style="font-size: 15pt; color: white; "><b>PERATURAN</b></p>
                    </center>
                  </div>
                </div>
                <?php endif; ?>
                <?php if($row->cover_pustaka == TRUE ): ?> 
                  <img style="margin: 6px 0px 0px 0px" src="<?php echo base_url(). 'assets/cover_pustaka/'.$row->cover_pustaka;?>" width="130px" height="190px">
                <?php endif; ?>
                </div>
                <div class="overlay-desc activated">
                    <h2 class="overlay_title"><?php echo $row->judul_peraturan;?></h2>
                  <p>Penerbit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row->penerbit;?></p>
                  <p>Tempat Terbit &nbsp;&nbsp;: <?php echo $row->tempat_terbit;?></p>
                  <p>Tahun Terbit &nbsp;&nbsp;&nbsp;&nbsp; :<?php echo $row->tahun_terbit;?></p>
                  <p>No Peraturan &nbsp;&nbsp; :<?php echo $row->nomor;?></p>
                  
                </div>
                
              </div>
            </li>

            
             <?php endforeach; ?>
           

          </ul>
        </div>

      </section>

    </div>

    <!-- Footer Content -->
    <footer id="footer" class="page-footer">
      <div class="row footer-wrapper">
        <div class="copyright small-12 columns">&copy; Bidang Pembinaan Kejati Kalsel. 2018</div>
      </div>
    </footer>

  </div>
  <!-- /main -->

  <div class="main-overlay">
    <div class="overlay-full"></div>
  </div>

</div>
<!-- /main-container -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/foundation/6.2.0/foundation.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Shuffle/4.0.0/shuffle.min.js'></script>

  

    <script  src="<?php echo base_url();?>assets/js/buku.js"></script>




</body>

</html>
