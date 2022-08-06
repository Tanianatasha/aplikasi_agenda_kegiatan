<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <base href="<?php echo base_url();?>"/>
  </head>
  <style type="text/css">
    @media print{@page {size: landscape}}
  </style>
  <body onload="window.print()">
   <?php 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
}
?>

<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}?>
      <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                <img width="70px" src="<?= base_url() ?>assets/logo.png">
            </td>
           <td>
                <font style="margin-right: 70px;" size="6">DINAS PEMUDA DAN OLAHRAGA</font> <br>
                <font style="margin-right: 70px;" size="6">KABUPATEN TAPIN</font> <br>
                <font style="margin-right: 70px;" size="3">Jalan Pembangunan No.03 Kelurahan Rantau Kiwa, Kecamatan Tapin Utara, Kabupatin Tapin Rantau 71111</font><br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>


    <h3 align="center" style="font-size: 16px;"><u>LAPORAN DATA SURAT MASUK <br> <?php echo strtoupper(tgl_indo($tgl1));?> SAMPAI DENGAN <?php echo strtoupper(tgl_indo($tgl2));?></u> <br> </h3>
    <br>
    <table border="1"width="100%" style="font-size: 14px;">
  <tr>
                          <th>No. Agenda </th>
                          <th>Kode Surat </th>
                          <th>No. Surat </th>
                          <th>Sifat Surat </th>
                          <th>Tanggal Surat</th>
                          <th>Asal Surat</th>
                          <th>Perihal</th>
                          <th>Tanggal Diterima</th>
                          <th>Disposisi</th>
                          <th>Keterangan</th>
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
                                              <td><?php echo $i['tujuan_disposisi'];?></td>
                                              <td><?php echo $i['keterangan'];?></td>
        </tr>
            <?php endforeach;?>
    </table>
<BR><BR>
  <div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 11pt;">
        <label>

            Tapin, <?= tgl_indo(date('Y-m-d')) ?>
            <br>
            <p style="text-align: center;">
                <b>KEPALA DINAS</b>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u>H. JAMHURI,SP, M.AP</u></b><br>
                NIP. 19690924 199012 1 002
            </p>
        </label>
    </div>
  </body>
</html>
