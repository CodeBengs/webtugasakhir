-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2018 at 07:38 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepatusport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nm_admin` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nm_admin`, `email`, `password`) VALUES
(1, 'Mulhadi Moch.', 'topijerami@gmail.com', 'ibeng');

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `alias` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `nama_penerima` varchar(78) DEFAULT NULL,
  `alamat_penerima` varchar(78) DEFAULT NULL,
  `kecamatan_penerima` varchar(78) DEFAULT NULL,
  `idkota_penerima` int(11) DEFAULT NULL,
  `kota_penerima` varchar(78) DEFAULT NULL,
  `idprop_penerima` int(11) DEFAULT NULL,
  `propinsi_penerima` varchar(78) DEFAULT NULL,
  `kode_pos_penerima` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `id_member`, `alias`, `email`, `telp`, `nama_penerima`, `alamat_penerima`, `kecamatan_penerima`, `idkota_penerima`, `kota_penerima`, `idprop_penerima`, `propinsi_penerima`, `kode_pos_penerima`) VALUES
(1, 1, 'Rumah', 'akira@gmail.com', '09807-9999', 'Samin', 'Jl. Raya no 8, Kampung an', 'mekarsari', 3201, 'BOGOR', 32, 'JAWA BARAT', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(4) NOT NULL,
  `id_transaksi` varchar(10) NOT NULL,
  `id_produk` varchar(8) NOT NULL,
  `ukuran` int(3) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_produk`, `ukuran`, `jumlah`, `harga`) VALUES
(27, 'TR1807005', '1', 39, 1, 500000),
(26, 'TR1807004', '3', 39, 1, 800000),
(25, 'TR1807003', '1', 39, 1, 500000),
(24, 'TR1807002', '2', 39, 1, 600000),
(22, 'TR1807001', '1', 39, 1, 500000),
(23, 'TR1807002', '5', 39, 1, 800000),
(28, 'TR1807006', '1', 39, 2, 500000),
(29, 'TR1807007', '1', 39, 1, 500000),
(30, 'TR1807008', 'SPT004', 39, 1, 800000),
(31, 'TR1807008', 'SPT001', 39, 2, 500000),
(32, 'TR1807009', 'SPT001', 39, 1, 500000),
(33, 'TR1807010', 'SPT001', 39, 1, 500000),
(34, 'TR1807011', 'SPT003', 39, 1, 800000),
(35, 'TR1807012', 'SPT001', 39, 1, 500000),
(36, 'TR1807012', 'SPT004', 39, 1, 800000),
(37, 'TR1807013', 'SPT006', 39, 1, 700000),
(38, 'TR1807013', 'SPT007', 39, 1, 500000),
(39, 'TR1807014', 'SPT003', 39, 1, 800000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Basket'),
(2, 'Futsal'),
(3, 'Sepak Bola');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(3) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `id_produk` varchar(8) NOT NULL,
  `ukuran` int(2) NOT NULL,
  `jumlah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_pelanggan`, `id_produk`, `ukuran`, `jumlah`) VALUES
(65, '', 'SPT002', 39, 1),
(66, '', 'SPT001', 39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `komentar` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(5) NOT NULL,
  `id_transaksi` varchar(10) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_transaksi`, `id_pelanggan`, `gambar`) VALUES
