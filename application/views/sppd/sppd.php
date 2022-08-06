

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
                 <h4 class="card-title"> <b>Daftar SPPD</b>
                 <!--   <a target="_blank" style="margin: 2px; float: right;" class="btn btn-primary btn-sm" href="<?php echo base_url();?>sppd/export_pdf"><i class="fa fa-file-pdf-o"></i> EXPORT PDF</a>
                   <span id="munculkan" ><br><br></span> -->
                     <?php if($this->session->userdata('level')=="admin"):?>
                 <button style="margin: 2px; float: right;" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH SPPD</button><?php endif;?></h4>
              
               
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration table-responsive" id="mytable">
                      <thead>
                        <tr>
                          <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                          <th>Pegawai yang ditugaskan</th>
                          <th>Maksud Perjalanan</th>
                          <th>Alat Angkut</th>
                          <th>Tempat Berangkat</th>
                          <th>Tempat Tujuan</th>
                          <th>Tanggal Berangkat</th>
                          <th>Tanggal Harus Kembali</th>
                          <th>Pengikut</th>
                           
                          <th style="text-align: right;">Action</th>
                         
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_sppd->result_array() as $i) :
                                            $id_sppd=$i['id_sppd'];
                                            $id_pegawai=$i['id_pegawai'];
                                            $id_pengikut=$i['id_pengikut'];
                                            $check = explode(',', $id_pegawai);
                                            $check2 = explode(',', $id_pengikut);
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                               <td>

                                               <?php $ang=1; foreach ($this->db->get('pegawai')->result_array() as $i4) : 
                                                if(in_array($i4['id_pegawai'], $check)):
                                              ?>
                                              <?php echo $ang++;?>.<?php echo $i4['nama_pegawai'];?><br>&nbsp;&nbsp;&nbsp;NIP.<?php echo $i4['nip'];?><br>
                                              <?php endif;?>
                                              <?php endforeach;?>
                                                </td>
                                              <td><?php echo $i['maksud_perjalanan'];?></td>
                                              <td><?php echo $i['alat_angkut'];?></td>
                                              <td><?php echo $i['tempat_berangkat'];?></td>
                                              <td><?php echo $i['tempat_tujuan'];?></td>
                                              <td><?php echo tgl_indo($i['tgl_berangkat']);?></td>
                                              <td><?php echo tgl_indo($i['tgl_harus_kembali']);?></td>
                                               <td>
                                              <?php $ang=1; foreach ($this->db->get('pegawai')->result_array() as $i3) : 
                                                if(in_array($i3['id_pegawai'], $check2)):
                                              ?>
                                              <?php echo $ang++;?>.<?php echo $i3['nama_pegawai'];?><br>&nbsp;&nbsp;&nbsp;NIP.<?php echo $i3['nip'];?><br>
                                              <?php endif;?>
                                              <?php endforeach;?>
                                                </td>
                                                
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                              <a target="_blank" style="margin: 2px;" type="button" class="btn btn-success mdi mdi-pencil btn-sm" href="<?php echo base_url();?>sppd/cetak2/<?php echo $i['id_sppd'];?>"> CETAK</a>
                                               <?php if($this->session->userdata('level')=="admin"):?>
                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $i['id_sppd'];?>"> EDIT</button>
                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $i['id_sppd'];?>"> DELETE</button>
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






    <form  action="<?php echo base_url().'sppd/simpan_sppd'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH SPPD</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     

                                <div class="form-group m-t-20">
                                    <label>Pegawai yang diperintahkan <span style="color: red;">*</span></label>
                                    <select data-placeholder="Pilih Pegawai yang diperintahkan ..." class="form-control js-example-basic-multiple"  name="id_pegawai[]" required multiple="multiple">
                                      <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                        <option  value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nip'];?> # <?php echo $key['nama_pegawai'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Pengikut <span style="color: red;">*</span></label>
                                    <select data-placeholder="Pilih Pengikut ..." class="form-control js-example-basic-multiple"  name="id_pengikut[]" required multiple="multiple">
                                      <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                        <option  value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nip'];?> # <?php echo $key['nama_pegawai'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Maksud Perjalanan <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="maksud_perjalanan" required  placeholder="Maksud Perjalanan" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Alat Angkut <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="alat_angkut" required  placeholder="Alat Angkut" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tempat Berangkat <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="tempat_berangkat" required  placeholder="Tempat Berangkat" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tempat Tujuan <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="tempat_tujuan" required  placeholder="Tempat Tujuan" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tanggal Berangkat <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tgl_berangkat" required  placeholder="Tanggal Berangkat" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tanggal Harus Kembali <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tgl_harus_kembali" required  placeholder="Tanggal Harus Kembali" >
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







  <?php foreach ($data_sppd->result_array() as $i) :
                                            $id_sppd=$i['id_sppd'];
                                            $id_pengikut=$i['id_pengikut'];
                                            $check = explode(',', $id_pengikut);
                                            $check2 = explode(',', $i['id_pegawai']);
                                          ?>
       <form  action="<?php echo base_url().'sppd/update_sppd'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_sppd;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE SPPD</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_sppd" value="<?php echo $id_sppd;?>">


                                <div class="form-group m-t-20">
                                    <label>Pegawai yang diperintahkan <span style="color: red;">*</span></label>
                                      <select data-placeholder="Pilih Pegawai yang diperintahkan ..." class="form-control js-example-basic-multiple"  name="id_pegawai[]" required multiple="multiple">
                                      <option value="">--pilih pegawai--</option>
                                      <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                        <option <?php if(in_array($key['id_pegawai'], $check2)){echo "selected";}else{};?> value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nip'];?> # <?php echo $key['nama_pegawai'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Pengikut <span style="color: red;">*</span></label>
                                    <select data-placeholder="Pilih Pengikut ..." class="form-control js-example-basic-multiple"  name="id_pengikut[]" required multiple="multiple">
                                      <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                        <option <?php if(in_array($key['id_pegawai'], $check)){echo "selected";}else{};?> value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nip'];?> # <?php echo $key['nama_pegawai'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Maksud Perjalanan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['maksud_perjalanan'];?>" type="text" class="form-control" name="maksud_perjalanan" required  placeholder="Maksud Perjalanan" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Alat Angkut <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['alat_angkut'];?>" type="text" class="form-control" name="alat_angkut" required  placeholder="Alat Angkut" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tempat Berangkat <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['tempat_berangkat'];?>" type="text" class="form-control" name="tempat_berangkat" required  placeholder="Tempat Berangkat" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tempat Tujuan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['tempat_tujuan'];?>" type="text" class="form-control" name="tempat_tujuan" required  placeholder="Tempat Tujuan" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tanggal Berangkat <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['tgl_berangkat'];?>" type="date" class="form-control" name="tgl_berangkat" required  placeholder="Tanggal Berangkat" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tanggal Harus Kembali <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['tgl_harus_kembali'];?>" type="date" class="form-control" name="tgl_harus_kembali" required  placeholder="Tanggal Harus Kembali" >
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



   <?php foreach ($data_sppd->result_array() as $i) :
                                            $id_sppd=$i['id_sppd'];
                                          ?>
       <form  action="<?php echo base_url().'sppd/hapus_sppd'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_sppd;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS SPPD</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_sppd;?>">
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
  text: 'SPPD Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'SPPD Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'SPPD Behasil di HAPUS'
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



