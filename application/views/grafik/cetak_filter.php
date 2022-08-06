<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
  <style type="text/css">
    @media print{@page {size: landscape}}
  </style>
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
<body>
     <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                <img width="70px" src="<?= base_url() ?>assets/logo.png">
            </td>
           <td>
                <font style="margin-right: 70px;" size="5">DINAS PEMUDA DAN OLAHRAGA</font> <br>
                <font style="margin-right: 70px;" size="5">KABUPATEN TAPIN</font> <br>
                <font style="margin-right: 70px;" size="3">Jalan Pembangunan No.03 Kelurahan Rantau Kiwa, Kabupatin Tapin Rantau 71111</font><br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>



    <br>
    <div style="text-align: center; ">
        <font size="3"><b><u>LAPORAN GRAFIK AGENDA KEGIATAN</u></b></font><br>
    </div>
    <br>

    <br>
 


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <canvas id="myChart" style="width:100%; height: 400px;"></canvas>
<BR><BR>



<script type="text/javascript">
   var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar', // also try bar or other graph types

        // The data for our dataset
        data: {
            labels: [<?php for ($i=1; $i < 13; $i++) { ?>
                    "<?php echo date("F", mktime(0, 0, 0, $i, 10));?>",
                      <?php  } ?>],
            // Information about the dataset
        datasets: [{
                label: 'Jumlah Agenda Kegiatan',
                backgroundColor: ['rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)',],
                borderColor: ['rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)','rgba(<?php echo rand(0,255)?>,<?php echo rand(0,255)?>, 245)',],
                data: [<?php $stt=""; for ($i=1; $i < 13; $i++) { 
                          $jumlah_pengaduan=$this->db->query("SELECT * FROM agenda_kegiatan,bidang_kegiatan,pegawai where agenda_kegiatan.id_bidang_kegiatan=bidang_kegiatan.id_bidang_kegiatan AND agenda_kegiatan.id_pegawai=pegawai.id_pegawai AND YEAR(agenda_kegiatan.tanggal_mulai)='$tahun' AND MONTH(agenda_kegiatan.tanggal_mulai)='$i' ")->num_rows();
                         $stt.=$jumlah_pengaduan.",";
                        }$stt2=substr($stt, 0, -1);
                        echo $stt2;?>],
            }]
        },

       
    });

</script>

<script type="text/javascript">
  var delayInMilliseconds = 1000; 

setTimeout(function() {
  window.print()
}, delayInMilliseconds);
</script>



    <br><br><br>
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

