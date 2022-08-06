<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <base href="<?php echo base_url();?>"/>
  </head>
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
                <font  size="5">DINAS PEMUDA DAN OLAHRAGA</font> <br>
                <font  size="5">KABUPATEN TAPIN</font> <br>
                <font  size="3">Jalan Pembangunan No.03 Kelurahan Rantau Kiwa, Kabupatin Tapin Rantau 71111</font><br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>


    <h3 align="center" style="font-size: 16px;"><u>LEMBAR DISPOSISI</u> <br> </h3>
    <br>
   <style>
     .isi {
            min-height: 100px;
        }
     .space {
            height: 40px;
        }
    .disp-table tr:nth-child(2) td {
            vertical-align: top;
        }
        .disp-table {
            margin-bottom: 30px;
        }
       @media print {
            .container,
            .row,
            .kop,
            .disp-table123 {
                margin-left: 0 !important;
                margin-right: 0 !important;
                width: 100% !important;
                font-size: 13px !important;
            }
            .cll {
                border: 0 !important;
                padding: 10px;
            }
            .cll:nth-child(1) {
                width: 120px;
            }
            .cll:nth-child(2) {
                padding: 10px 0;
                width: 5px;
            }
        }
    </style>

    <table border="1"width="100%" class="disp-table123 " >
            <tr>
                <td class="cll">Nomor Agenda</td>
                <td class="cll">:</td>
                <td class="cll"><?php echo $data_surat_masuk['no_agenda'];?></td>
            </tr>
            <tr>
                <td class="cll">Nomor Surat</td>
                <td class="cll">:</td>
                <td class="cll"><?php echo $data_surat_masuk['nomor_surat'];?></td>
            </tr>
            <tr>
                <td class="cll">Sifat Surat</td>
                <td class="cll">:</td>
                <td class="cll"><?php echo $data_surat_masuk['nama_sifat_surat'];?></td>
            </tr>
            <tr>
                <td class="cll">Tanggal Surat</td>
                <td class="cll">:</td>
                <td class="cll"><?php echo tgl_indo($data_surat_masuk['tanggal_surat']);?></td>
            </tr>
            <tr>
                <td class="cll">Asal Surat</td>
                <td class="cll">:</td>
                <td class="cll"><?php echo $data_surat_masuk['asal_surat'];?></td>
            </tr>
            <tr>
                <td class="cll">Perihal</td>
                <td class="cll">:</td>
                <td class="cll"><?php echo $data_surat_masuk['perihal'];?></td>
            </tr>
            <tr>
                <td class="cll">Tanggal diterima</td>
                <td class="cll">:</td>
                <td class="cll"><?php echo tgl_indo($data_surat_masuk['tanggal_diterima'])?></td>
            </tr>
        </table>


         <div class="space"></div>

        <table class="disp-table disp-table123" border="1" width="100%" >
            <tr>
                <td class="cll">Disposisi kepada</td>
                <td class="cll">:</td>
                <td class="cll"><?php echo $data_surat_masuk['tujuan_disposisi'];?></td>
            </tr>
            <tr>
                <td class="cll">Isi Disposisi</td>
                <td class="cll">:</td>
                <td class="cll">
                    <div class="isi"><?php echo $data_surat_masuk['isi_disposisi'];?></div>
                </td>
            </tr>
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
