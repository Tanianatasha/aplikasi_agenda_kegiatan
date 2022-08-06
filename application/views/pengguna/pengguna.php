

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
                 <h4 class="card-title"> <b>Daftar Pengguna</b>
                 <!--   <a target="_blank" style="margin: 2px; float: right;" class="btn btn-primary btn-sm" href="<?php echo base_url();?>pengguna/export_pdf"><i class="fa fa-file-pdf-o"></i> EXPORT PDF</a>
                   <span id="munculkan" ><br><br></span> -->
                   <?php if($this->session->userdata('level')=="admin"):?>
                 <button style="margin: 2px; float: right;" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PENGGUNA</button>
                 <?php endif;?></h4>
              
               
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration" id="mytable">
                      <thead>
                        <tr>
                          <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                          <th>Username</th>
                          <th>Nama Lengkap</th>
                          <th>Alamat</th>
                          <th>No HP</th>
                          <th>Level</th>
                          <?php if($this->session->userdata('level')=="admin"):?>
                          <th style="text-align: right;">Action</th>
                            <?php endif;?>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_pengguna->result_array() as $i) :
                                            $id_pengguna=$i['id_pengguna'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['username'];?></td> 
                                              <td><?php echo $i['nama_lengkap'];?></td>
                                              <td><?php echo $i['alamat'];?></td>
                                              <td><?php echo $i['no_hp'];?></td>
                                              <td>
                                                <?php if($i['level']=="admin"):?>
                                                  <button style="margin: 2px;" type="button" class="btn btn-success mdi mdi-pencil btn-sm"> ADMIN</button>
                                                <?php else:?>
                                                  <button style="margin: 2px;" type="button" class="btn btn-primary mdi mdi-pencil btn-sm"> PIMPINAN</button>
                                                <?php endif;?>
                                              </td>
                                           
                                           <?php if($this->session->userdata('level')=="admin"):?>
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pengguna;?>"> EDIT</button>
                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pengguna;?>"> DELETE</button>
                                                
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






    <form  action="<?php echo base_url().'pengguna/simpan_pengguna'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH PENGGUNA</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                                 <div class="form-group m-t-20">
                                    <label>Username <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="username" required  placeholder="Username" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Password <span style="color: red;">*</span></label>
                                    <input type="password" autocomplete="new-password" class="form-control" name="password" required  placeholder="Password" >
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Nama pengguna <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_lengkap" required  placeholder="Nama pengguna" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Alamat <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="alamat" required=""></textarea>
                                </div>



                                <div class="form-group m-t-20">
                                    <label>No HP <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="no_hp" required  placeholder="No HP" >
                                </div> 

                                <div class="form-group m-t-20">
                                    <label>Level <span style="color: red;">*</span></label>
                                    <select class="form-control" name="level" required>
                                      <option value="">--pilih level--</option>
                                      <option value="admin">ADMIN</option>
                                      <option value="pimpinan">PIMPINAN</option>
                                    </select>
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







  <?php foreach ($data_pengguna->result_array() as $i) :
                                            $id_pengguna=$i['id_pengguna'];
                                          ?>
       <form  action="<?php echo base_url().'pengguna/update_pengguna'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pengguna;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE PENGGUNA</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna;?>">


                                <div class="form-group m-t-20">
                                    <label>Username <span style="color: red;">*</span></label>
                                    <input  value="<?php echo $i['username'];?>" type="text" class="form-control" name="username" required  placeholder="Username" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Password </label>
                                    <input type="password" autocomplete="new-password" class="form-control" name="password"   placeholder="Password" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Nama pengguna <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['nama_lengkap'];?>" type="text" class="form-control" name="nama_lengkap" required  placeholder="Nama pengguna" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Alamat <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="alamat" required=""><?php echo $i['alamat'];?></textarea>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>No HP <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['no_hp'];?>" type="text" class="form-control" name="no_hp" required  placeholder="No HP" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Level <span style="color: red;">*</span></label>
                                    <select class="form-control" name="level" required>
                                      <option value="">--pilih level--</option>
                                      <option <?= ($i['level']=="admin")?'selected':'';?> value="admin">ADMIN</option>
                                      <option <?= ($i['level']=="pimpinan")?'selected':'';?> value="pimpinan">PIMPINAN</option>
                                    </select>
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



   <?php foreach ($data_pengguna->result_array() as $i) :
                                            $id_pengguna=$i['id_pengguna'];
                                          ?>
       <form  action="<?php echo base_url().'pengguna/hapus_pengguna'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pengguna;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS PENGGUNA</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pengguna;?>">
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
  text: 'Pengguna Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Pengguna Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Pengguna Berhasil di HAPUS'
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



