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


    <h3 align="center" style="font-size: 16px;"><u>LAPORAN SURAT TUGAS <br> <?php echo strtoupper(tgl_indo($tgl1));?> SAMPAI DENGAN <?php echo strtoupper(tgl_indo($tgl2));?></u> <br> </h3>
    <br>
    <table border="1"width="100%" style="font-size: 14px;">
   <tr>
                          <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                          <th>Yang ditugaskan</th>
                          <th>Untuk</th>
                          <th>Mulai Tugas</th>
                          <th>Selesai Tugas</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_surat_tugas->result_array() as $i) :
                                            $id_surat_tugas=$i['id_surat_tugas'];
                                            $id_pegawai=$i['id_pegawai'];
                                            $check = explode(',', $id_pegawai);
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
                                              <td><?php echo $i['untuk'];?></td>
                                              <td><?php echo tgl_indo($i['mulai_tugas']);?></td>
                                              <td><?php echo tgl_indo($i['selesai_tugas']);?></td>
                                              <td><?php echo $i['keterangan'];?></td>
        </tr>
            <?php endforeach;?>
    </table>
<BR><BR>
  <?php 
require 'vendor/autoload.php';
    $direktori=base_url();
$qrCode = new Endroid\QrCode\QrCode('Nama : Drs. SEPTEDY, M. Si
NIP : 19690924 199012 1 002');
$qrCode->writeFile('./assets/QRcode/report.png');
?>
   <!--  <div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 11px;">
        <label>
            Ditetapkan di Kuala Kapuas<br>
            Pada tanggal <?= tgl_indo(date('Y-m-d')) ?>
            <br>
            <p style="text-align: center;">
                <b>BUPATI KAPUAS</b><br>
                <b>SEKRETARIS DAERAH</b>
            </p>
            <center>
            <img src="<?= base_url('./assets/QRcode/report.png');?>" width="100px" height="100px">
            </center>
            <p style="text-align: center;">
                <b><u>Drs. SEPTEDY, M. Si</u></b><br>
                Pembina Utama Muda (IV/c)<br>
                NIP. 19690924 199012 1 002
            </p>
        </label>
    </div> -->
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
