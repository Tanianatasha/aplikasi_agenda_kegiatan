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
                 <h4 class="card-title"> <b>Laporan Lembar Disposisi</b>
                 <!--   <a target="_blank" style="margin: 2px; float: right;" class="btn btn-primary btn-sm" href="<?php echo base_url();?>K/export_pdf"><i class="fa fa-file-pdf-o"></i> EXPORT PDF</a>
                   <span id="munculkan" ><br><br></span> -->
       </h4>
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
              
           <table class="table table-striped table-bordered zero-configuration table-responsive" id="mytable">
                      <thead>
                        <tr>
                          <th>Aksi</th>
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
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_surat_masuk->result_array() as $i) :
                                            $id_surat_masuk=$i['id_surat_masuk'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td><a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>surat_masuk/cetak2/<?php echo $i['id_surat_masuk'];?>" class="btn btn-success mdi mdi-pencil btn-sm" > CETAK DISPOSISI</a></td>
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


  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>