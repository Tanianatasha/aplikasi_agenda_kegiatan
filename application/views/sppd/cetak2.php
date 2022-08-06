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



function Terbilang($nilai)
{
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    if ($nilai == 0) {
        return "Kosong";
    } elseif ($nilai < 12 & $nilai != 0) {
        return "" . $huruf[$nilai];
    } elseif ($nilai < 20) {
        return Terbilang($nilai - 10) . " Belas ";
    } elseif ($nilai < 100) {
        return Terbilang($nilai / 10) . " Puluh " . Terbilang($nilai % 10);
    } elseif ($nilai < 200) {
        return " Seratus " . Terbilang($nilai - 100);
    } elseif ($nilai < 1000) {
        return Terbilang($nilai / 100) . " Ratus " . Terbilang($nilai % 100);
    } elseif ($nilai < 2000) {
        return " Seribu " . Terbilang($nilai - 1000);
    } elseif ($nilai < 1000000) {
        return Terbilang($nilai / 1000) . " Ribu " . Terbilang($nilai % 1000);
    } elseif ($nilai < 1000000000) {
        return Terbilang($nilai / 1000000) . " Juta " . Terbilang($nilai % 1000000);
    } elseif ($nilai < 1000000000000) {
        return Terbilang($nilai / 1000000000) . " Milyar " . Terbilang($nilai % 1000000000);
    } elseif ($nilai < 100000000000000) {
        return Terbilang($nilai / 1000000000000) . " Trilyun " . Terbilang($nilai % 1000000000000);
    } elseif ($nilai <= 100000000000000) {
        return "Maaf Tidak Dapat di Prose Karena Jumlah nilai Terlalu Besar ";
    }
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

    <div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 9pt;">
        <table>
            <tr>
                <td>
                    Lembar ke
                </td>
                <td colspan="2">:</td>
            </tr>
            <tr>
                <td>
                    Kode No
                </td>
                <td colspan="2">: 094 / &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/ SPPD / UMUM / 2021  </td>
            </tr>
            <tr>
                <td>
                    Nomor
                </td>
                <td>:</td>
                <td></td>
            </tr>
        </table>
    </div> 
<br>
<br>
<br>
<br>

    <div style="text-align: center;">
        <font size="3"><b>SURAT PERINTAH PERJALANAN DINAS (SPPD)</b></font><br>
    </div>
    <br>
    <table border="1" width="100%" cellspacing="0" cellpadding="10px" style="font-size: 9pt;">
        <tr>
            <td width="2%">1</td>
            <td width="38%">Pejabat berwenang  yang  memberi perintah </td>
            <td width="60%">Dispora Tapin</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Nama / NIP pegawai yang melaksanakan Perjalanan Dinas</td>
            <td>
                 <?php 
            $ang=1;
   $num=1; 
   $check2 = explode(',', $data_sppd['id_pegawai']);
   foreach ($this->db->query("SELECT * FROM pegawai,pangkat,jabatan where pegawai.id_pangkat=pangkat.id_pangkat AND pegawai.id_jabatan=jabatan.id_jabatan")->result_array() as $i) : 
                          if(in_array($i['id_pegawai'], $check2)):
                        ?>
              <?php echo $ang++;?>.<?php echo $i['nama_pegawai'];?><br>&nbsp;&nbsp;&nbsp;NIP.<?php echo $i['nip'];?><br>
  <?php endif;?>
  <?php endforeach;?>
</td>
        </tr>
        <tr style="vertical-align: top;">
            <td>3</td>
            <td>
                <table>
                    <tr>
                        <td>a. Pangkat dan Golongan</td>
                    </tr>
                    <tr>
                        <td>b. Jabatan</td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td>a. <?php echo $data_sppd['nama_pangkat'];?> / <?php echo $data_sppd['golongan'];?></td>
                    </tr>
                    <tr>
                        <td>b. <?= $data_sppd['nama_jabatan'] ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Maksud PerjalananDinas</td>
            <td><?= $data_sppd['maksud_perjalanan'] ?></td>
        </tr>
        <tr>
            <td>5</td>
            <td>Alat angkut yang dipergunakan</td>
            <td><?= $data_sppd['alat_angkut'] ?></td>
        </tr>
        <tr style="vertical-align: top;">
            <td>6</td>
            <td>
                <table>
                    <tr>
                        <td>a. Tempat Berangkat</td>
                    </tr>
                    <tr>
                        <td>b. Tempat Tujuan</td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td>a. <?= $data_sppd['tempat_berangkat'] ?></td>
                    </tr>
                    <tr>
                        <td>b. <?= $data_sppd['tempat_tujuan'] ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr style="vertical-align: top;">
            <td>7</td>
            <td>
                <table>
                    <tr>
                        <td>a. Jumlah Hari hari kerja</td>
                    </tr>
                    <tr>
                        <td>b. Tanggal berangkat</td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <?php 
                        $tgl1 = new DateTime($data_sppd['tgl_berangkat']);
                        $tgl2 = new DateTime($data_sppd['tgl_harus_kembali']);
                        $ddd = $tgl2->diff($tgl1)->days + 1;
                        ?>
                        <td>a. <?= $ddd ?> (<?= Terbilang($ddd) ?>) hari </td>
                    </tr>
                    <tr>
                        <td>b. <?= tgl_indo($data_sppd['tgl_berangkat']) ?></td>
                    </tr>
                    <tr>
                        <td>c. <?= tgl_indo($data_sppd['tgl_harus_kembali']) ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>8</td>
            <td>Pengikut</td>
            <td>   <?php 
            $ang=1;
   $num=1; 
   $check = explode(',', $data_sppd['id_pengikut']);
   foreach ($this->db->query("SELECT * FROM pegawai,pangkat,jabatan where pegawai.id_pangkat=pangkat.id_pangkat AND pegawai.id_jabatan=jabatan.id_jabatan")->result_array() as $i) : 
                          $id2=$i['id_pegawai']; 
                          if(in_array($id2, $check)):
                        ?>
              <?php echo $ang++;?>.<?php echo $i['nama_pegawai'];?><br>&nbsp;&nbsp;&nbsp;NIP.<?php echo $i['nip'];?><br>
  <?php endif;?>
  <?php endforeach;?>
                        </td>
        </tr>

         <tr style="vertical-align: top;">
            <td>9</td>
            <td>
                <table>
                    <tr>
                        <td>Pembebanan Anggaran :</td>
                    </tr>
                    <tr>
                        <td>a. Kode dan  nama Instansi</td>
                    </tr>
                    <tr>
                        <td>b. Kode dan  nama Program</td>
                    </tr>
                    <tr>
                        <td>1. Kode dan  nama Kegiatan</td>
                    </tr>
                    <tr>
                        <td>2. Kode rekening dan nama belanja</td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>a. Bagian Umum Dispora Tapin</td>
                    </tr>
                    <tr>
                        <td>b. Administrasi Umum Perangkat Daerah</td>
                    </tr>
                    <tr>
                        <td>1. Penyelenggaraan Rapat Koordinasi dan Konsultasi SKPD</td>
                    </tr>
                    <tr>
                        <td>2. Belanja Perjalanan dinas biasa ( 5.01.04.01.0001 )</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>10</td>
            <td>Keterangan lain-lain</td>
            <td></td>
        </tr>
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


    
   
</body>

</html>