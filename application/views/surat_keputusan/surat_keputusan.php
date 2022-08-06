

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
                 <h4 class="card-title"> <b>DAFTAR SURAT KEPUTUSAN</b>
                 <!--   <a target="_blank" style="margin: 2px; float: right;" class="btn btn-primary btn-sm" href="<?php echo base_url();?>surat_keputusan/cetak"><i class="fa fa-print"></i> CETAK</a> -->

                 <?php if($this->session->userdata('level')=="admin"):?>
                 <button style="margin: 2px; float: right;" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH SURAT KEPUTUSAN</button>
          
                <?php endif;?>
              </h4>
              
               
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration table-responsive" id="mytable">
                      <thead>
                        <tr>
                          <th>No. </th>
                          <th>Menimbang </th>
                          <th>Mengingat </th>
                          <th>Memperhatikan </th>
                          <th>Menetapkan </th>
                          <th>Pertama </th>
                          <th>Kedua </th>
                          <th>Ketiga </th>
                          <th>Keempat </th>
                          <th>Tanggal Surat </th>
                           <?php if($this->session->userdata('level')=="admin"):?>
                          <th style="text-align: right;">Action</th>
                           <?php endif;?>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_surat_keputusan->result_array() as $i) :
                                            $id_surat_keputusan=$i['id_surat_keputusan'];

                                            $menetapkan=$i['menetapkan'];
                                            $check = explode(',', $menetapkan);
                                          ?>
                                    
                                            <tr>
                                                  <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td style="flex: 0 0 auto; min-width: 10em;"><?php echo substr($i["menimbang"], 0, 100);?></td>
                                              <td style="flex: 0 0 auto; min-width: 10em;"><?php echo substr($i["mengingat"], 0, 100);?></td>
                                              <td style="flex: 0 0 auto; min-width: 10em;"><?php echo substr($i["memperhatikan"], 0, 100);?></td>
                                              <td>

                                               <?php $ang=1; foreach ($this->db->get('pegawai')->result_array() as $i4) : 
                                                if(in_array($i4['id_pegawai'], $check)):
                                              ?>
                                              <?php echo $ang++;?>.<?php echo $i4['nama_pegawai'];?><br>&nbsp;&nbsp;&nbsp;NIP.<?php echo $i4['nip'];?><br>
                                              <?php endif;?>
                                              <?php endforeach;?>
                                                </td>
                                              <td style="flex: 0 0 auto; min-width: 10em;"><?php echo substr($i["pertama"], 0, 100);?></td>
                                              <td style="flex: 0 0 auto; min-width: 10em;"><?php echo substr($i["kedua"], 0, 100);?></td>
                                              <td style="flex: 0 0 auto; min-width: 10em;"><?php echo substr($i["ketiga"], 0, 100);?></td>
                                              <td style="flex: 0 0 auto; min-width: 10em;"><?php echo substr($i["keempat"], 0, 100);?></td>
                                              <td><?php echo tgl_indo($i['tanggal_surat']);?></td>
                                            <?php if($this->session->userdata('level')=="admin"):?>
                                              <td style="flex: 0 0 auto; min-width: 3em; text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                  <a target="_blank" style="margin: 2px;" type="button" class="btn btn-success mdi mdi-pencil btn-sm" href="<?php echo base_url();?>surat_keputusan/cetak2/<?php echo $i['id_surat_keputusan'];?>"> CETAK</a>

                            
                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_surat_keputusan;?>"> EDIT</button>
                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_surat_keputusan;?>"> DELETE</button>
                                                   
                                                      
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