(10, 'TR1807001', 'PLG201807190003', ''),
(11, 'TR1807001', 'PLG201807190003', ''),
(12, 'TR1807001', 'PLG201807190003', ''),
(40, 'TR1807012', 'PLG201807190005', '2018-07-19170035'),
(39, 'TR1807012', 'PLG201807190005', '2018-07-19165745'),
(41, 'sdad', 'PLG201807190005', '2018-07-19170302'),
(42, 'll', 'PLG201807190005', '2018-07-19170538'),
(43, 's', 'PLG201807190005', '2018-07-19171151'),
(44, 'sdsads', 'PLG201807190005', '2018-07-19171308');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `idkota` int(11) NOT NULL,
  `idprop` int(11) DEFAULT NULL,
  `nm_kota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`idkota`, `idprop`, `nm_kota`) VALUES
(1101, 11, 'ACEH SELATAN'),
(1102, 11, 'ACEH TENGGARA'),
(1103, 11, 'ACEH TIMUR'),
(1104, 11, 'ACEH TENGAH'),
(1105, 11, 'ACEH BARAT'),
(1106, 11, 'ACEH BESAR'),
(1107, 11, 'PIDIE'),
(1108, 11, 'ACEH UTARA'),
(1109, 11, 'SIMEULUE'),
(1110, 11, 'ACEH SINGKIL'),
(1111, 11, 'BIREUEN'),
(1112, 11, 'ACEH BARAT DAYA'),
(1113, 11, 'GAYO LUES'),
(1114, 11, 'ACEH JAYA'),
(1115, 11, 'NAGAN RAYA'),
(1116, 11, 'ACEH TAMIANG'),
(1117, 11, 'BENER MERIAH'),
(1118, 11, 'PIDIE JAYA'),
(1171, 11, 'KOTA BANDA ACEH'),
(1172, 11, 'KOTA SABANG'),
(1173, 11, 'KOTA LHOKSEUMAWE'),
(1174, 11, 'KOTA LANGSA'),
(1175, 11, 'KOTA SUBULUSSALAM'),
(1201, 12, 'TAPANULI TENGAH'),
(1202, 12, 'TAPANULI UTARA'),
(1203, 12, 'TAPANULI SELATAN'),
(1204, 12, 'NIAS'),
(1205, 12, 'LANGKAT'),
(1206, 12, 'KARO'),
(1207, 12, 'DELI SERDANG'),
(1208, 12, 'SIMALUNGUN'),
(1209, 12, 'ASAHAN'),
(1210, 12, 'LABUAN BATU'),
(1211, 12, 'DAIRI'),
(1212, 12, 'TOBA SAMOSIR'),
(1213, 12, 'MANDAILING NATAL'),
(1214, 12, 'NIAS SELATAN'),
(1215, 12, 'PAKPAK BHARAT'),
(1216, 12, 'HUMBANG HASUNDUTAN'),
(1217, 12, 'SAMOSIR'),
(1218, 12, 'SERDANG BEDAGAI'),
(1219, 12, 'BATU BARA'),
(1220, 12, 'PADANG LAWAS UTARA'),
(1221, 12, 'PADANG LAWAS'),
(1222, 12, 'LABUAN BATU SELATAN'),
(1223, 12, 'LABUAN BATU UTARA'),
(1224, 12, 'NIAS UTARA'),
(1225, 12, 'NIAS BARAT'),
(1271, 12, 'KOTA MEDAN'),
(1272, 12, 'KOTA PEMATANG SIANTAR'),
(1273, 12, 'KOTA SIBOLGA'),
(1274, 12, 'KOTA TANJUNG BALAI'),
(1275, 12, 'KOTA BINJAI'),
(1276, 12, 'KOTA TEBING TINGGI'),
(1277, 12, 'KOTA PADANG SIDEMPUAN'),
(1278, 12, 'KOTA GUNUNGSITOLI'),
(1301, 13, 'PESISIR SELATAN'),
(1302, 13, 'SOLOK'),
(1303, 13, 'SAWAHLUNTOH-SIJUNJUNG'),
(1304, 13, 'TANAH DATAR'),
(1305, 13, 'PADANG PARIAMAN'),
(1306, 13, 'AGAM'),
(1307, 13, 'LIMA PULUH KOTO'),
(1308, 13, 'PASAMAN'),
(1309, 13, 'KEPULAUAN MENTAWAI'),
(1310, 13, 'DHARMASRAYA'),
(1311, 13, 'SOLOK SELATAN'),
(1312, 13, 'PASAMAN BARAT'),
(1371, 13, 'KOTA PADANG'),
(1372, 13, 'KOTA SOLOK'),
(1373, 13, 'KOTA SAWAH LUNTO'),
(1374, 13, 'KOTA PADANG PANJANG'),
(1375, 13, 'KOTA BUKIT TINGGI'),
(1376, 13, 'KOTA PAYAKUMBUH'),
(1377, 13, 'KOTA PARIAMAN'),
(1401, 14, 'KAMPAR'),
(1402, 14, 'INDRAGIRI HULU'),
(1403, 14, 'BENGKALIS'),
(1404, 14, 'INDRAGIRI HILIR'),
(1405, 14, 'PELALAWAN'),
(1406, 14, 'ROKAN HULU'),
(1407, 14, 'ROKAN HILIR'),
(1408, 14, 'SIAK'),
(1409, 14, 'KUANTAN SINGINGI'),
(1410, 14, 'PULAU MERANTI'),
(1471, 14, 'KOTA PEKANBARU'),
(1472, 14, 'KOTA DUMAI'),
(1501, 15, 'KERINCI'),
(1502, 15, 'MERANGIN'),
(1503, 15, 'SAROLANGUN'),
(1504, 15, 'BATANG HARI'),
(1505, 15, 'MUARO JAMBI'),
(1506, 15, 'TANJUNG JABUNG BARAT'),
(1507, 15, 'TANJUNG JABUNG TIMUR'),
(1508, 15, 'BUNGO'),
(1509, 15, 'TEBO'),
(1571, 15, 'KOTA JAMBI'),
(1572, 15, 'KOTA SUNGAI PENUH'),
(1601, 16, 'OGAN KOMERING ULU'),
(1602, 16, 'OGAN KOMERING ILIR'),
(1603, 16, 'MUARA ENIM'),
(1604, 16, 'LAHAT'),
(1605, 16, 'MUSI RAWAS'),
(1606, 16, 'MUSI BANYUASIN'),
(1607, 16, 'BANYUASIN'),
(1608, 16, 'OGAN KOMERING ULU TIMUR'),
(1609, 16, 'OGAN KOMERING ULU SELATAN'),
(1610, 16, 'OGAN ILIR'),
(1611, 16, 'EMPAT LAWANG'),
(1671, 16, 'KOTA PALEMBANG'),
(1672, 16, 'KOTA PAGAR ALAM'),
(1673, 16, 'KOTA LUBUK LINGGAU'),
(1674, 16, 'KOTA PRABUMULIH'),
(1701, 17, 'BENGKULU SELATAN'),
(1702, 17, 'REJANG LEBONG'),
(1703, 17, 'BENGKULU UTARA'),
(1704, 17, 'KAUR'),
(1705, 17, 'SELUMA'),
(1706, 17, 'MUKO-MUKO'),
(1707, 17, 'LEBONG'),
(1708, 17, 'KEPAHIANG'),
(1709, 17, 'BENGKULU TENGAH'),
(1771, 17, 'KOTA BENGKULU'),
(1801, 18, 'LAMPUNG SELATAN'),
(1802, 18, 'LAMPUNG TENGAH'),
(1803, 18, 'LAMPUNG UTARA'),
(1804, 18, 'LAMPUNG BARAT'),
(1805, 18, 'TULANG BAWANG'),
(1806, 18, 'TANGGAMUS'),
(1807, 18, 'LAMPUNG TIMUR'),
(1808, 18, 'WAY KANAN'),
(1809, 18, 'PESAWARAN'),
(1810, 18, 'PRINGSEWU'),
(1811, 18, 'MESUJI'),
(1812, 18, 'TULANG BAWANG BARAT'),
(1871, 18, 'KOTA BANDAR LAMPUNG'),
(1872, 18, 'METRO'),
(1901, 19, 'BANGKA'),
(1902, 19, 'BELITUNG'),
(1903, 19, 'BANGKA SELATAN'),
(1904, 19, 'BANGKA TENGAH'),
(1905, 19, 'BANGKA BARAT'),
(1906, 19, 'BELITUNG TIMUR'),
(1971, 19, 'KOTA PANGKAL PINANG'),
(2101, 21, 'BINTAN'),
(2102, 21, 'KARIMUN'),
(2103, 21, 'NATUNA'),
(2104, 21, 'LINGGA'),
(2105, 21, 'KEPULAUAN ANAMBAS'),
(2171, 21, 'KOTA BATAM'),
(2172, 21, 'KOTA TANJUNG PINANG'),
(3101, 31, 'KEPULAUAN SERIBU'),
(3171, 31, 'JAKARTA PUSAT'),
(3172, 31, 'JAKARTA UTARA'),
(3173, 31, 'JAKARTA BARAT'),
(3174, 31, 'JAKARTA SELATAN'),
(3175, 31, 'JAKARTA TIMUR'),
(3201, 32, 'BOGOR'),
(3202, 32, 'SUKABUMI'),
(3203, 32, 'CIANJUR'),
(3204, 32, 'BANDUNG'),
(3205, 32, 'GARUT'),
(3206, 32, 'TASIKMALAYA'),
(3207, 32, 'CIAMIS'),
(3208, 32, 'KUNINGAN'),
(3209, 32, 'CIREBON'),
(3210, 32, 'MAJALENGKA'),
(3211, 32, 'SUMEDANG'),
(3212, 32, 'INDRAMAYU'),
(3213, 32, 'SUBANG'),
(3214, 32, 'PURWAKARTA'),
(3215, 32, 'KARAWANG'),
(3216, 32, 'BEKASI'),
(3217, 32, 'BANDUNG BARAT'),
(3271, 32, 'KOTA BOGOR'),
(3272, 32, 'KOTA SUKABUMI'),
(3273, 32, 'KOTA BANDUNG'),
(3274, 32, 'KOTA CIREBON'),
(3275, 32, 'KOTA BEKASI'),
(3276, 32, 'KOTA DEPOK'),
(3277, 32, 'KOTA CIMAHI'),
(3278, 32, 'KOTA TASIKMALAYA'),
(3279, 32, 'KOTA BANJAR'),
(3301, 33, 'CILACAP'),
(3302, 33, 'BANYUMAS'),
(3303, 33, 'PURBALINGGA'),
(3304, 33, 'BANJARNEGARA'),
(3305, 33, 'KEBUMEN'),
(3306, 33, 'PURWOREJO'),
(3307, 33, 'WONOSOBO'),
(3308, 33, 'MAGELANG'),
(3309, 33, 'BOYOLALI'),
(3310, 33, 'KLATEN'),
(3311, 33, 'SUKOHARJO'),
(3312, 33, 'WONOGIRI'),
(3313, 33, 'KARANGANYAR'),
(3314, 33, 'SRAGEN'),
(3315, 33, 'GROBOGAN'),
(3316, 33, 'BLORA'),
(3317, 33, 'REMBANG'),
(3318, 33, 'PATI'),
(3319, 33, 'KUDUS'),
(3320, 33, 'JEPARA'),
(3321, 33, 'DEMAK'),
(3322, 33, 'SEMARANG'),
(3323, 33, 'TEMANGGUNG'),
(3324, 33, 'KENDAL'),
(3325, 33, 'BATANG'),
(3326, 33, 'PEKALONGAN'),
(3327, 33, 'PEMALANG'),
(3328, 33, 'TEGAL'),
(3329, 33, 'BREBES'),
(3371, 33, 'KOTA MAGELANG'),
(3372, 33, 'KOTA SURAKARTA'),
(3373, 33, 'KOTA SALATIGA'),
(3374, 33, 'KOTA SEMARANG'),
(3375, 33, 'KOTA PEKALONGAN'),
(3376, 33, 'KOTA TEGAL'),
(3401, 34, 'KULONPROGO'),
(3402, 34, 'BANTUL'),
(3403, 34, 'GUNUNG KIDUL'),
(3404, 34, 'SLEMAN'),
(3471, 34, 'KOTA YOGYAKARTA'),
(3501, 35, 'PACITAN'),
(3502, 35, 'PONOROGO'),
(3503, 35, 'TRENGGALEK'),
(3504, 35, 'TULUNGAGUNG'),
(3505, 35, 'BLITAR'),
(3506, 35, 'KEDIRI'),
(3507, 35, 'MALANG'),
(3508, 35, 'LUMAJANG'),
(3509, 35, 'JEMBER'),
(3510, 35, 'BANYUWANGI'),
(3511, 35, 'BONDOWOSO'),
(3512, 35, 'SITUBONDO'),
(3513, 35, 'PROBOLINGGO'),
(3514, 35, 'PASURUAN'),
(3515, 35, 'SIDOARJO'),
(3516, 35, 'MOJOKERTO'),
(3517, 35, 'JOMBANG'),
(3518, 35, 'NGANJUK'),
(3519, 35, 'MADIUN'),
(3520, 35, 'MAGETAN'),
(3521, 35, 'NGAWI'),
(3522, 35, 'BOJONEGORO'),
(3523, 35, 'TUBAN'),
(3524, 35, 'LAMONGAN'),
(3525, 35, 'GRESIK'),
(3526, 35, 'BANGKALAN'),
(3527, 35, 'SAMPANG'),
(3528, 35, 'PAMEKASAN'),
(3529, 35, 'SUMENEP'),
(3571, 35, 'KOTA KEDIRI'),
(3572, 35, 'KOTA BLITAR'),
(3573, 35, 'KOTA MALANG'),
(3574, 35, 'KOTA PROBOLINGGO'),
(3575, 35, 'KOTA PASURUAN'),
(3576, 35, 'KOTA MOJOKERTO'),
(3577, 35, 'KOTA MADIUN'),
(3578, 35, 'KOTA SURABAYA'),
(3579, 35, 'KOTA BATU'),
(3601, 36, 'PANDEGLANG'),
(3602, 36, 'LEBAK'),
(3603, 36, 'TANGERANG'),
(3604, 36, 'SERANG'),
(3671, 36, 'KOTA TANGERANG'),
(3672, 36, 'KOTA CILEGON'),
(3673, 36, 'KOTA SERANG'),
(3674, 36, 'KOTA TANGERANG SELATAN'),
(5101, 51, 'JEMBRANA'),
(5102, 51, 'TABANAN'),
(5103, 51, 'BADUNG'),
(5104, 51, 'GIANYAR'),
(5105, 51, 'KLUNGKUNG'),
(5106, 51, 'BANGLI'),
(5107, 51, 'KARANG ASEM'),
(5108, 51, 'BULELENG'),
(5171, 51, 'KOTA DENPASAR'),
(5201, 52, 'LOMBOK BARAT'),
(5202, 52, 'LOMBOK TENGAH'),
(5203, 52, 'LOMBOK TIMUR'),
(5204, 52, 'SUMBAWA'),
(5205, 52, 'DOMPU'),
(5206, 52, 'BIMA'),
(5207, 52, 'SUMBAWA BARAT'),
(5208, 52, 'LOMBOK UTARA'),
(5271, 52, 'KOTA MATARAM'),
(5272, 52, 'KOTA BIMA'),
(5301, 53, 'KUPANG'),
(5302, 53, 'TIMOR TENGAH SELATAN'),
(5303, 53, 'TIMOR TENGAH UTARA'),
(5304, 53, 'BELU'),
(5305, 53, 'ALOR'),
(5306, 53, 'FLORES TIMUR'),
(5307, 53, 'SIKKA'),
(5308, 53, 'ENDE'),
(5309, 53, 'NGADA'),
(5310, 53, 'MANGGARAI'),
(5311, 53, 'SUMBA TIMUR'),
(5312, 53, 'SUMBA BARAT'),
(5313, 53, 'LEMBATA'),
(5314, 53, 'ROTENDAO'),
(5315, 53, 'MANGGARAI BARAT'),
(5316, 53, 'NAGEKO'),
(5317, 53, 'SUMBA TENGAH'),
(5318, 53, 'SUMBA BARAT DAYA'),
(5319, 53, 'MANGGARAI TIMUR'),
(5320, 53, 'SABU RAIJUA'),
(5371, 53, 'KOTA KUPANG'),
(6101, 61, 'SAMBAS'),
(6102, 61, 'PONTIANAK'),
(6103, 61, 'SANGGAU'),
(6104, 61, 'KETAPANG'),
(6105, 61, 'SINTANG'),
(6106, 61, 'KAPUAS HULU'),
(6107, 61, 'BENGKAYANG'),
(6108, 61, 'LANDAK'),
(6109, 61, 'SEKADAU'),
(6110, 61, 'MELAWI'),
(6111, 61, 'KAYONG UTARA'),
(6112, 61, 'KUBU RAYA'),
(6171, 61, 'KOTA PONTIANAK'),
(6172, 61, 'KOTA SINGKAWANG'),
(6201, 62, 'KOTAWARINGIN BARAT'),
(6202, 62, 'KOTAWARINGIN TIMUR'),
(6203, 62, 'KAPUAS'),
(6204, 62, 'BARITO SELATAN'),
(6205, 62, 'BARITO UTARA'),
(6206, 62, 'KATINGAN'),
(6207, 62, 'SERUYAN'),
(6208, 62, 'SUKAMARA'),
(6209, 62, 'LAMANDAU'),
(6210, 62, 'GUNUNG MAS'),
(6211, 62, 'PULANG PISAU'),
(6212, 62, 'MURUNG RAYA'),
(6213, 62, 'BARITO TIMUR'),
(6271, 62, 'KOTA PALANGKARAYA'),
(6301, 63, 'TANAH LAUT'),
(6302, 63, 'BARU'),
(6303, 63, 'BANJAR'),
(6304, 63, 'BARITO KUALA'),
(6305, 63, 'TAPIN'),
(6306, 63, 'HULU SUNGAI SELATAN'),
(6307, 63, 'HULU SUNGAI TENGAH'),
(6308, 63, 'HULU SUNGAI UTARA'),
(6309, 63, 'TABALONG'),
(6310, 63, 'TANAH BUMBU'),
(6311, 63, 'BALANGAN'),
(6371, 63, 'KOTA BANJARMASIN'),
(6372, 63, 'KOTA BANJAR BARU'),
(6401, 64, 'PASER'),
(6402, 64, 'KUTAI KERTANEGARA'),
(6403, 64, 'BERAU'),
(6404, 64, 'BULUNGAN'),
(6405, 64, 'NUNUKAN'),
(6406, 64, 'MALINAU'),
(6407, 64, 'KUTAI BARAT'),
(6408, 64, 'KUTAI TIMUR'),
(6409, 64, 'PENAJAM PASER UTARA'),
(6410, 64, 'TANAH TIDUNG'),
(6471, 64, 'KOTA BALIKPAPAN'),
(6472, 64, 'KOTA SAMARINDA'),
(6473, 64, 'KOTA TARAKAN'),
(6474, 64, 'KOTA BONTANG'),
(7101, 71, 'BOLAANG MONGONDO'),
(7102, 71, 'MINAHASA'),
(7103, 71, 'KEPULAUAN SANGIHE'),
(7104, 71, 'KEPULAUAN TALAUD'),
(7105, 71, 'MINAHASA SELATAN'),
(7106, 71, 'MINAHASA UTARA'),
(7107, 71, 'MINAHASA TENGGARA'),
(7108, 71, 'BOLAANG MONGONDOW UTARA'),
(7109, 71, 'SITARO'),
(7110, 71, 'BOLAANG MONGONDO TIMUR'),
(7111, 71, 'BOLAANG MONGONDO SELATAN'),
(7171, 71, 'KOTA MANADO'),
(7172, 71, 'KOTA BITUNG'),
(7173, 71, 'KOTA TOMOHON'),
(7174, 71, 'KOTA KOTAMOBAGU'),
(7201, 72, 'BANGGAI'),
(7202, 72, 'POSO'),
(7203, 72, 'DONGGALA'),
(7204, 72, 'TOLI-TOLI'),
(7205, 72, 'BUOL'),
(7206, 72, 'MOROWALI'),
(7207, 72, 'BANGGAI KEPULAUAN'),
(7208, 72, 'PARIMO'),
(7209, 72, 'TOJO UNA-UNA'),
(7210, 72, 'SIGI'),
(7271, 72, 'KOTA PALU'),
(7301, 73, 'SELAYAR'),
(7302, 73, 'BULUKUMBA'),
(7303, 73, 'BANTAENG'),
(7304, 73, 'JENEPONTO'),
(7305, 73, 'TAKALAR'),
(7306, 73, 'GOWA'),
(7307, 73, 'SINJAI'),
(7308, 73, 'BONE'),
(7309, 73, 'MAROS'),
(7310, 73, 'PANGKAJENE KEPULAUAN'),
(7311, 73, 'BARRU'),
(7312, 73, 'SOPPENG'),
(7313, 73, 'WAJO'),
(7314, 73, 'SIDENRENG RAPANG'),
(7315, 73, 'PINRANG'),
(7316, 73, 'ENREKANG'),
(7317, 73, 'LUWU'),
(7318, 73, 'TANA TORAJA'),
(7322, 73, 'LUWU UTARA'),
(7324, 73, 'LUWU TIMUR'),
(7326, 73, 'TORAJA UTARA'),
(7371, 73, 'KOTA MAKASAR'),
(7372, 73, 'KOTA PARE-PARE'),
(7373, 73, 'KOTA PALOPO'),
(7401, 74, 'KOLAKA'),
(7402, 74, 'KONAWE'),
(7403, 74, 'MUNA'),
(7404, 74, 'BUTON'),
(7405, 74, 'KONAWE SELATAN'),
(7406, 74, 'BOMBANA'),
(7407, 74, 'WAKATOBI'),
(7408, 74, 'KOLAKA UTARA'),
(7409, 74, 'KONAWE UTARA'),
(7410, 74, 'BUTON UTARA'),
(7471, 74, 'KOTA KENDARI'),
(7472, 74, 'KOTA BAU-BAU'),
(7501, 75, 'GORONTALO'),
(7502, 75, 'BOALEMO'),
(7503, 75, 'BONE BOLANGO'),
(7504, 75, 'POHUWATO'),
(7505, 75, 'GORONTALO UTARA'),
(7571, 75, 'KOTA GORONTALO'),
(7601, 76, 'MAMUJU UTARA'),
(7602, 76, 'MAMUJU'),
(7603, 76, 'MAMASA'),
(7604, 76, 'POLEWALI MANDAR'),
(7605, 76, 'MAJENE'),
(8101, 81, 'MALUKU TENGAH'),
(8102, 81, 'MALUKU TENGGARA'),
(8103, 81, 'MALUKU TENGGARA BARAT'),
(8104, 81, 'BURU'),
(8105, 81, 'SERAM BAGIAN TIMUR'),
(8106, 81, 'SERAM BAGIAN BARAT'),
(8107, 81, 'KEPULAUAN ARU'),
(8108, 81, 'MALUKU BARAT DAYA'),
(8109, 81, 'BURU SELATAN'),
(8171, 81, 'KOTA AMBON'),
(8172, 81, 'KOTA TUAL'),
(8201, 82, 'HALMAHERA BARAT'),
(8202, 82, 'HALMAHERA TENGAH'),
(8203, 82, 'HALMAHERA UTARA'),
(8204, 82, 'HALMAHERA SELATAN'),
(8205, 82, 'KEPULAUAN SULA'),
(8206, 82, 'HALMAHERA TIMUR'),
(8207, 82, 'PULAU MOROTAI'),
(8271, 82, 'KOTA TERNATE'),
(8272, 82, 'KOTA TIDORE'),
(9101, 91, 'MERAUKE'),
(9102, 91, 'JAYAWIJAYA'),
(9103, 91, 'JAYAPURA'),
(9104, 91, 'NABIRE'),
(9105, 91, 'KEPULAUAN YAPEN'),
(9106, 91, 'BIAK NUMFOR'),
(9107, 91, 'PUNCAK JAYA'),
(9108, 91, 'PANIAI'),
(9109, 91, 'MIMIKA'),
(9110, 91, 'SARMI'),
(9111, 91, 'KEEROM'),
(9112, 91, 'PEGUNUNGAN BINTANG'),
(9113, 91, 'YAHUKIMO'),
(9114, 91, 'TOLIKARA'),
(9115, 91, 'WAROPEN'),
(9116, 91, 'BOVEN DIGUL'),
(9117, 91, 'MAPPI'),
(9118, 91, 'ASMAT'),
(9119, 91, 'SUPIORI'),
(9120, 91, 'MAMBERAMO RAYA'),
(9121, 91, 'KABUPATEN MABERAMO TENGAH'),
(9122, 91, 'KABUPATEN YALIMO'),
(9123, 91, 'KABUPATEN LANNY JAYA'),
(9124, 91, 'KABUPATEN DUGA'),
(9125, 91, 'KABUPATEN PUNCAK'),
(9126, 91, 'KABUPATEN DOGIYAI'),
(9127, 91, 'INTAN JAYA'),
(9128, 91, 'DEIYAI'),
(9171, 91, 'KOTA JAYAPURA'),
(9201, 92, 'SORONG'),
(9202, 92, 'MANOKWARI'),
(9203, 92, 'FAKFAK'),
(9204, 92, 'SORONG SELATAN'),
(9205, 92, 'RAJA AMPAT'),
(9206, 92, 'TELUK BINTUNI'),
(9207, 92, 'TELUK WONDAMA'),
(9208, 92, 'KAIMANA'),
(9209, 92, 'TAMBRAUW'),
(9210, 92, 'MAYBRAT'),
(9271, 92, 'KOTA SORONG');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(15) NOT NULL,
  `nm_pelanggan` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nm_pelanggan`, `email`, `telepon`, `password`) VALUES
