-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 03:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_agenda_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda_kegiatan`
--

CREATE TABLE `agenda_kegiatan` (
  `id_agenda_kegiatan` int(11) NOT NULL,
  `id_bidang_kegiatan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `bukti_kegiatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda_kegiatan`
--

INSERT INTO `agenda_kegiatan` (`id_agenda_kegiatan`, `id_bidang_kegiatan`, `id_pegawai`, `nama_kegiatan`, `tempat`, `tanggal_mulai`, `tanggal_selesai`, `bukti_kegiatan`) VALUES
(2, 1, 6, 'Lomba 17 agustus', 'lapangan dispora', '2022-07-02', '2022-08-02', ''),
(3, 1, 2, 'Bersih-bersih lingkungan ', 'lapangan dispora', '2022-07-03', '2022-08-03', ''),
(4, 2, 8, 'Kegiatan Pemeran Budaya 2022', 'lapangan dispora tapin', '2022-06-02', '2022-08-05', ''),
(5, 1, 6, 'Lomba 17 agustus', 'lapangan dispora', '2022-06-01', '2022-08-02', ''),
(6, 1, 2, 'Bersih-bersih lingkungan ', 'lapangan dispora', '2022-06-03', '2022-08-02', ''),
(7, 2, 8, 'Kegiatan Pemeran Budaya 2022', 'lapangan dispora tapin', '2022-08-02', '2022-08-02', ''),
(8, 2, 8, 'Kegiatan Pemeran Budaya 2022', 'lapangan dispora tapin', '2022-08-02', '2022-08-02', ''),
(9, 1, 6, 'Lomba 17 agustus', 'lapangan dispora', '2022-08-01', '2022-08-02', ''),
(10, 1, 2, 'Bersih-bersih lingkungan ', 'lapangan dispora', '2022-08-03', '2022-08-02', ''),
(11, 2, 8, 'Kegiatan Pemeran Budaya 2022', 'lapangan dispora tapin', '2022-08-02', '2022-08-02', '');

-- --------------------------------------------------------

--
-- Table structure for table `bidang_kegiatan`
--

