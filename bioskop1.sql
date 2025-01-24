-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 05:50 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop1`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `film_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `judul_film` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `pemeran` varchar(500) NOT NULL,
  `durasi` time NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `tanggal_rilis` date NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 orang aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`film_id`, `t_id`, `judul_film`, `genre`, `pemeran`, `durasi`, `deskripsi`, `tanggal_rilis`, `gambar`, `video_url`, `status`) VALUES
(1, 1, 'Mencuri Raden Saleh', 'action, drama\r\n', 'Aghniny Haque,Angga Aldi Yunanda,Ari Irham,Atiqah Hasiholan,Dwi Sasono,Ganindra Bimo,Iqbaal Dhiafakhri Ramadhan,Rachel Amanda,Tio Pakusadewo,Umay Shahab', '01:59:00', 'Pencurian terbesar abad ini hanya beberapa hari lagi dari eksekusinya.Komplotan tersebut selesai dan siap menjalankan misi mencuri lukisan sang maestro,Raden saleh,yang berjudul Penangkapan Diponegoro,Pemalsuan,Peretasan,Perkelahian,dan manipulasi terjadi dalam perampokan terencana yang dijalankan oleh sekelompok amatir muda.', '2024-12-25', 'images/mencuri raden saleh.jpg', 'https://youtu.be/DN3sRz_veBU?si=a4xuYwR6mB4wxhoy', 0),
(4, 1, 'Pertaruhan The Movie', 'Action ', 'Adipati Dolken,Aliando Syarif, Ence Bagus, Gulio  Parengkuan,Jefri Nichol,Silvia Anggraeni, Tarzan,Tio Pakusadewo,Widika Sidmore', '01:10:00', 'Empat Bersaudara Ibra,Elzan,Amar dan Ical Membutuhkan uang untuk pengobatan ayahnya yang sakit kritis di rumah sakit,mereka selalu menemui jalan bantu,kakak beradik itu akhirnya mengambil keputusan yang sangat nekat.', '2017-02-09', 'images/Pertaruhan.jpg', 'https://youtu.be/1QVU66XwgiM?si=u_t6WgkOEOFKvnHH', 0),
(5, 1, 'Mariposa', 'Drama,Romansa', 'Abun Sungkar,Adhisty Zara,Angga Aldi Yunanda,Dania Salsabila,Irgi Fahrezi,Junior Robert,Syakir Daulay', '01:17:00', 'Acha siswa baru yang menyukai iqbal setelah pindah ke sekolah barunya,tapi Iqbal sangat cuek dan dingin tidak terlalu peduli akan cinta dan asmara karena dia itu cowo yang ambis akan pendidikan,tetapi acha tidak peduli akan hal itu,acha bahkan melakukan segala cara agar iqbal mau mencintainya,akankah nanti iqbal dapat membuka hatinya untuk acha?', '2020-03-12', 'images/Mariposa.jpg', 'https://youtu.be/N9PUbRIKYOA?si=33JAR-4-4RVp81Yp', 0),
(6, 1, ' Kingdom of the Planet of the Apes', 'Action,Advanture,Populer', 'Eka Darville,Freya Allan,Kevin Durand,Neil Sandilands,Owen Teague,Peter Macon,Ras Samuel,Sara Wiseman,Travis Jeffery,William H. Macy', '01:45:00', '300 tahun setelah kematian Ceasar,dunia sekarang telah dikuasai oleh kera dan manusia hampir tidak terlihat dan malah diburu oleh para kera dan dijadikan peliharaan para kera,noa seekor kera dari klan elang menemukan sebuah rahasia tentang masa lalu manusia dan kera dan sedang mencoba memahaminya,dia juga bertemu dengan manusia yang tidak bisa bicara.', '2024-05-08', 'images/a2756485031_10.jpg', 'https://youtu.be/XtFI7SNtVpY?si=gnm9gnZdyCT1nZyO', 0),
(7, 1, 'Sekawan Limo', 'Advanture,Comedy,Horor', 'Bayu Skak, Benidictus Siregar, Cak Kartolo, Devina Aureel, Dono Pradana, Firza Valaza, Indra Pramujito, Keisya Levronka, Nadya Arina, Tini Kartolo', '01:12:00', 'Sekawan Limo menceritakan Bagas, Dydy, dan Deri yang merupakan podcaster yang kerap membagikan pengalaman mereka saat mendak gunung.Cerita berawal ketika mereka mendaki Gunung Madyapuro dan setelahnya, ketiganya melakukan rekaman podcast di studio.Hal mistis terjadi ketika mereka sedang menceritakan pengalaman mereka saat mendaki.Tampaknya, iblis di Gunung Madyapuro mengikuti mereka hingga di studio dan membuat suasana sepanjang remakan podcast kacau.Dengan suasana mencekam yang dihadirkan dan balutan komedi,', '2024-07-04', 'images/sekawan limo.jpg', 'https://youtu.be/ERZncVUuKlk?si=wQsF-yUgNfTOr5_S', 0),
(8, 1, 'Agak Laen', 'Drama,Comedy,Horor', 'Arie Kriting, Arief Didu, Bene Dion Rajagukguk, Boris Bokir, Indah Permatasari, Indra Jegel, Oki Rengga, Praz Teguh, Sadana Agung, Tissa Biani Azzahra', '01:19:00', 'Empat orang sahabat yang mendirikan wahana rumah hantu di pasar malam yang sayangnya tidak laku, menemukan jenazah seorang lelaki tua yang mengidap penyakit jantung dan mereka memutuskan untuk menguburkan jenazahnya di rumah hantu tersebut dan ternyata itu adalah sebuah rumah hantu. rumah hantu seram yang laris manis.', '2024-02-01', 'images/Agak Lain.jpeg', 'https://youtu.be/0YLSPyGA4h0?si=79lp1zRs_x6b_j3-', 0),
(9, 1, 'Mangkujiwo', 'Horor,Populer', 'Djenar Maesa Ayu, Karina Suwandi, Kiki Narendra, Marthino Lio, Pritt Timothy, Sujiwo Tejo, Widika Sidmore, Yasamin Jasem, Yayu Unru, Yuyun Arfah', '01:20:00', 'Film \"Mangkujiwo\" mengisahkan awal mula munculnya hantu kuntilanak. Film ini berkaitan dengan perseteruan antara dua tokoh keraton, Brotoseno dan Cokrokusumo, yang memperebutkan kekuasaan atas Loji Pusaka. Wanita bernama Kanti, yang sedang mengandung di luar nikah, juga menjadi bagian dari cerita ini', '2023-01-26', 'images/mangkujiwo.jpg', 'https://youtu.be/nbSJnsSekfo?si=tKJXaAhuyL6uCwW1', 0),
(10, 1, 'Dilan 1983 : Wo Ai Ni', 'Romance,Comedy,Drama,Family', 'Adzana Shaliha, Bucek Depp, Ferdy Adriansyah, Graciella Abigail, Ira Wibowo, Keanu Azka, M. Adhiyat, Malea Emma Tjandrawidjaja, Sulthan Hamonangan, Zayyan Sakha', '01:16:00', 'Konon seri Dilan merupakan kisah nyata masa muda kreator novelnya, Pidi Baiq (juga menyutradarai sekaligus menulis naskah untuk seluruh adaptasi layar lebarnya). Tapi baru pada Dilan 1983: Wo Ai Ni tercium aroma biografi dalam penceritaannya. Seperti album kenangan mengenai dunia anak kecil yang penuh warna.Mengingat Dilan dikenal lewat romantika sarat rayuan gombal, dan kali ini giliran sosoknya semasa SD yang diceritakan, banyak pihak khawatir filmnya bakal mengajarkan anak-anak berpacaran. Nyatanya tidak demikian. Tidak ada yang berlebihan dalam rasa suka Dilan (M. Adhiyat) kepada Mei Lien (Malea Emma Tjandrawidjaja) si murid baru. Sebatas cinta monyet.', '2024-06-13', 'images/dilan 1983.jpg', 'https://youtu.be/h_-kHZR8e0U?si=sAJa4-TZdua0hYFm', 0),
(11, 1, 'Ancika : Dia Yang Bersamaku 1995', 'Romance,Comedy,Drama', 'Arbani Yasiz, Dito Darmawan, Ira Wibowo, Irgi Fahrezi, Jefan Nathanio, Kenes Andari, Kenzi Taulany, Nyimas Ratu Rafa, Shania Gracia, Azizi Shafa Asadel', '01:00:00', 'Ancika tidak pernah tampak seperti kertas kosong. Kehidupan sekolahnya terasa lebih kuat. Ancika ini kayak Dilan versi cewek, ketika dia berinteraksi kepada teman-temannya hahaha.. Kita juga gak perlu nunggu film berikutnya untuk mengenal lebih dekat Ancika dalam lingkungan keluarga dan pribadinya. Ancika juga sudah punya motivasi dan sikap yang tegas.. Dia pengen masuk Unpad. Dia gak mau pacaran. Inilah yang mendapat â€˜tantanganâ€™ nanti ketika dia bertemu dengan salah satu teman kuliah mamangnya, yaitu si Dilan.Dilan versi film ini adalah mahasiswa seni rupa ITB, seorang aktivis. I give huge props buat Arbani Yasiz yang membuat kayak gampang meranin berbagai karakter yang punya identitas lokal yang kuat. Belum lama ini dia beliveable banget jadi pemuda Minang di Ranah 3 Warna (2021), dan kini dia pentolan pemuda Sunda, yang amazingnya lagi melanjutkan ke versi yang lebih dewasa dari karakter yang populer dimainkan oleh aktor yang lain sebelumnya, without missing any beats of that ch', '2024-01-11', 'images/ancika.jpg', 'https://youtu.be/DbOa2bGLNWA?si=JOkyU5dm10pU4H-c', 0),
(12, 1, 'Sri Asih', 'Action, Adventure, Drama', 'Christine Hakim, Dimas Anggara, Fadly Faisal, Faradina Mufti, Jefri Nichol, Jenny Zhang, Pevita Pearce, Randy Pangalila, Reza Rahadian, Surya Saputra', '01:34:00', 'Alana tidak mengerti mengapa dia selalu dipengaruhi oleh amarah. Tapi dia selalu berusaha melawannya. Saat menginjak dewasa, Alana menemukan kebenaran tentang asal usulnya: dia bukan manusia biasa. Ia dapat menjadi anugerah bagi umat manusia dan menjadi pelindungnya sebagai SRI ASIH. Atau kehancuran, jika dia tidak bisa mengendalikan amarahnya.Alana (Pevita Pearce) lahir sebagai anak yatim piatu yang dibesarkan di panti asuhan sejak kecil. Orang tuanya wafat karena menjadi korban letusan Gunung Merapi, tepat pada hari kelahiran Alana.Namun, Alana memiliki kelemahan karena sering dikuasai rasa marah sehingga sulit mengendalikan emosi. Ia juga menyimpan ketakutan karena rasa marah itu berulang kali menghantui dirinya lewat mimpi.Sementara itu, rekor tak terkalahkan Alana menarik perhatian Mateo Adinegara (Randy Pangalila). Ia merupakan anak semata wayang konglomerat Prayogo Adinegara (Surya Saputra) yang dikenal angkuh dan semena-mena. Mateo yang juga hobi gulat lantas menantang Alana da', '2022-11-17', 'images/Sri Asih.jpg', 'https://youtu.be/564eG_1Mvf0?si=shxnPoKWHT8TRyD2', 0),
(13, 1, 'Kromoleo', 'Horor,Populer', 'Abun Sungkar, Aline Fauziah, Cornelio Sunny, Dayu Wijanto, Ilham Setyadi, Rukman Rosadi, Safira Ratu Sofya, Tio Pakusadewo, Totos Rasiti, Vonny Anggraini', '01:20:00', 'Danang dengan tega membunuh mereka satu per satu.Begitupula yang terjadi pada ayahnya Zia, hilang bagaikan tidak tercium aromanya. Danang sebagai kakek Zia sudah memperingatkan tokoh utama untuk tidak ambil pusing perihal hilang dan meninggalnya kedua orang tua.Namun demikian, Zia dengan rasa penasaran yang tinggi ingin mengungkapkan misteri di balik peristiwa tersebut. Kisah horor tercermin lewat hantu-hantu â€œKromoleoâ€ yang merupakan arwah penasaran korban pembunuhan Danang.Zia yang mengetahui teror-teror hantu pun masuk ke dalam fase bimbang. Perempuan ini ditekankan harus memilih, apakah ingin membela kakeknya yang masih hidup atau mendiang ayahnya yang telah tiada.Bisakah Zia menyelesaikan konflik batin untuk menyelesaikan teror Kromoleo? Atau sebaliknya, mengikuti jejak kakeknya sehingga warga desa terus mendapatkan gangguan gaib ketika malam hari?', '2024-08-22', 'images/kromoleo.jpg', 'https://youtu.be/yDwqwjp2leM?si=TByrkTLdQHyeCVOg', 0),
(14, 1, 'Aku Tahu Kapan Kamu Mati', 'Horor,Populer,Drama', 'Al Ghazali, Asri Welas, Cathrine Wilson, Fitria Rasyidi, Natasha Wilona, Ria Ricis, Ryma Gembala', '01:42:00', 'Setelah mati suri itu, Siena bisa melihat tanda-tanda orang akan meninggal. Ia takut dan ingin keluar dari situasi yang mengerikan ini. Siena Teman dirinya tidak percaya pada kemungkinan yang tiba-tiba milik Siena.  Tapi Siena terus meyakinkan dengan pandangan. Selain itu, satu per satu orang-orang di sekitar mereka mati setelah Siena melihat tanda dengan penampilan orang yang mengambil hantu. Sampai akhir tanda muncul di dekat Brama, orang tua yang telah mengasihi. Siena mencoba menipu kematian Brama yang mencarinya. Dia tidak hanya Brama. Siena melihat tanda-tanda orang-orang terdekat akan mati. Siena mencoba untuk mengecoh kematian kematian. Sampai pertanda kematian itu sendiri datang mengancam. â€œDia mengatakan banyak siswa takut di sekolah ini. Karena Anda mengakui tahu kapan orang akan matiâ€, kata salah satu guru kepada siswa. Sekolah kondisi yang tidak biasa setelah pengakuan siswa Siena.', '2020-03-05', 'images/aku tahu.jpg', 'https://youtu.be/xTGa2PAEFx8?si=iFkpZEDATQmYJvqu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `j_id` int(11) NOT NULL,
  `jt_id` int(11) NOT NULL COMMENT 'jam tayang id',
  `teater_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `tanggal_tayang` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 orang penonton tersedia',
  `r_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`j_id`, `jt_id`, `teater_id`, `film_id`, `tanggal_tayang`, `status`, `r_status`) VALUES