('PLG201807190001', 'Marwan annassit', 'marwan@gmail.com', '081219080601', 'awan'),
('PLG201807190002', 'Malik Ilham', 'malik@gmail.com', '081219080602', 'alik'),
('PLG201807190003', 'Leonel Messi', 'leomessi@gmail.com', '085719080601', 'barca'),
('PLG201807190004', 'Neymar Jr', 'neymarjr@gmail.com', '087619080602', 'neymar'),
('5PLG20180719000', 'Dwayne The Rock Jhonson', 'therock@gmail.com', '089808980989', '123'),
('PLG201807190005', 'fajar', 'fajar@yahoo.com', '089554743534', 'fajar');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(5) NOT NULL,
  `id_kota` varchar(10) NOT NULL,
  `kota` varchar(15) NOT NULL,
  `ongkir` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_kota`, `kota`, `ongkir`) VALUES
(1, '', '1101', 10000),
(2, '', '1102', 10000),
(3, '', '1103', 15000),
(4, '', '1104', 13000),
(5, '', '1105', 15000),
(6, '', '', 0),
(7, '', '', 0),
(8, '', 'wer', 324),
(9, '45', '45', 45),
(10, 'dd', 'dd', 0),
(11, 'bbb', 'bbb', 0),
(12, 'bbb', 'bbb', 0),
(13, 'bbb', 'bbb', 0),
(14, 'pdg', 'padang', 1200000),
(15, 'ba', 'bali', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(8) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `nm_produk` varchar(25) NOT NULL,
  `harga` int(10) NOT NULL,
  `berat` int(5) NOT NULL,
  `stok` int(5) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nm_produk`, `harga`, `berat`, `stok`, `gambar`, `deskripsi`) VALUES
