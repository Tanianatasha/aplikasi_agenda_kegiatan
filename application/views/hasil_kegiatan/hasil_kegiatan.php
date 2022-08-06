

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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <section id="server-processing">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                 <h4 class="card-title"> <b>Daftar Hasil Kegiatan</b>
                 <!--   <a target="_blank" style="margin: 2px; float: right;" class="btn btn-primary btn-sm" href="<?php echo base_url();?>hasil_kegiatan/export_pdf"><i class="fa fa-file-pdf-o"></i> EXPORT PDF</a>
                   <span id="munculkan" ><br><br></span> -->
                     <?php if($this->session->userdata('level')=="admin"):?>
                 <button style="margin: 2px; float: right;" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH HASIL KEGIATAN</button>
                 <?php endif;?></h4>
              
               
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration table-responsive" id="mytable">
                      <thead>
                        <tr>
                          <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                          <th>Bidang Kegiatan</th>
                          <th>Nama Kegiatan</th>
                          <th>Tempat</th>
                          <th>Bukti</th>
                          <th>Tanggal</th>
                          <th>Hasil</th>
                          <th style="text-align: right;">Action</th>
                          
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_hasil_kegiatan->result_array() as $i) :
                                            $id_hasil_kegiatan=$i['id_hasil_kegiatan'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['nama_bidang_kegiatan'];?></td>
                                              <td><?php echo $i['nama_kegiatan'];?></td>
                                              <td><?php echo $i['tempat'];?></td>
                                               <?php if(empty($i['bukti'])):?>
                                                <td>  <a target="_blank" style="margin: 2px; color:white;" type="button" class="btn btn-warning mdi mdi-pencil btn-sm" > KOSONG</a></td>
                                              <?php else:?>
                                                <td>  <a target="_blank" style="margin: 2px; color:white;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['bukti'];?>" class="btn btn-success mdi mdi-pencil btn-sm" > LIHAT</a></td>
                                              <?php endif;?>
                                              <td><?php echo tgl_indo($i['tanggal']);?></td>
                                               <td><?php echo $i['hasil'];?></td>

                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                          
                                              <?php if($this->session->userdata('level')=="admin"):?>
                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_hasil_kegiatan;?>"> EDIT</button>
                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_hasil_kegiatan;?>"> DELETE</button>
                                               <?php endif;?>
                                                
                                                </div>
                                              </td>
                                             
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






    <form  action="<?php echo base_url().'hasil_kegiatan/simpan_hasil_kegiatan'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH HASIL KEGIATAN</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     

                                <div class="form-group m-t-20">
                                    <label>Agenda Kegiatan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_agenda_kegiatan" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM agenda_kegiatan")->result_array() as $key):?>
                                        <option value="<?php echo $key['id_agenda_kegiatan'];?>"><?php echo $key['nama_kegiatan'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Bukti </label>
                                    <input type="file" class="form-control" name="bukti"   placeholder="Bukti" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tanggal <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal" required  placeholder="Tanggal" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Hasil <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="hasil"></textarea>
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







  <?php foreach ($data_hasil_kegiatan->result_array() as $i) :
                                            $id_hasil_kegiatan=$i['id_hasil_kegiatan'];
                                            $id_pegawai=$i['id_pegawai'];
                                            $check = explode(',', $id_pegawai);
                                          ?>
       <form  action="<?php echo base_url().'hasil_kegiatan/update_hasil_kegiatan'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_hasil_kegiatan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE HASIL KEGIATAN</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_hasil_kegiatan" value="<?php echo $id_hasil_kegiatan;?>">


                                 

                                 <div class="form-group m-t-20">
                                    <label>Agenda Kegiatan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_agenda_kegiatan" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM agenda_kegiatan")->result_array() as $key):?>
                                        <option <?= ($i['id_agenda_kegiatan']==$key['id_agenda_kegiatan'])?'selected':'';?> value="<?php echo $key['id_agenda_kegiatan'];?>"><?php echo $key['nama_kegiatan'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Bukti </label>
                                    <input type="file" class="form-control" name="bukti"  placeholder="Bukti" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tanggal <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['tanggal'];?>" type="date" class="form-control" name="tanggal" required  placeholder="Tanggal" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Hasil <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="hasil"><?php echo $i['hasil'];?></textarea>
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



   <?php foreach ($data_hasil_kegiatan->result_array() as $i) :
                                            $id_hasil_kegiatan=$i['id_hasil_kegiatan'];
                                          ?>
       <form  action="<?php echo base_url().'hasil_kegiatan/hapus_hasil_kegiatan'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_hasil_kegiatan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS HASIL KEGIATAN</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_hasil_kegiatan;?>">
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
  text: 'Hasil Kegiatan Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Hasil Kegiatan Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Hasil Kegiatan Berhasil di HAPUS'
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



