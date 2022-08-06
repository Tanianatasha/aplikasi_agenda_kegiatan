

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
                 <h4 class="card-title"> <b>DAFTAR SURAT MASUK</b>

                 
                <!--    <a target="_blank" style="margin: 2px; float: right;" class="btn btn-primary btn-sm" href="<?php echo base_url();?>surat_masuk/cetak"><i class="fa fa-print"></i> CETAK</a> -->
                   

                 <?php if($this->session->userdata('level')=="admin"):?>
                 <button style="margin: 2px; float: right;" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH SURAT MASUK</button>
                <?php endif;?>
              </h4>
              
               
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration table-responsive" id="mytable">
                      <thead>
                        <tr>
                          <th>No. Agenda </th>
                          <th>Kode Surat </th>
                          <th>No. Surat </th>
                          <th>Sifat Surat </th>
                          <th>Tanggal Surat</th>
                          <th>Asal Surat</th>
                          <th>Perihal</th>
                          <th>Tanggal Diterima</th>
                          <th>File Lampiran</th>
                          <th>Disposisi</th>
                          <th>Keterangan</th>
                           <?php if($this->session->userdata('level')=="admin"):?>
                          <th style="text-align: right;">Action</th>
                           <?php endif;?>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_surat_masuk->result_array() as $i) :
                                            $id_surat_masuk=$i['id_surat_masuk'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td><?php echo $i['no_agenda'];?></td>
                                              <td><?php echo $i['kode_surat'];?></td>
                                              <td><?php echo $i['nomor_surat'];?></td>
                                              <td><?php echo $i['nama_sifat_surat'];?></td>
                                              <td><?php echo tgl_indo($i['tanggal_surat']);?></td>
                                              <td><?php echo $i['asal_surat'];?></td>
                                              <td><?php echo $i['perihal'];?></td>
                                              <td><?php echo tgl_indo($i['tanggal_diterima']);?></td>
                                              <td>  <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['file_lampiran'];?>" class="btn btn-success mdi mdi-pencil btn-sm" > LIHAT</a></td>
                                              <td><?php echo $i['tujuan_disposisi'];?></td>
                                              <td><?php echo $i['keterangan'];?></td>
                                           
                                            <?php if($this->session->userdata('level')=="admin"):?>
                                              <td style="flex: 0 0 auto; min-width: 3em; text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                              <button style="margin: 2px;" type="button" class="btn btn-primary mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#dis<?php echo $id_surat_masuk;?>"> DISPOSISI</button>

                                              <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>surat_masuk/cetak2/<?php echo $i['id_surat_masuk'];?>" class="btn btn-success mdi mdi-pencil btn-sm" > CETAK</a>

                                               <?php if($this->session->userdata('level')!="SEKRETARIS"):?>
                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_surat_masuk;?>"> EDIT</button>
                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_surat_masuk;?>"> DELETE</button>
                                                <?php endif;?>
                                                
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






    <form  action="<?php echo base_url().'surat_masuk/simpan_surat_masuk'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH SURAT MASUK</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                  <?php 
                  $data_s=$this->db->query("SELECT * FROM surat_masuk ORDER BY no_agenda DESC limit 1")->row_array();
                  $nooo=$data_s['no_agenda']+1;
                  ?>
                     
                                 <div class="form-group m-t-20">
                                    <label>No. Agenda <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $nooo;?>" type="number" class="form-control" name="no_agenda" required  placeholder="No. Agenda" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Kode Surat <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="kode_surat" required  placeholder="Kode Surat" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>No. Surat <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nomor_surat" required  placeholder="No. Surat" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Sifat Surat <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_sifat_surat" required>
                                      <option value="">-- Pilih Sifat Surat --</option>
                                      <?php foreach ($this->db->get('sifat_surat')->result_array() as $key):?>
                                      <option value="<?php echo $key['id_sifat_surat'];?>"><?php echo $key['nama_sifat_surat'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Tanggal Surat <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_surat" required  placeholder="Tanggal Surat" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Asal Surat <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="asal_surat" required  placeholder="Asal Surat" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Perihal <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="perihal" required  placeholder="Perihal" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Tanggal Diterima <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_diterima" required  placeholder="Tanggal Diterima" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>File Lampiran <span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" name="file_lampiran" required  placeholder="File Lampiran" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" name="keterangan"></textarea>
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







  <?php foreach ($data_surat_masuk->result_array() as $i) :
                                            $id_surat_masuk=$i['id_surat_masuk'];
                                          ?>
       <form  action="<?php echo base_url().'surat_masuk/update_surat_masuk'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_surat_masuk;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE SURAT MASUK</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_surat_masuk" value="<?php echo $id_surat_masuk;?>">




                                 <div class="form-group m-t-20">
                                    <label>No. Agenda <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i['no_agenda'];?>" type="number" class="form-control" name="no_agenda" required  placeholder="No. Agenda" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Kode Surat <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['kode_surat'];?>" type="text" class="form-control" name="kode_surat" required  placeholder="Kode Surat" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>No. Surat <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['nomor_surat'];?>" type="text" class="form-control" name="nomor_surat" required  placeholder="No. Surat" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Sifat Surat <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_sifat_surat" required>
                                      <option value="">-- Pilih Sifat Surat --</option>
                                      <?php foreach ($this->db->get('sifat_surat')->result_array() as $key):?>
                                      <option  <?= ($i['id_sifat_surat']==$key['id_sifat_surat'])?'selected':'';?> value="<?php echo $key['id_sifat_surat'];?>"><?php echo $key['nama_sifat_surat'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Tanggal Surat <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['tanggal_surat'];?>" type="date" class="form-control" name="tanggal_surat" required  placeholder="Tanggal Surat" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Asal Surat <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['asal_surat'];?>" type="text" class="form-control" name="asal_surat" required  placeholder="Asal Surat" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Perihal <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['perihal'];?>" type="text" class="form-control" name="perihal" required  placeholder="Perihal" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Tanggal Diterima <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['tanggal_diterima'];?>" type="date" class="form-control" name="tanggal_diterima" required  placeholder="Tanggal Diterima" >
                                </div>

                                  <div class="form-group m-t-20">
                                    <label>File Lampiran </label>
                                    <input type="file" class="form-control" name="file_lampiran"   placeholder="File Lampiran" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" name="keterangan"><?php echo $i['keterangan'];?></textarea>
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



  <?php foreach ($data_surat_masuk->result_array() as $i) :
                                            $id_surat_masuk=$i['id_surat_masuk'];
                                          ?>
       <form  action="<?php echo base_url().'surat_masuk/update_surat_masuk2'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="dis<?php echo $id_surat_masuk;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>DISPOSISI</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_surat_masuk" value="<?php echo $id_surat_masuk;?>">




                                 <div class="form-group m-t-20">
                                    <label>Tujuan Disposisi <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['tujuan_disposisi'];?>" type="text" class="form-control" name="tujuan_disposisi" required  placeholder="Tujuan Disposisi" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Isi Disposisi <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="isi_disposisi" required><?php echo $i['isi_disposisi'];?></textarea>
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



   <?php foreach ($data_surat_masuk->result_array() as $i) :
                                            $id_surat_masuk=$i['id_surat_masuk'];
                                          ?>
       <form  action="<?php echo base_url().'surat_masuk/hapus_surat_masuk'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_surat_masuk;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS SURAT MASUK</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_surat_masuk;?>">
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
  text: 'Surat Masuk Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Surat Masuk Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit2') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Berhasil Menambahkan DISPOSISI'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Surat Masuk Behasil di HAPUS'
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