('SPT001', 2, 'Adidas Ace Boots', 500000, 400, 6, 'ftsal.jpg', 'Sepatu Futsal Adidas Ace Boots super<br>\nBrand Adidas<br>\nReady Stock: 39-43<br>\nInclude Box Adidas<br>\nBahan : Sintetic Skin \n\n<hr>\nNote :<br>\n*Jangan lupa cantumkan ukuran saat melakukan order dan pastikan alamat ditulis secara lengkap dan benar.<br>\nKami tidak bertanggung jawab apabila terjadi kesalahan pengiriman yang disebabkan oleh kesalahan penulisan alamat.<br>'),
('SPT002', 2, 'Specc Diamond', 600000, 600, 8, 'ftsalioo.jpg', 'Sepatu Futsal specc diamon<br>\nBrand specc<br>\nReady Stock: 39-43<br>\nInclude Box Adidas<br>\nBahan : Sintetic Skin \n\n<hr>\nNote :<br>\n*Jangan lupa cantumkan ukuran saat melakukan order dan pastikan alamat ditulis secara lengkap dan benar.<br>\nKami tidak bertanggung jawab apabila terjadi kesalahan pengiriman yang disebabkan oleh kesalahan penulisan alamat.<br>'),
('SPT003', 3, 'Adidas Nemesis II', 800000, 600, 40, 'mercurial.jpg', 'Sepatu Bola Adidas Nemeziz<br>\nBrand Adidas<br>\nReady Stock: 39-43<br>\nInclude Box Adidas<br>\nBahan : Sintetic Skin \n\n<hr>\nNote :<br>\n*Jangan lupa cantumkan ukuran saat melakukan order dan pastikan alamat ditulis secara lengkap dan benar.<br>\nKami tidak bertanggung jawab apabila terjadi kesalahan pengiriman yang disebabkan oleh kesalahan penulisan alamat.<br>'),
('SPT004', 3, 'Nike Hyperpro Max', 800000, 800, 25, 'nikehyper.jpg', 'Sepatu Nike hyperpro<br>\nBrand Nike<br>\nReady Stock: 39-43<br>\nInclude Box Adidas<br>\nBahan : Sintetic Skin \n\n<hr>\nNote :<br>\n*Jangan lupa cantumkan ukuran saat melakukan order dan pastikan alamat ditulis secara lengkap dan benar.<br>\nKami tidak bertanggung jawab apabila terjadi kesalahan pengiriman yang disebabkan oleh kesalahan penulisan alamat.<br>'),
('SPT005', 2, 'Adidas Zero XI', 250000, 57, 10, 'adidasfts.jpg', 'Sepatu Futsal Adidas  XI<br>\r\nBrand Adidas<br>\r\nReady Stock: 39-43<br>\r\nInclude Box Adidas<br>\r\nBahan : Sintetic Skin \r\n\r\n<hr>\r\nNote :<br>\r\n*Jangan lupa cantumkan ukuran saat melakukan order dan pastikan alamat ditulis secara lengkap dan benar.<br>\r\nKami tidak bertanggung jawab apabila terjadi kesalahan pengiriman yang disebabkan oleh kesalahan penulisan alamat.<br>'),
('SPT006', 3, 'Air Jordan RJ', 700000, 500, 11, 'jordan.jpg', 'Sepatu Basket Air Jordan RJ<br>\r\nBrand Nike<br>\r\nReady Stock: 39-43<br>\r\nInclude Box Nike<br>\r\nBahan : Sintetic Skin \r\n\r\n<hr>\r\nNote :<br>\r\n*Jangan lupa cantumkan ukuran saat melakukan order dan pastikan alamat ditulis secara lengkap dan benar.<br>\r\nKami tidak bertanggung jawab apabila terjadi kesalahan pengiriman yang disebabkan oleh kesalahan penulisan alamat.<br>'),
('SPT007', 3, 'Lebron Cavallier X2', 500000, 500, 6, 'basketlebron.jpg', 'Sepatu Basket Lebron Junior X2<br>\r\nBrand Adidas<br>\r\nReady Stock: 39-43<br>\r\nInclude Box Adidas<br>\r\nBahan : Sintetic Skin \r\n\r\n<hr>\r\nNote :<br>\r\n*Jangan lupa cantumkan ukuran saat melakukan order dan pastikan alamat ditulis secara lengkap dan benar.<br>\r\nKami tidak bertanggung jawab apabila terjadi kesalahan pengiriman yang disebabkan oleh kesalahan penulisan alamat.<br>'),
('SPT008', 1, 'Nike Phantom CR7', 400000, 300, 15, 'phantom.jpg', 'Sepatu Bola Nike Phantom CR7<br>\r\nBrand Adidas<br>\r\nReady Stock: 39-43<br>\r\nInclude Box Adidas<br>\r\nBahan : Sintetic Skin \r\n\r\n<hr>\r\nNote :<br>\r\n*Jangan lupa cantumkan ukuran saat melakukan order dan pastikan alamat ditulis secara lengkap dan benar.<br>\r\nKami tidak bertanggung jawab apabila terjadi kesalahan pengiriman yang disebabkan oleh kesalahan penulisan alamat.<br>');

