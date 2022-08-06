<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
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
}

function hari_ini($tanggal_meninggal3){
    $hari = date("D",strtotime($tanggal_meninggal3));
    switch($hari){
        case 'Sun':
            $hari_ini = "Minggu";
        break;
 
        case 'Mon':         
            $hari_ini = "Senin";
        break;
 
        case 'Tue':
            $hari_ini = "Selasa";
        break;
 
        case 'Wed':
            $hari_ini = "Rabu";
        break;
 
        case 'Thu':
            $hari_ini = "Kamis";
        break;
 
        case 'Fri':
            $hari_ini = "Jumat";
        break;
 
        case 'Sat':
            $hari_ini = "Sabtu";
        break;
        
        default:
            $hari_ini = "Tidak di ketahui";     
        break;
    }
    return "" . $hari_ini . "";
}


function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
 
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }           
        return $hasil;
    }
?>
<body onLoad="window.print()">
 <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                <img width="70px" src="<?= base_url() ?>assets/logo.png">
            </td>
           <td>
                <font size="5">DINAS PEMUDA DAN OLAHRAGA</font> <br>
                <font size="5">KABUPATEN TAPIN</font> <br>
                <font size="3">Jalan Pembangunan No.03 Kelurahan Rantau Kiwa, Kabupatin Tapin Rantau 71111</font><br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>
    <br>


    <div style="text-align: center;">
        <font size="4"><b><u>SURAT PERINTAH TUGAS</u></b></font><br>
        <font size="2">Nomor : 094 / &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; /ST/UMUM.<?php echo date('Y');?></font>
    </div>
    <br>


    <table border="0"  style="margin-left: 30px; font-size: 10pt!important; font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
  <tr style="vertical-align: top;">
      <td width="60px" >Dasar</td>
      <td width="20px">: 1.</td>
      <td >Peraturan Bupati Tapin Nomor : 15 Tahun 2021 Tentang Pelaksanaan Perjalanan Dinas.</td>
  </tr>
  <tr style="vertical-align: top;">
      <td width="60px" ></td>
      <td width="20px">: 2.</td>
      <td >Keputusan Bupati Tapin Nomor : 419/TAPD Tahun 2021 Tetang Standar Biaya Perjalanan Dinas Tahun Anggaran 2021</td>
  </tr>
  
  </tbody>
</div>
</table>
<br>
<br>
  <div style="text-align: center;">
        <font size="2"><b><u>MENUGASKAN</u></b></font><br>
    </div>

     <table border="0"  style="margin-left: 30px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
   <?php 
   $num=1; 
   $check = explode(',', $data_surat_tugas['id_pegawai']);
   foreach ($this->db->query("SELECT * FROM pegawai,pangkat,jabatan where pegawai.id_pangkat=pangkat.id_pangkat AND pegawai.id_jabatan=jabatan.id_jabatan")->result_array() as $i) : 
                          $id2=$i['id_pegawai']; 
                          if(in_array($id2, $check)):
                        ?>
  <tr style="vertical-align: top;">
      <td width="120px" ><?php if($num==1):?>Kepada<?php endif;?></td>
      <td width="20px"><?php if($num==1):?>:<?php endif;?> <?php echo $num++;?>.</td>
      <td width="100px">a. Nama</td>
      <td >: <?php echo $i['nama_pegawai'];?></td>
  </tr>
  <tr style="vertical-align: top;">
      <td width="120px" ></td>
      <td width="20px"></td>
      <td width="100px">b. Pangkat/Gol</td>
      <td >: <?php echo $i['nama_pangkat'];?> <?php echo $i['golongan'];?></td>
  </tr>
  <tr style="vertical-align: top;">
      <td width="120px" ></td>
      <td width="20px"></td>
      <td width="100px">c. NIP</td>
      <td >: <?php echo $i['nip'];?></td>
  </tr>
  <tr style="vertical-align: top;">
      <td width="120px" ></td>
      <td width="20px"></td>
      <td width="100px">d. Jabatan</td>
      <td >: <?php echo $i['nama_jabatan'];?></td>
  </tr>
  <?php endif;?>
  <?php endforeach;?>
  </tbody>
</div>
</table>


    <table border="0"  style="margin-left: 30px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
  <tr style="vertical-align: top;">
      <td width="120px" >Untuk</td>
      <td width="20px">: 1.</td>
      <td ><?php echo $data_surat_tugas['untuk'];?></td>
  </tr>
  <tr style="vertical-align: top;">
      <td width="120px" ></td>
      <td width="20px">: 2.</td>
      <td >Lama Penugasan : <?php 
                        $tgl1 = new DateTime($data_surat_tugas['mulai_tugas']);
                        $tgl2 = new DateTime($data_surat_tugas['selesai_tugas']);
                        $ddd = $tgl2->diff($tgl1)->days + 1;
                        ?>

                        <?= $ddd ?> (<?= terbilang($ddd); ?>) hari pp (Tanggal <?= tgl_indo($data_surat_tugas['mulai_tugas']) ?> - <?= tgl_indo($data_surat_tugas['selesai_tugas']) ?>)</td>
  </tr>
  <tr style="vertical-align: top;">
      <td width="120px" ></td>
      <td width="20px">: 3.</td>
      <td ><?php echo $data_surat_tugas['keterangan'];?></td>
  </tr>
  
  </tbody>
</div>
</table>



    <br><br><br>

    <?php 
require 'vendor/autoload.php';
    $direktori=base_url();
$qrCode = new Endroid\QrCode\QrCode('Nama : Drs. SEPTEDY, M. Si
NIP : 19690924 199012 1 002');
$qrCode->writeFile('./assets/QRcode/report.png');
?>
  <!--   <div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 11px;">
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

    <!-- AKHIRAN HALAMAN -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!-- 
<span style="font-size: 11px;">
Tembusan
<ol>
  <li>Kepala Bagian Keuangan Setda Kabupaten Kapuas</li>
  <li>Kepala Bagian Umum Setda Kabupaten Kapuas</li>
  <li>Atasan Langsung dari Pejabat / Pegawai yang melaksanakan Perjalanan Dinas</li>
  <li>Bendahara Pengeluaran yang bersangkutan</li>
</ol>
</span> -->
    
   
</body>

</html>