CREATE TABLE `bidang_kegiatan` (
  `id_bidang_kegiatan` int(11) NOT NULL,
  `nama_bidang_kegiatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang_kegiatan`
--

INSERT INTO `bidang_kegiatan` (`id_bidang_kegiatan`, `nama_bidang_kegiatan`) VALUES
(1, 'Olahraga'),
(2, 'Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_kegiatan`
--

CREATE TABLE `hasil_kegiatan` (
  `id_hasil_kegiatan` int(11) NOT NULL,
  `id_agenda_kegiatan` int(11) NOT NULL,
  `bukti` text NOT NULL,
  `tanggal` date NOT NULL,
  `hasil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_kegiatan`
--

INSERT INTO `hasil_kegiatan` (`id_hasil_kegiatan`, `id_agenda_kegiatan`, `bukti`, `tanggal`, `hasil`) VALUES
(2, 2, '2cc00933cd2bef6875a917bfc5a2ea6f.jpg', '2022-08-03', 'menambah semangat para atlit'),
(3, 3, 'fe29e1ad94f8e9930f4327bc3c29e144.png', '2022-08-06', 'dilaksanakan dengan tertib'),
(4, 4, '0b4a70cc23a562574981a36b0aba095c.png', '2022-08-06', 'dilaksanakan dengan tertib');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(8) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(3, 'KEPALA DINAS'),
(4, 'Sub Bagian Keuangan'),
(6, 'KEPALA BIDANG KEPEMUDAAN'),
(7, 'SEKRETARIS'),
(8, 'Jf. Analis Kebijakan'),
(9, 'BIDANG PEMBUDAYAAN OLAHRAGA'),
(10, 'Pengadministrasi Umum'),
(11, 'Pengelola Pemanfaatan Barang Milik Daerah'),
(12, 'BIDANG PENINGKATAN PRESTASI OLAHRAGA');

-- --------------------------------------------------------

--
-- Table structure for table `kode_surat`
--

CREATE TABLE `kode_surat` (
  `kode_suratt` int(11) NOT NULL,
  `kode_surat` varchar(30) NOT NULL,
  `pola_klasifikasi_surat` varchar(100) NOT NULL,
  `singkatan` varchar(30) NOT NULL,
  `bagian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_surat`
--

INSERT INTO `kode_surat` (`kode_suratt`, `kode_surat`, `pola_klasifikasi_surat`, `singkatan`, `bagian`) VALUES
(1, 'OT.0', 'ORGANISASI DAN TATA LAKSANA', 'OT', 'ORGANISASI'),
(2, 'PP.01', 'PENDIDIKAN DAN PELATIHAN', 'PP', 'PENJENJANG'),
(3, '0001', 'KEPEGAWAIAN', 'BA', 'BALASAN'),
(4, 'HK.00', 'HUKUM', 'HK', 'PERATURAN PERUNDANG-UDANGAN'),
(5, 'HK.001', 'HUKUM', 'HK', 'HUKUM'),
(6, 'OT.01.2', 'ORGANISASI DAN TATA LAKSANA', 'OT', 'LAPORAN'),
(7, 'OT.1', 'ORGANISASI DAN TATA LAKSANA', 'OT', 'TATA LAKSANA'),
(8, 'PP.00', 'PENDIDIKAN DAN PELATIHAN', 'PP', 'PENDIDIKAN DAN PELATIHAN');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `nama_pangkat` varchar(100) NOT NULL,
  `golongan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id_pangkat`, `nama_pangkat`, `golongan`) VALUES
(1, 'Pembina Utama', 'IV / e'),
(2, 'Pembina Utama Madya', 'IV / d'),
(3, 'Pembina Utama Muda', 'IV / c'),
(4, 'Pembina Tingkat I', 'IV / b'),
(5, 'Pembina', 'IV / a'),
(6, 'Penata Tingkat I', 'III / d'),
(7, 'Penata', 'III / c'),
(8, 'Penata Muda Tingkat I', 'III / b'),
(9, 'Penata Muda', 'III / a'),
(10, 'Pengatur Tingkat I', 'II / d'),
(11, 'Pengatur', 'II / c'),
(12, 'Pengatur Muda Tingkat I', 'II / b'),
(13, 'Pengatur Muda', 'II / a'),
(14, 'Juru Tingkat I', 'I / d'),
(15, 'Juru', 'I / c'),
(16, 'Juru Muda Tingkat I', 'I / b'),
(17, 'Juru Muda', 'I / a');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(24) NOT NULL,
  `tgl_bergabung` date NOT NULL,
  `status_perkawinan` varchar(39) NOT NULL,
  `status_pegawai` varchar(50) NOT NULL,
  `foto_pegawai` text NOT NULL,
  `email` varchar(70) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `tgl_lahir`, `tempat_lahir`, `jenis_kelamin`, `alamat`, `no_telp`, `tgl_bergabung`, `status_perkawinan`, `status_pegawai`, `foto_pegawai`, `email`, `id_pangkat`, `id_jabatan`, `password`) VALUES
(2, '198409022010011015', 'Abdul Basit, S.AP', '1984-09-02', 'Palingkau', 'Laki-Laki', 'Jl. Palingkau Lama', '08', '2010-01-01', 'Sudah Menikah', 'PNS', '7ede9bd8f35700e29e019ddc479ed6b9.jpg', 'abdulbasit@gmail.com', 17, 12, '$2y$10$D4JfOM.4d2pJBW5MXIKbM.dv2cjBa1j/W3EgTBodC0fC03ZiNBf1S'),
(3, '196511201986031009', 'Yusran N.M. Apui', '1965-11-20', 'Kuala Kapuas', 'Laki-Laki', 'Jl. Keruing', '08', '1986-03-01', 'Sudah Menikah', 'PNS', '9b3341969d229026b9c02155eadb0946.jpg', 'yusran@gmail.com', 17, 12, '$2y$10$b95EzjCy98ebmFFq00aMruDASEdK/6QroMG5ZPwhc/213X4xVUR5q'),
(4, '197303161994032009', 'Rustiana', '1973-03-16', 'Mantangai', 'Perempuan', 'Jl. KP. Tendean', '08', '1994-03-01', 'Sudah Menikah', 'PNS', '8c30ab719174898d2c5012831bc4e610.jpeg', 'rustiana@gmail.com', 17, 12, '$2y$10$07.fU280xm3HU.c95ESRSu3ZGoQXcJM/L2yceawbEYDexF7Xh3OPO'),
(5, '19681114 198911 2 001', 'Karolinae, S.Sos', '1968-11-14', 'Kuala Kapuas', 'Perempuan', 'Jl. Tambun Bungai', '08', '1989-11-01', 'Janda / Duda', 'PNS', '13538017d34acae86a6d0be48999ea21.jpg', 'karolinae@gmail.com', 17, 12, ''),
(6, '198003052007011009', 'Krismambo, S.AP', '1980-03-05', 'Kuala Kapuas', 'Laki-Laki', 'Jl. Nusa Indah', '08', '2007-01-01', 'Sudah Menikah', 'PNS', '8040ad3a1e79f9465c407b8147791400.jpg', 'krismambo@yahoo.com', 17, 12, ''),
(7, '198310242010012024', 'CICI', '1983-10-24', 'Kaburan', 'Perempuan', 'Jl. Pemuda', '08', '2010-01-01', 'Sudah Menikah', 'PNS', 'cff7bc6360f925cd39edc8b0325c4f86.png', 'cici@yahoo.com', 17, 12, ''),
(8, '197304072010011005', 'MUHAMMAD', '1973-04-07', 'Kuala Kapuas', 'Laki-Laki', 'Jl. Sari Pulau', '08', '2010-01-01', 'Sudah Menikah', 'PNS', 'ada31d868609f0455d9f94a29aefd64e.png', 'muhammad@yahoo.com', 17, 12, ''),
(9, '19730914 200701 2 006', 'Jum\'ah', '1973-09-14', 'Kuala Kapuas', 'Perempuan', 'Jl. Pemuda', '08', '2007-01-01', 'Sudah Menikah', 'PNS', '0a11eab6626c28c85d0edd8bd1fda72c.png', 'jumah@yahoo.com', 17, 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(22) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama_lengkap`, `alamat`, `no_hp`, `level`) VALUES
(1, 'Admin', '$2y$10$dBzV6Ioq.SNKOn1I6JZiXuuL2WFxGMjSWUDc3k4xMTrmxxl8vVoRa', 'PUTERI TANIA NATASHA', 'Jl. A.yani Km. 37,500 Batas Kota Dalam RT. 05 RW. 02', '082150086006', 'admin'),
(3, 'pimpinan', '$2y$10$2xQ0RGxTp3B6yB1xBbc6DuuRvGtjtg1Cw8Zp9NaK9FqjCb/O2o.yq', 'H. JAMHURI,SP, M.AP', 'Jl. Kolonel Sugiono No. 20', '082278425389', 'pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `sifat_surat`
--

CREATE TABLE `sifat_surat` (
  `id_sifat_surat` int(11) NOT NULL,
  `nama_sifat_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sifat_surat`
--

INSERT INTO `sifat_surat` (`id_sifat_surat`, `nama_sifat_surat`) VALUES
(1, 'Penting'),
(2, 'Biasa'),
(4, 'Sangat Penting');

-- --------------------------------------------------------

--
-- Table structure for table `sppd`
--

CREATE TABLE `sppd` (
  `id_sppd` int(11) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `maksud_perjalanan` varchar(100) NOT NULL,
  `alat_angkut` varchar(100) NOT NULL,
  `tempat_berangkat` varchar(100) NOT NULL,
  `tempat_tujuan` varchar(100) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_harus_kembali` date NOT NULL,
  `id_pengikut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sppd`
--

INSERT INTO `sppd` (`id_sppd`, `id_pegawai`, `maksud_perjalanan`, `alat_angkut`, `tempat_berangkat`, `tempat_tujuan`, `tgl_berangkat`, `tgl_harus_kembali`, `id_pengikut`) VALUES
(11, '2', 'Konsultasi Perihal kearsipan berdasarkan Undang – undang Nomor 43 tahun 2009 tentang Kearsipan serta', 'BUS', 'Tapin', 'banjarbaru', '2022-08-03', '2022-08-05', '3,4'),
(12, '3', 'Dalam rangka Pemeriksaan kerusakan bangunan Mess milik Pemkab Kapuas di Banjarmasin', 'Mobil Dinas', 'Tapun', 'Kuala Kapuas', '2022-08-06', '2022-08-07', '4'),
(13, '5', 'Mengantar / Service Mobil Memperbaiki kaca Mobil Furtuner KH 1512 BU yang pecah di Banjarmasin', 'Mobil Dinas', 'Tapin', 'banjarbaruu', '2022-08-02', '2022-08-05', '5,6');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `id_sifat_surat` int(11) NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `kode_surat` varchar(20) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan_surat` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `file_lampiran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `id_sifat_surat`, `no_agenda`, `kode_surat`, `nomor_surat`, `tanggal_surat`, `tujuan_surat`, `perihal`, `keterangan`, `file_lampiran`) VALUES
(2, 2, 1, 'HK.00', 'W15-U5/004/KP.05/01/2022', '2022-08-03', 'Kabid', 'covid', '', '46b19badf2b5dfca8449f7cfaeebce57.jpg'),
(3, 2, 2, 'PP.00', 'W15-U5/003/KP.04/01/2022', '2022-08-03', 'Dispora Banjarbaru', 'covid', '', 'b1fed8e0a309178f900f73a25460a25c.jpg'),
(4, 2, 3, 'PP.01', 'W15-U5/001/HK.01/30/2022', '2022-08-06', 'FAKUTAS TEKNOLOGI INFORMASI', 'SURAT BALASAN PKL', '', '586a03e0289175cd59dcafc1f3b2d45f.png');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keputusan`
--

CREATE TABLE `surat_keputusan` (
  `id_surat_keputusan` int(11) NOT NULL,
  `menimbang` text NOT NULL,
  `mengingat` text NOT NULL,
  `memperhatikan` text NOT NULL,
  `menetapkan` text NOT NULL,
  `pertama` text NOT NULL,
  `kedua` text NOT NULL,
  `ketiga` text NOT NULL,
  `keempat` text NOT NULL,
  `tanggal_surat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keputusan`
--

INSERT INTO `surat_keputusan` (`id_surat_keputusan`, `menimbang`, `mengingat`, `memperhatikan`, `menetapkan`, `pertama`, `kedua`, `ketiga`, `keempat`, `tanggal_surat`) VALUES
(4, '<ol><li>Bahwa dalam rangka untuk kelancaran kegiatan pelatihan Tenis Lapangan Tahun 2020, maka dipandang perlu untuk menunjuk penanggung jawab dalam kegiatan ini.</li><li>Bahwa mereka yang namanya tersebut dalam surat keputusan ini dianggap cakap dan mampu untuk diserahi tugas.</li><li>Bahwa untuk maksud nomor 1 di atas ditetapkan dengan keputusan kepala Dinas Kepemudaan dan Olahraga Kabupaten Tapin.</li></ol>', '<ol><li>Undang – Undang No. 3 Tahun 2005 Tentang Sistem Keolahragaan Nasional.</li><li>Peraturan Pemerintah Republlk Indonesia. Nomor 18 Tahun 2007. Tentang Pendanaan Keolahragaan.</li><li>Peraturan Pemerintah Republik Indonesia Nomor 17 Tahun 2007 TentangPenyelenggaraan Pekan dan Kejuaraan Olahraga</li></ol>', '<p>Hasil Keputusan Rapat Dinas Pemuda dan Olahraga, Bidang Peningkatan Prestasi OlahragaTanggal 02 Januari 2020</p>', '2,3', '<p>Menunjuk yang namanya tersebut di atas sebagai pelatih pendamping kegiatan marching band Tahun 2019</p>', '<p>Pelatih Pendamping bertugas : </p><ol><li>Mengikutikegiatan Pelatihan Marching Band selama Tahun 2019.</li><li>Melaporkan hasil kegiatan kepada dinas Kepemudaan dan olahraga Kabupaten Tapin.</li></ol>', '<p>Segala biaya yang timbul akibat ditetapkannya keputusan ini dibebankan pada DPA-SKPD Dinas Kepemudaan dan Olahraga Kabupaten Tapin Tahun Anggaran 2019</p>', '<p>Keputusan ini berlaku sejak ditetapkan dengan ketentuan apabila di kemudian hari terdapat kekeliruan dalam keputusan ini akan diperbaiki sebagaimana mestinya.</p>', '2022-08-03'),
(5, '<ol><li>Bahwa dalam rangka untuk kelancaran kegiatan pelatihan Tenis Lapangan Tahun 2020, maka dipandang perlu untuk menunjuk penanggung jawab dalam kegiatan ini.</li><li>Bahwa mereka yang namanya tersebut dalam surat keputusan ini dianggap cakap dan mampu untuk diserahi tugas.</li><li>Bahwa untuk maksud nomor 1 di atas ditetapkan dengan keputusan kepala Dinas Kepemudaan dan Olahraga Kabupaten Tapin.</li></ol>', '<ol><li>Undang – Undang No. 3 Tahun 2005 Tentang Sistem Keolahragaan Nasional.</li><li>Peraturan Pemerintah Republlk Indonesia. Nomor 18 Tahun 2007. Tentang Pendanaan Keolahragaan.</li><li>Peraturan Pemerintah Republik Indonesia Nomor 17 Tahun 2007 TentangPenyelenggaraan Pekan dan Kejuaraan Olahraga</li></ol>', '<p>Hasil Keputusan Rapat Dinas Pemuda dan Olahraga, Bidang Peningkatan Prestasi OlahragaTanggal 02 Januari 2020</p>', '5,6', '<p>Menunjuk yang namanya tersebut di atas sebagai pelatih pendamping kegiatan marching band Tahun 2019</p>', '<p>Pelatih Pendamping bertugas : </p><ol><li>Mengikutikegiatan Pelatihan Marching Band selama Tahun 2019.</li><li>Melaporkan hasil kegiatan kepada dinas Kepemudaan dan olahraga Kabupaten Tapin.</li></ol>', '<p>Segala biaya yang timbul akibat ditetapkannya keputusan ini dibebankan pada DPA-SKPD Dinas Kepemudaan dan Olahraga Kabupaten Tapin Tahun Anggaran 2019</p>', '<p>Keputusan ini berlaku sejak ditetapkan dengan ketentuan apabila di kemudian hari terdapat kekeliruan dalam keputusan ini akan diperbaiki sebagaimana mestinya.</p>', '2022-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `id_sifat_surat` int(11) NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `kode_surat` varchar(100) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `keterangan` text NOT NULL,
  `file_lampiran` text NOT NULL,
  `tujuan_disposisi` varchar(100) NOT NULL,
  `isi_disposisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `id_sifat_surat`, `no_agenda`, `kode_surat`, `nomor_surat`, `tanggal_surat`, `asal_surat`, `perihal`, `tanggal_diterima`, `keterangan`, `file_lampiran`, `tujuan_disposisi`, `isi_disposisi`) VALUES
(4, 2, 1, 'PP.01', 'W15-A8/1029/HK.05/IX/2022', '2022-08-02', 'DISPORA BANJARMASIN', 'SURAT ANGGARAN', '2022-08-02', '', 'a1c6ebf5197dd8e5a4e5479cac208f37.png', '', ''),
(5, 2, 2, 'PP.01', 'W15-U5/01/KU.01/01/2022', '2022-08-03', 'DISPORA BANJARMASIN', 'UNDANGAN', '2022-08-04', '', 'f45681236370416e6e4136306ec4c80f.png', '', ''),
(6, 4, 3, 'PP.01', 'W.2022/WPB/.15/2022', '2022-08-06', 'KETUA MAHKAMAH AGUNG', 'DISPENSASI/IZIN SIDANG DENGAN HAKIM TUNGG', '2022-08-06', '', '0db40ccea3b6716ed0818cdce5f95362.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id_surat_tugas` int(11) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `untuk` text NOT NULL,
  `mulai_tugas` date NOT NULL,
  `selesai_tugas` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_tugas`
--

INSERT INTO `surat_tugas` (`id_surat_tugas`, `id_pegawai`, `untuk`, `mulai_tugas`, `selesai_tugas`, `keterangan`) VALUES
(12, '2,3,4', 'untuk ekspedisi covid', '2022-08-01', '2022-08-03', 'Dan membahas rencana kerja'),
(13, '5,6', 'Mendampingi Bupati Kapuas  Dalam rangka Pelantikan dan Pengambilan Sumpah / Janji Anggota BPD di  Kec. Mantangai', '2022-08-04', '2022-08-06', ''),
(14, '5,6', 'Konsultasi Perihal kearsipan berdasarkan Undang – undang Nomor 43 tahun 2009 tentang Kearsipan serta Peraturan Pemerintah Nomor 28 tahun 2012 selaku turunan pelaksanaan dari undang – undang tersebut di Perpustakaan Nasional RI di Jakarta', '2022-08-04', '2022-08-06', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda_kegiatan`
--
ALTER TABLE `agenda_kegiatan`
  ADD PRIMARY KEY (`id_agenda_kegiatan`);

--
-- Indexes for table `bidang_kegiatan`
--
ALTER TABLE `bidang_kegiatan`
  ADD PRIMARY KEY (`id_bidang_kegiatan`);

--
-- Indexes for table `hasil_kegiatan`
--
ALTER TABLE `hasil_kegiatan`
  ADD PRIMARY KEY (`id_hasil_kegiatan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kode_surat`
--
ALTER TABLE `kode_surat`
  ADD PRIMARY KEY (`kode_suratt`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `sifat_surat`
--
ALTER TABLE `sifat_surat`
  ADD PRIMARY KEY (`id_sifat_surat`);

--
-- Indexes for table `sppd`
--
ALTER TABLE `sppd`
  ADD PRIMARY KEY (`id_sppd`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`),
  ADD KEY `id_sifat_surat` (`id_sifat_surat`),
  ADD KEY `kode_surat` (`kode_surat`);

--
-- Indexes for table `surat_keputusan`
--
ALTER TABLE `surat_keputusan`
  ADD PRIMARY KEY (`id_surat_keputusan`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD KEY `id_sifat_surat` (`id_sifat_surat`);

--
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`id_surat_tugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda_kegiatan`
--
ALTER TABLE `agenda_kegiatan`
  MODIFY `id_agenda_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bidang_kegiatan`
--
ALTER TABLE `bidang_kegiatan`
  MODIFY `id_bidang_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hasil_kegiatan`
--
ALTER TABLE `hasil_kegiatan`
  MODIFY `id_hasil_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kode_surat`
--
ALTER TABLE `kode_surat`
  MODIFY `kode_suratt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sifat_surat`
--
ALTER TABLE `sifat_surat`
  MODIFY `id_sifat_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sppd`
--
ALTER TABLE `sppd`
  MODIFY `id_sppd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_keputusan`
--
ALTER TABLE `surat_keputusan`
  MODIFY `id_surat_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id_surat_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