(22, 32, 1, 1, '2025-01-03', 1, 0),
(23, 33, 1, 1, '2025-01-03', 1, 0),
(24, 34, 1, 1, '2025-01-03', 1, 0),
(25, 35, 1, 1, '2025-01-03', 1, 0),
(26, 36, 1, 4, '2025-01-03', 1, 0),
(27, 37, 1, 4, '2025-01-03', 1, 0),
(28, 38, 1, 4, '2025-01-03', 1, 0),
(29, 39, 1, 4, '2025-01-03', 1, 0),
(30, 40, 1, 5, '2025-01-03', 1, 0),
(31, 41, 1, 5, '2025-01-03', 1, 0),
(32, 41, 1, 5, '2025-01-03', 0, 0),
(33, 42, 1, 5, '2025-01-03', 1, 0),
(34, 43, 1, 5, '2025-01-03', 1, 0),
(35, 45, 1, 6, '2025-01-03', 1, 0),
(36, 46, 1, 6, '2025-01-03', 1, 0),
(37, 47, 1, 6, '2025-01-03', 1, 0),
(38, 48, 1, 6, '2025-01-03', 1, 0),
(39, 32, 1, 7, '2025-01-04', 1, 0),
(40, 33, 1, 7, '2025-01-04', 1, 0),
(41, 33, 1, 7, '2025-01-04', 0, 0),
(42, 34, 1, 7, '2025-01-04', 1, 0),
(43, 35, 1, 7, '2025-01-04', 1, 0),
(44, 36, 1, 8, '2025-01-04', 1, 0),
(45, 38, 1, 8, '2025-01-04', 1, 0),
(46, 37, 1, 8, '2025-01-04', 1, 0),
(47, 39, 1, 8, '2025-01-04', 1, 0),
(48, 40, 1, 9, '2025-01-04', 1, 0),
(49, 41, 1, 9, '2025-01-04', 1, 0),
(50, 42, 1, 9, '2025-01-04', 1, 0),
(51, 43, 1, 9, '2025-01-04', 1, 0),
(52, 45, 1, 10, '2025-01-04', 1, 0),
(53, 46, 1, 10, '2025-01-04', 1, 0),
(54, 47, 1, 10, '2025-01-04', 1, 0),
(55, 48, 1, 10, '2025-01-04', 1, 0),
(56, 32, 1, 11, '2025-01-05', 1, 0),
(57, 33, 1, 11, '2025-01-05', 1, 0),
(58, 34, 1, 11, '2025-01-05', 1, 0),
(59, 35, 1, 11, '2025-01-05', 1, 0),
(60, 36, 1, 12, '2025-01-05', 1, 0),
(61, 37, 1, 12, '2025-01-05', 1, 0),
(62, 38, 1, 12, '2025-01-05', 1, 0),
(63, 39, 1, 12, '2025-01-05', 1, 0),
(64, 40, 1, 13, '2025-01-05', 1, 0),
(65, 41, 1, 13, '2025-01-05', 1, 0),
(66, 42, 1, 13, '2025-01-05', 1, 0),
(67, 42, 1, 13, '2025-01-05', 0, 0),
(68, 43, 1, 13, '2025-01-05', 1, 0),
(69, 45, 1, 14, '2025-01-05', 1, 0),
(70, 46, 1, 14, '2025-01-05', 1, 0),
(71, 46, 1, 14, '2025-01-05', 0, 0),
(72, 46, 1, 14, '2025-01-05', 0, 0),
(73, 47, 1, 14, '2025-01-05', 1, 0),
(74, 48, 1, 14, '2025-01-05', 1, 0),
(75, 49, 2, 1, '2025-01-03', 1, 0),
(76, 50, 2, 1, '2025-01-03', 1, 0),
(77, 51, 2, 1, '2025-01-03', 1, 0),
(78, 52, 2, 1, '2025-01-03', 1, 0),
(79, 53, 2, 4, '2025-01-03', 1, 0),
(80, 54, 2, 4, '2025-01-03', 1, 0),
(81, 55, 2, 4, '2025-01-03', 1, 0),
(82, 56, 2, 4, '2025-01-03', 1, 0),
(83, 57, 2, 5, '2025-01-03', 1, 0),
(84, 58, 2, 5, '2025-01-03', 1, 0),
(85, 59, 2, 5, '2025-01-03', 1, 0),
(86, 60, 2, 5, '2025-01-03', 1, 0),
(87, 61, 2, 6, '2025-01-03', 1, 0),
(88, 62, 2, 6, '2025-01-03', 1, 0),
(89, 63, 2, 6, '2025-01-03', 1, 0),
(90, 65, 2, 6, '2025-01-03', 1, 0),
(91, 49, 2, 7, '2025-01-04', 1, 0),
(92, 50, 2, 7, '2025-01-04', 1, 0),
(93, 50, 2, 7, '2025-01-04', 0, 0),
(94, 51, 2, 7, '2025-01-04', 1, 0),
(95, 52, 2, 7, '2025-01-04', 1, 0),
(96, 53, 2, 8, '2025-01-04', 1, 0),
(97, 55, 2, 8, '2025-01-04', 1, 0),
(98, 56, 2, 8, '2025-01-04', 1, 0),
(99, 54, 2, 8, '2025-01-04', 1, 0),
(100, 57, 2, 9, '2025-01-04', 1, 0),
(101, 58, 2, 9, '2025-01-04', 1, 0),
(102, 59, 2, 9, '2025-01-04', 1, 0),
(103, 60, 2, 9, '2025-01-04', 1, 0),
(104, 61, 2, 10, '2025-01-04', 1, 0),
(105, 62, 2, 10, '2025-01-04', 1, 0),
(106, 63, 2, 10, '2025-01-04', 1, 0),
(107, 65, 2, 10, '2025-01-04', 1, 0),
(108, 49, 2, 11, '2025-01-05', 1, 0),
(109, 50, 2, 11, '2025-01-05', 1, 0),
(110, 51, 2, 11, '2025-01-05', 1, 0),
(111, 51, 2, 11, '2025-01-05', 0, 0),
(112, 52, 2, 11, '2025-01-05', 1, 0),
(113, 53, 2, 12, '2025-01-05', 1, 0),
(114, 54, 2, 12, '2025-01-05', 1, 0),
(115, 55, 2, 12, '2025-01-05', 1, 0),
(116, 56, 2, 12, '2025-01-05', 1, 0),
(117, 57, 2, 13, '2025-01-05', 1, 0),
(118, 58, 2, 13, '2025-01-05', 1, 0),
(119, 59, 2, 13, '2025-01-05', 1, 0),
(120, 60, 2, 13, '2025-01-05', 1, 0),
(121, 61, 2, 14, '2025-01-05', 1, 0),
(122, 62, 2, 14, '2025-01-05', 1, 0),
(123, 63, 2, 14, '2025-01-05', 1, 0),
(124, 65, 2, 14, '2025-01-05', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jam_tayang`
--

CREATE TABLE `jam_tayang` (
  `jt_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL COMMENT 'pagi,siang,sore',
  `waktu_mulai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam_tayang`
--

INSERT INTO `jam_tayang` (`jt_id`, `screen_id`, `nama`, `waktu_mulai`) VALUES
(32, 5, 'Morning', '10:00:00'),
(33, 5, 'Matinee', '13:00:00'),
(34, 5, 'Evening', '16:00:00'),
(35, 5, 'Night', '20:00:00'),
(36, 7, 'Morning', '10:00:00'),
(37, 7, 'Matinee', '13:00:00'),
(38, 7, 'Evening', '16:00:00'),
(39, 7, 'Night', '20:00:00'),
(40, 8, 'Morning', '10:00:00'),
(41, 8, 'Matinee', '13:00:00'),
(42, 8, 'Evening', '16:00:00'),
(43, 8, 'Night', '20:00:00'),
(45, 11, 'Morning', '10:00:00'),
(46, 11, 'Matinee', '13:00:00'),
(47, 11, 'Evening', '16:00:00'),
(48, 11, 'Night', '20:00:00'),
(49, 6, 'Morning', '09:00:00'),
(50, 6, 'Matinee', '12:30:00'),
(51, 6, 'Evening', '15:30:00'),
(52, 6, 'Night', '19:30:00'),
(53, 9, 'Morning', '09:00:00'),
(54, 9, 'Matinee', '12:30:00'),
(55, 9, 'Evening', '15:30:00'),
(56, 9, 'Night', '19:30:00'),
(57, 10, 'Morning', '09:00:00'),
(58, 10, 'Matinee', '12:30:00'),
(59, 10, 'Evening', '15:30:00'),
(60, 10, 'Night', '19:30:00'),
(61, 12, 'Morning', '09:00:00'),
(62, 12, 'Matinee', '12:30:00'),
(63, 12, 'Evening', '15:30:00'),
(64, 12, 'Evening', '19:30:00'),
(65, 12, 'Night', '19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'email',
  `password` varchar(50) NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_id`, `username`, `password`, `user_type`) VALUES
(1, 1, 'admin@gmail.com', 'password', 1),
(2, 2, 'paquon@gmail.com', 'admin', 1),
(3, 1, 'bbb@gmail.com', '12121212', 2);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `umur` int(2) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`user_id`, `nama`, `email`, `umur`, `jenisKelamin`) VALUES
(1, 'maspa', 'bbb@gmail.com', 21, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

CREATE TABLE `screens` (
  `screen_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `nama_screen` varchar(110) NOT NULL,
  `kursi` int(11) NOT NULL COMMENT 'nomor kursi',
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`screen_id`, `t_id`, `nama_screen`, `kursi`, `harga`) VALUES
(5, 1, 'Studio 1', 100, 45000),
(6, 2, 'Studio 1', 150, 50000),
(7, 1, 'Studio 2', 100, 45000),
(8, 1, 'Studio 3', 100, 45000),
(9, 2, 'Studio 2', 150, 50000),
(10, 2, 'Studio 3', 150, 50000),
(11, 1, 'Studio 4', 100, 45000),
(12, 2, 'Studio 4', 150, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `teater`
--

CREATE TABLE `teater` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teater`
--

INSERT INTO `teater` (`id`, `nama`, `alamat`, `tempat`, `kota`, `pin`) VALUES
(1, 'solo paragon XXI', 'jl.yosodipuro No.133', 'lantai 3\r\n', 'surakarta', 123456),
(2, 'Solo Square XXI', 'Jl. Slamet Riyadi No 451-455', 'lantai 2', 'solo', 2143);

-- --------------------------------------------------------

--
-- Table structure for table `terbaru`
--

CREATE TABLE `terbaru` (
  `news_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pemeran` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terbaru`
--

INSERT INTO `terbaru` (`news_id`, `name`, `pemeran`, `tanggal`, `deskripsi`, `gambar`) VALUES
(1, 'Kupu-Kupu Kertas', 'Amanda Mamopo,Ciko Kurniawan,Reza Arap,Iwa K', '2025-02-01', 'Film Kupu-Kupu Kertas mengisahkan tentang cinta yang terhalang oleh perbedaan ideologi dengan mengemas perpaduan antara tema thriller dan romansa dalam cerita yang cukup menegangkan.', 'news_images/kupu-kupu kertas.jpg'),
(2, 'Norma : Antara Mertua dan Menantu', 'Tissa Biani,Wulan Guritno,Yusuf Mahardika', '2025-03-12', 'Film \"Norma: Antara Mertua dan Menantu\" menceritakan perjalanan rumah tangga Norma Risma dan suaminya, Rozi, yang awalnya tampak harmonis. Namun, konflik muncul ketika Rozi dan Rihanah, ibu Norma, ter', 'news_images/norma.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `tiket_id` int(11) NOT NULL,
  `nomor_tiket` varchar(30) NOT NULL COMMENT 'theatre id',
  `t_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `nomor_kursi` int(3) NOT NULL COMMENT 'nomor kursi',
  `harga` decimal(10,0) NOT NULL,
  `tanggal_tiket` date NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`film_id`),
  ADD KEY `FK_teater` (`t_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`j_id`),
  ADD KEY `FK_jam` (`jt_id`),
  ADD KEY `FK_film` (`film_id`);

--
-- Indexes for table `jam_tayang`
--
ALTER TABLE `jam_tayang`
  ADD PRIMARY KEY (`jt_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`screen_id`),
  ADD KEY `FK_t` (`t_id`);

--
-- Indexes for table `teater`
--
ALTER TABLE `teater`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terbaru`
--
ALTER TABLE `terbaru`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`tiket_id`),
  ADD KEY `FK_theater` (`t_id`),
  ADD KEY `FK_jadwal` (`jadwal_id`),
  ADD KEY `FK_screen` (`screen_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `jam_tayang`
--
ALTER TABLE `jam_tayang`
  MODIFY `jt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `screens`
--
ALTER TABLE `screens`
  MODIFY `screen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teater`
--
ALTER TABLE `teater`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `terbaru`
--
ALTER TABLE `terbaru`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `tiket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `FK_teater` FOREIGN KEY (`t_id`) REFERENCES `teater` (`id`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_film` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`),
  ADD CONSTRAINT `FK_jam` FOREIGN KEY (`jt_id`) REFERENCES `jam_tayang` (`jt_id`);

--
-- Constraints for table `screens`
--
ALTER TABLE `screens`
  ADD CONSTRAINT `FK_t` FOREIGN KEY (`t_id`) REFERENCES `teater` (`id`);

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `FK_jadwal` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`j_id`),
  ADD CONSTRAINT `FK_screen` FOREIGN KEY (`screen_id`) REFERENCES `screens` (`screen_id`),
  ADD CONSTRAINT `FK_theater` FOREIGN KEY (`t_id`) REFERENCES `teater` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