<script type="text/javascript" src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>


    <form  action="<?php echo base_url().'surat_keputusan/simpan_surat_keputusan'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH SURAT KEPUTUSAN</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                


                                  <div class="form-group m-t-20">
                                    <label>Menetapkan <span style="color: red;">*</span></label>
                                    <select data-placeholder="Pilih Pegawai yang ditetapkan ..." class="form-control js-example-basic-multiple"  name="menetapkan[]" required multiple="multiple">
                                      <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                        <option  value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nip'];?> # <?php echo $key['nama_pegawai'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>



                     
                                 <div class="form-group m-t-20">
                                    <label>Menimbang <span style="color: red;">*</span></label>
                                      <textarea class="form-control" name="menimbang"  id="editor"><ol><li>Bahwa dalam rangka untuk kelancaran kegiatan pelatihan Tenis Lapangan Tahun 2020, maka dipandang perlu untuk menunjuk penanggung jawab dalam kegiatan ini.</li><li>Bahwa mereka yang namanya tersebut dalam surat keputusan ini dianggap cakap dan mampu untuk diserahi tugas.</li><li>Bahwa untuk maksud nomor 1 di atas ditetapkan dengan keputusan kepala Dinas Kepemudaan dan Olahraga Kabupaten Tapin.</li></ol></textarea>
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>Mengingat <span style="color: red;">*</span></label>
                                      <textarea class="form-control" name="mengingat"  id="editor2"><ol><li>Undang – Undang No. 3 Tahun 2005 Tentang Sistem Keolahragaan Nasional.</li><li>Peraturan Pemerintah Republlk Indonesia. Nomor 18 Tahun 2007. Tentang Pendanaan Keolahragaan.</li><li>Peraturan Pemerintah Republik Indonesia Nomor 17 Tahun 2007 TentangPenyelenggaraan Pekan dan Kejuaraan Olahraga</li></ol></textarea>
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>memperhatikan <span style="color: red;">*</span></label>
                                      <textarea class="form-control" name="memperhatikan"  id="editor3"><p>Hasil Keputusan Rapat Dinas Pemuda dan Olahraga, Bidang Peningkatan Prestasi OlahragaTanggal 02 Januari 2020</p></textarea>
                                </div>

                               

                                 <div class="form-group m-t-20">
                                    <label>Pertama <span style="color: red;">*</span></label>
                                      <textarea class="form-control" name="pertama"  id="editor4"><p>Menunjuk yang namanya tersebut di atas sebagai pelatih pendamping kegiatan marching band Tahun 2019</p></textarea>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Kedua <span style="color: red;">*</span></label>
                                      <textarea class="form-control" name="kedua"  id="editor5"><p>Pelatih Pendamping bertugas : </p><ol><li>Mengikutikegiatan Pelatihan Marching Band selama Tahun 2019.</li><li>Melaporkan hasil kegiatan kepada dinas Kepemudaan dan olahraga Kabupaten Tapin.</li></ol></textarea>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Ketiga <span style="color: red;">*</span></label>
                                      <textarea class="form-control" name="ketiga"  id="editor6"><p>Segala biaya yang timbul akibat ditetapkannya keputusan ini dibebankan pada DPA-SKPD Dinas Kepemudaan dan Olahraga Kabupaten Tapin Tahun Anggaran 2019</p></textarea>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Keempat <span style="color: red;">*</span></label>
                                      <textarea class="form-control" name="keempat"  id="editor7"><p>Keputusan ini berlaku sejak ditetapkan dengan ketentuan apabila di kemudian hari terdapat kekeliruan dalam keputusan ini akan diperbaiki sebagaimana mestinya.</p></textarea>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Tanggal Surat <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_surat" required  placeholder="Tanggal Surat" >
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







  <?php foreach ($data_surat_keputusan->result_array() as $i) :
                                            $id_surat_keputusan=$i['id_surat_keputusan'];
                                              $menetapkan=$i['menetapkan'];
                                            $check = explode(',', $menetapkan);
                                          ?>
       <form  action="<?php echo base_url().'surat_keputusan/update_surat_keputusan'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_surat_keputusan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE SURAT KEPUTUSAN</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_surat_keputusan" value="<?php echo $id_surat_keputusan;?>">




                                <div class="form-group m-t-20">
                                    <label>Menimbang <span style="color: red;">*</span></label>
                                      <textarea class="form-control" name="menimbang"  id="editorz<?php echo $id_surat_keputusan;?>"><?php echo $i['menimbang'];?></textarea>
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>Mengingat <span style="color: red;">*</span></label>
                                      <textarea class="form-control" name="mengingat"  id="editor2z<?php echo $id_surat_keputusan;?>"><?php echo $i['mengingat'];?></textarea>
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>memperhatikan <span style="color: red;">*</span></label>
                                      <textarea class="form-control" name="memperhatikan"  id="editor3z<?php echo $id_surat_keputusan;?>"><?php echo $i['memperhatikan'];?></textarea>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Menetapkan <span style="color: red;">*</span></label>
                                    <select data-placeholder="Pilih Pegawai yang ditetapkan ..." class="form-control js-example-basic-multiple"  name="menetapkan[]" required multiple="multiple">
                                      <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                        <option <?php if(in_array($key['id_pegawai'], $check)){echo "selected";}else{};?> value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nip'];?> # <?php echo $key['nama_pegawai'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Pertama <span style="color: red;">*</span></label>
                                      <textarea class="form-control" name="pertama"  id="editor4z<?php echo $id_surat_keputusan;?>"><?php echo $i['pertama'];?></textarea>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Kedua <span style="color: red;">*</span></label>
                                      <textarea class="form-control" name="kedua"  id="editor5z<?php echo $id_surat_keputusan;?>"><?php echo $i['kedua'];?></textarea>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Ketiga <span style="color: red;">*</span></label>
                                      <textarea class="form-control" name="ketiga"  id="editor6z<?php echo $id_surat_keputusan;?>"><?php echo $i['ketiga'];?></textarea>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Keempat <span style="color: red;">*</span></label>
                                      <textarea class="form-control" name="keempat"  id="editor7z<?php echo $id_surat_keputusan;?>"><?php echo $i['keempat'];?></textarea>
                                </div>
                                
                                 <div class="form-group m-t-20">
                                    <label>Tanggal Surat <span style="color: red;">*</span></label>
                                    <input type="date" value="<?php echo $i['tanggal_surat'];?>" class="form-control" name="tanggal_surat" required  placeholder="Tanggal Surat" >
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
   <script type="text/javascript">
  ClassicEditor.create(document.querySelector("#editorz<?php echo $id_surat_keputusan;?>"));
  ClassicEditor.create(document.querySelector("#editor2z<?php echo $id_surat_keputusan;?>"));
  ClassicEditor.create(document.querySelector("#editor3z<?php echo $id_surat_keputusan;?>"));
  ClassicEditor.create(document.querySelector("#editor4z<?php echo $id_surat_keputusan;?>"));
  ClassicEditor.create(document.querySelector("#editor5z<?php echo $id_surat_keputusan;?>"));
  ClassicEditor.create(document.querySelector("#editor6z<?php echo $id_surat_keputusan;?>"));
  ClassicEditor.create(document.querySelector("#editor7z<?php echo $id_surat_keputusan;?>"));
</script>

 <?php endforeach;?>






   <?php foreach ($data_surat_keputusan->result_array() as $i) :
                                            $id_surat_keputusan=$i['id_surat_keputusan'];
                                          ?>
       <form  action="<?php echo base_url().'surat_keputusan/hapus_surat_keputusan'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_surat_keputusan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS SURAT KEPUTUSAN</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_surat_keputusan;?>">
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
  text: 'Surat KEPUTUSAN Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Surat KEPUTUSAN Berhasil di EDIT'
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
  text: 'Surat KEPUTUSAN Behasil di HAPUS'
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




      <script type="text/javascript">
  ClassicEditor.create(document.querySelector("#editor"));
  ClassicEditor.create(document.querySelector("#editor2"));
  ClassicEditor.create(document.querySelector("#editor3"));
  ClassicEditor.create(document.querySelector("#editor4"));
  ClassicEditor.create(document.querySelector("#editor5"));
  ClassicEditor.create(document.querySelector("#editor6"));
  ClassicEditor.create(document.querySelector("#editor7"));
</script>
