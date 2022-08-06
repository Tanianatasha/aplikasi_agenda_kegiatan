

 <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- Stats -->
      <style type="text/css">
  #munculkan{
      display: none;
    }
  @media only screen
  and (min-device-width : 320px) and (max-device-width : 980px){
    #hilangkan{
      display: none;
    }
    #munculkan{
      display: inline;
    }
  }
</style>
     <section id="server-processing">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                 <h4 class="card-title"> <b>DAFTAR KLASIFIKASI KODE SURAT</b>
                 <!--   <a target="_blank" style="margin: 2px; float: right;" class="btn btn-primary btn-sm" href="<?php echo base_url();?>POLA KLASIFIKASI KODE SURAT/export_pdf"><i class="fa fa-file-pdf-o"></i> EXPORT PDF</a>
                   <span id="munculkan" ><br><br></span> -->
                    <?php if($this->session->userdata('level')=="admin"):?>
                 <button style="margin: 2px; float: right;" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH POLA KLASIFIKASI KODE SURAT</button> <?php endif;?></h4>
              
               
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration" id="mytable">
                      <thead>
                        <tr>
                          <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                          <th>Kode Surat</th>
                          <th>Pola Klasifikasi Surat</th>
                          <th>Singkatan</th>
                          <th>Bagian</th>
                           <?php if($this->session->userdata('level')=="admin"):?>
                          <th style="text-align: right;">Action</th>
                           <?php endif;?>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_kode_surat->result_array() as $i) :
                                            $kode_surat=$i['kode_surat'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['kode_surat'];?></td>
                                              <td><?php echo $i['pola_klasifikasi_surat'];?></td>
                                              <td><?php echo $i['singkatan'];?></td>
                                              <td><?php echo $i['bagian'];?></td>
                                            <?php if($this->session->userdata('level')=="admin"):?>
                                              <td style="flex: 0 0 auto; min-width: 3em; text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $kode_surat;?>"> EDIT</button>
                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $kode_surat;?>"> DELETE</button>
                                                
                                                </div>
                                              </td>
                                            <?php endif;?>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      
        <!--/ Basic Horizontal Timeline -->
      </div>
    </div>
  </div>






    <form  action="<?php echo base_url().'kode_surat/simpan_kode_surat'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH POLA KLASIFIKASI KODE SURAT</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                                 <div class="form-group m-t-20">
                                    <label>Kode Surat <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="kode_surat" required  placeholder="Kode Surat" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>Klasifikasi Surat <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="pola_klasifikasi_surat" required  placeholder="Pola Klasifikasi Surat" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>Singkatan <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="singkatan" required  placeholder="Singkatan" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>Bagian <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="bagian" required  placeholder="Bagian" >
                                </div>

                                

                              
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">TUTUP</button>
                                  <button type="submit" class="btn btn-success">SIMPAN</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>







  <?php foreach ($data_kode_surat->result_array() as $i) :
                                            $kode_surat=$i['kode_surat'];
                                          ?>
       <form  action="<?php echo base_url().'kode_surat/update_kode_surat'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $kode_surat;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE KLASIFIKASI KODE SURAT</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode_surat" value="<?php echo $kode_surat;?>">



                                <div class="form-group m-t-20">
                                    <label>Kode Surat <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['kode_surat'];?>" type="text" class="form-control" name="kode_surat" required  placeholder="Kode Surat" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>Klasifikasi Surat <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['pola_klasifikasi_surat'];?>" type="text" class="form-control" name="pola_klasifikasi_surat" required  placeholder="Pola Klasifikasi Surat" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>Singkatan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['singkatan'];?>" type="text" class="form-control" name="singkatan" required  placeholder="Singkatan" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>Bagian <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['bagian'];?>" type="text" class="form-control" name="bagian" required  placeholder="Bagian" >
                                </div>
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">TUTUP</button>
                                  <button type="submit" class="btn btn-success">UPDATE</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



   <?php foreach ($data_kode_surat->result_array() as $i) :
                                            $kode_surat=$i['kode_surat'];
                                          ?>
       <form  action="<?php echo base_url().'kode_surat/hapus_kode_surat'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $kode_surat;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS KLASIFIKASI KODE SURAT</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $kode_surat;?>">
                         Apakah Anda yakin ingin menghapus data ini?
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">TUTUP</button>
                                  <button type="submit" class="btn btn-warning">HAPUS</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



  



  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>

<script type="text/javascript">
  $().DataTable();
</script>


<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'POLA KLASIFIKASI KODE SURAT BERHASIL DI SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'POLA KLASIFIKASI KODE SURAT BERHASIL DI EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'POLA KLASIFIKASI KODE SURAT BERHASIL DI HAPUS'
})
 </script>
<?php endif; ?>


<?php if($this->session->flashdata('gagal_up') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'error',
  text: 'Format File Gambar SALAH'
})
 </script>
<?php endif; ?>




<?php if($this->session->flashdata('kd') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'error',
  text: 'Kode Surat Sudah ada!'
})
 </script>
<?php endif; ?>