-- --------------------------------------------------------

--
-- Table structure for table `propinsi`
--

CREATE TABLE `propinsi` (
  `idprop` int(11) NOT NULL,
  `nm_prop` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propinsi`
--

INSERT INTO `propinsi` (`idprop`, `nm_prop`) VALUES
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(20, 'KALIMANTAN UTARA'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DAERAH ISTIMEWA YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA'),
(92, 'PAPUA BARAT');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `id_pengiriman` int(5) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `subtotal` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_pengiriman`, `alamat`, `subtotal`, `tanggal`, `status`) VALUES
('TR1807004', '6', 3201, 'Jl Tubagus Dalem Balega Kec ciater desa cibatok gg', 803000, '2018-07-10', 'selesai'),
('TR1807003', '6', 1201, 'jshdkjahdkahsk kahdkjahdkjahskdjahsk', 503000, '2018-07-10', 'selesai'),
('TR1807002', '6', 3501, 'awfwgaw', 1403000, '2018-07-10', 'df'),
('TR1807001', '6', 3301, 'qwdefsdgsdgsd', 503000, '2018-07-10', 'df'),
('TR1807005', '6', 1201, 'Kota Bumi Grand sutra no 23  kec cibodas', 503000, '2018-07-10', 'df'),
('TR1807006', '6', 1301, 'dfgdfdfgd dfgdfgdfgdfg dfgdfgd', 1003000, '2018-07-10', 'df'),
('TR1807007', '6', 1101, 'kec cimone daerah kota bumi gg jsdhsj', 510000, '2018-07-11', 'df'),
('TR1807008', '0', 3601, 'z', 1803000, '2018-07-19', 'df'),
('TR1807009', '0', 1101, 'Jl Kotabumi grands Sutra Tomang No 3 kecamatan Kot', 510000, '2018-07-19', 'df'),
('TR1807010', '0', 1101, 'dasdasdas', 510000, '2018-07-19', 'df'),
('TR1807011', 'PLG201807190003', 5201, 'vvv', 803000, '2018-07-19', 'Success'),
('TR1807012', 'PLG201807190005', 5103, 'zxzx', 803000, '2018-07-19', 'Success'),
('TR1807013', 'PLG201807190001', 3203, 'Jl kapten suripto Kec gadog malang nengah RT 002 R', 1203000, '2018-07-31', 'Pending'),
('TR1807014', 'PLG201807190001', 1101, 'aceh timur cicarulang kecmatan digaya no 7 pambuangsintar', 810000, '2018-07-31', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`idkota`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `propinsi`
--
ALTER TABLE `propinsi`
  ADD PRIMARY KEY (`idprop`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
