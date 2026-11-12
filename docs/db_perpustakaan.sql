-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2026 at 09:27 AM
-- Server version: 10.11.14-MariaDB-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--
CREATE DATABASE IF NOT EXISTS `db_perpustakaan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_perpustakaan`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `sinopsis` text DEFAULT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `cover` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `judul`, `penulis`, `sinopsis`, `tahun_terbit`, `stok`, `cover`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Atomic Habits: Perubahan Kecil yang Memberikan Hasil Luar Biasa', 'James Clear', 'Atomic Habits: Perubahan Kecil yang Memberikan Hasil Luar Biasa adalah buku kategori self improvement karya James Clear. Pada umumnya, perubahan-perubahan kecil seringkali terkesan tak bermakna karena tidak langsung membawa perubahan nyata pada hidup suatu manusia. Jika diumpamakan sekeping koin tidak bisa menjadikan kaya, suatu perubahan positif seperti meditasi selama satu menit atau membaca buku satu halaman setiap hari mustahil menghasilkan perbedaan yang bisa terdeteksi. Namun hal tersebut tidak sejalan dengan pemikiran James Clear, ia merupakan seorang pakar dunia yang terkenal dengan \'habits\' atau kebiasaan. Ia tahu bahwa tiap perbaikan kecil bagaikan menambahkan pasir ke sisi positif timbangan dan akan menghasilkan perubahan nyata yang berasal dari efek gabungan ratusan bahkan ribuan keputusan kecil. Ia menamakan perubahan kecil yang membawa pengaruh yang luar biasa dengan nama atomic habits.\r\n\r\nDalam buku ini James Clear, seorang penulis sekaligus pembicara yang sangat terkenal akan topik \'habit\' memaparkan bahwa pada hakikatnya sebuah perubahan kecil (Atomic Habit) sering dianggap remeh, sebenarnya akan memberikan hasil yang sangat menjanjikan dalam hidup. Yang dipandang penting dalam perubahan perilaku bukan satu persen perbaikan tunggal, melainkan ribuan perbaikan atau sekumpulan atomic habits yang saling bertumpuk dan menjadi unit dasar dalam suatu sistem yang penting.\r\n\r\nJames Clear menjelaskan bahwa terdapat tiga tingkat perubahan yaitu perubahan hasil, perubahan proses, dan perubahan identitas. Cara paling efektif dalam mengubah kebiasaan adalah bukan berfokus pada apa yang ingin dicapai, melainkan tipe orang seperti apa yang diinginkan. Identitas seseorang muncul dari kebiasaan yang dilakukan setiap harinya. Alasan utama kebiasaan penting karena kebiasaan dapat mengubah keyakinan tentang diri sendiri.\r\n\r\nClear juga memperkenalkan empat Kaidah Perubahan Perilaku untuk membantu mengubah perilaku manusia yaitu menjadikannya terlihat, menjadikannya menarik, menjadikannya mudah, menjadikannya memuaskan. Keempat kaidah ini tidak hanya mengajari kita cara menciptakan kebiasaan-kebiasaan baru, melainkan menyingkapi sejumlah wawasan menarik tentang perilaku manusia.', '2019', 5, 'covers/RvntOGbssZxt5CUvpr9W4Kd8d2ksQHyCo4Sa9Svg.jpg', NULL, '2026-11-07 21:14:45', '2026-11-17 18:31:34'),
(2, 1, 'Berani Tidak Disukai', 'Ichiro Kishimi & Fumitake Koga', 'Berani Tidak Disukai memiliki judul asli \"The Courage to be Disliked: How to Free Yourself, Change Your Life and Achieve Real Happiness\". Buku karangan Ichiro kishimi dan Fumitake Koga ini telah terjual sebanyak lebih dari 3,5 juta eksemplar. Buku ini laris di pasaran hingga diterjemahkan ke dalam berbagai bahasa, salah satunya bahasa Indonesia. Berani Tidak Disukai merupakan buku yang berisikan dialog antara seorang filsuf dengan seorang pemuda. Dialog yang dilakukan selama lima malam ini, berisi percakapan dari seorang pemuda yang tidak puas dengan kehidupannya dan seorang filsuf yang mengajarkannya tentang bagaimana cara mendapatkan kebahagiaan di dunia. Dialog-dialog tersebut dibingkai menjadi lima percakapan yang tiap percakapannya memuat satu inti menarik tentang hidup.\r\n\r\nDalam buku ini, pembaca akan merasakan bahwa seluruh rangkaian kata yang ada di dalam-nya seperti sebuah kutipan. Hampir semuanya berisikan makna indah dan membuat pembaca berpikir tentang bagaimana cara untuk berubah menjadi lebih baik. Berani Tidak Disukai membantu para pembaca untuk menggali kekuatan di dalam dirinya sebagai bekal meraih kebahagiaan yang diinginkan. Ada banyak hal baru yang akan membuat pembaca sadar bahwa beberapa hal seharusnya tidak dilakukan saat ini karena hal tersebut bisa saja menghambat kebahagiaan pada masa depan.\r\n\r\nSalah satu contohnya adalah mengenang trauma masa lalu dan menjadikan kehidupan orang lain sebagai standar kebahagiaan. Setelah membaca buku ini, pikiran pembaca menjadi semakin terbuka pada langkah baru untuk mengubah hidup menjadi lebih baik lewat tindakan berani untuk tidak disukai oleh orang lain. Bagian menarik dari buku ini ialah ketika seorang filsuf berbicara menurut pandangannya tanpa berusaha menggurui si pemuda. Namun, pandangan dari sang filsuf tersebut justru dapat menjadi pembelajaran bagi pembaca.', '2019', 2, 'covers/fsbvERox9vgY7rRLjVEARySfvBuqZLRqIlnKPztp.jpg', NULL, '2026-11-07 21:15:44', '2026-11-07 21:26:09'),
(3, 1, 'Bicara Itu Ada Seninya', 'Oh Su Hyang', '\"TAHUKAH ANDA BAHWA BERBICARA ITU ADA SENINYA?\r\n\r\nKetika komunikasi menjadi hal yang penting untuk bersaing, pakar komunikasi Oh Su Hyang mengeluarkan buku yang sangat berarti. Selain berisi tentang pengalaman peningkatan diri, buku ini juga memuat berbagai konten mengenai teknik komunikasi, persuasi, dan negosiasi.\r\n\r\nLalu bagaimana cara berbicara yang baik? Apakah berbicara dengan artikulasi yang jelas? Atau berbicara tanpa mengambil tarikan napas? Tidak! Sebuah ucapan yang bisa disebut baik adalah yang bisa menggetarkan hati. Ucapan seorang juara memiliki daya tarik tersendiri. Ucapan pemandu acara memiliki kemampuan menghidupkan suasana dan kekuatan kalimatnya yang terus terang. Anda harus pandai berbicara untuk menunjukkan diri Anda kepada lawan bicara dalam kehidupan sosial. Orang yang berbicara dengan mahir akan menjadi lebih maju daripada yang lainnya.\r\n\r\nUntuk mencapai tujuan komunikasi, persuasi, dan negosiasi, Anda harus mengetahui metode komunikasi yang efisien. Buku ini dijabarkan agar dapat dimengerti oleh siapa saja. Terdapat banyak episode menarik dari orang-orang terkenal dan juga rahasia inti dari komunikasi. Jika Anda membacanya dengan runut, saya yakin rasa percaya diri Anda untuk berbicara pun akan tumbuh dengan sendirinya.\"', '2016', 5, 'covers/SGt1GjY84qIJaZzSIXPiHwLbKqYJc0OXsCcvMb2P.jpg', NULL, '2026-11-07 21:17:02', '2026-11-07 21:17:02'),
(4, 1, 'Filosofi Teras', 'Henry Manampiring', 'Lebih dari 2000 tahun lalu, sebuah mazhab filsafat menemukan akar masalah dan juga solusi dari banyak emosi negatif. Stoisisme, atau Filosofi Teras, adalah filsafat Yunani-Romawi kuno yang bisa membantu kita mengatasi emosi negatif dan menghasilkan mental yang tangguh dalam menghadapi naik-turun nya kehidupan.\r\n\r\nJauh dari kesan filsafat sebagai topik berat dan mengawang-awang, Filosofi Teras justru bersifat praktis dan relevan dengan kehidupan Generasi Milenial dan Gen-Z masa kini.\r\n\r\nBuku yang pertama kali diterbitkan pada 2019 ini mengajarkan kita tentang pengendalian emosi negatif yang ada dalam diri kita. Buku Filosofi Teras menjadi buku mega best seller, dan memenangkan Book of the Year di Indonesia International Book Fair pada 2019. Filosofi Teras memiliki tebal sebanyak 344 halaman.\r\n\r\nBuku ini mudah dipahami dengan ilustrasi tokoh filsafat, serta kata-kata bijak yang menambah daya tarik dalam membaca. Buku karangan Henry Manampiring ini sangat cocok dibaca untuk para generasi milenial, dan Gen Z dalam menghadapi ketakutan, kekhawatiran, kecemasan, serta hal negatif lainnya.\r\n\r\nAwal mula kehadiran buku ini tidak lain dari latar belakang kondisi sang penulis yang didiagnosis major depressive disorder. Hingga akhirnya ia menemukan buku tentang penerapan filsafat stoa dalam hidup.\r\nStoa sendiri identik dengan kesederhanaan, dan menerima keadaan yang tidak bisa dikendalikan. Namun, stoicism bukan berarti pasrah dan tidak peduli sama sekali. Filsafat ini mengajarkan kita untuk memiliki prinsip indifferent.', '2023', 3, 'covers/8pNJ2ntfcYXPf6d0qkSUZj6bcDh0LCv50YmjifwR.jpg', NULL, '2026-11-07 21:18:22', '2026-11-12 02:12:38'),
(5, 1, 'Goodbye, Things: Hidup Minimalis ala Orang Jepang', 'Fumio Sasaki', 'Fumio Sasaki bukan ahli dalam hal minimalisme; ia hanya pria biasa yang mudah tertekan di tempat kerja, tidak percaya diri, dan terus menerus membandingkan diri dengan orang lain-sampai suatu hari, ia memutuskan untuk mengubah hidupnya dengan mengurangi barang yang ia miliki.\r\n\r\nManfaat luar biasa langsung ia rasakan: tanoa semua \"barangnya\", Sasaki akhirnya merasakan kebebasan sejati, kedamaian pikiran, dan penghargaan terhadap momen saat ini. Sasaki memahami minimalisme sebagai \"gaya hidup yang berarti kita mengurangi jumlah barang yang kita miliki sampai tingkat paling minimum.\" Di bukunya ia menjelaskan, di masa lalu orang Jepang hidup minimalis.\r\n\r\nSebetulnya, gaya hidup minimalis tak hanya pernah tumbuh di Jepang. Di berbagai masrayakat pra-industrialisasi dan konsumerisme, hidup minimalis dalam arti pola hidup sederhana jamak dilakukan. Di Jepang sendiri, minimalisme mulai banyak dibicarakan kembali sejak 2010. Sekitar tahun itu konsep \"danshari\" yakni seni membereskan, membuang, dan berpisah dari barang-barang jadi pembicaraan publik.\r\n\r\nLewat berbagai iklan di media massa kita dibuat percaya semakin kita memiliki banyak barang, maka kita layak disebut orang kaya. Menjadi kaya, yang berarti punya banyak barang, jadi ukuran kebahagiaan. Padahal kebahagiaan sebuah konsep semu. Apa yang membuat seseorang bahagia berbeda-beda. Fumio Sasaki justru merasa bahagia setelah membuang banyak barang-barangnya.', '2018', 7, 'covers/UKJY6VcauB5gCRWjMokjbTIVSco2DIw1JKMMqDoI.jpg', NULL, '2026-11-07 21:19:17', '2026-11-11 21:18:04'),
(6, 1, 'The Alpha Girl`S Guide', 'Henry Manampiring', 'Alpha Female adalah para perempuan yang menginspirasi, memimpin, menggerakkan orang sekitarnya, dan membawa perubahan. Mereka cerdas, percaya diri, dan independen. Bagaimana remaja dan perempuan muda bisa mengembangkan diri menjadi mereka? Buku ini adalah hasil pengamatan, riset artikel, wawancara langsung, dan diskusi dengan banyak perempuan di media sosial. Ditulis dengan ringan, penuh ilustrasi kocak, namun tetap blak-blakan dan menohok,The Alpha Girl’s Guide akan membuat kamu terinspirasi menjadi cewek smart, independen dan bebas galau!\r\n\r\nPenasaran pembahasan apa saja yang ada di dalam buku? The Alpha Girl’s Guide akan membahas beberapa tips seperti:\r\n- Mana yang lebih penting, nilai atau pengalaman berorganisasi?\r\n- Apakah teman kamu teman sejati atau teman yang menghambat?\r\n- Bagaimana mengetahui cowok parasit dan manipulatif?\r\ndan masih banyak lagi!', '2020', 4, 'covers/qd5TMWqptTjR7kNFkq7oqCp2CoZMcc4upCbOzdRY.jpg', NULL, '2026-11-07 21:20:12', '2026-11-11 20:46:10'),
(7, 1, 'The 5 AM Club : Bangun Rutinitas Pagi Untuk Level Up Hidupmu!', 'Robin Sharma', 'The 5 AM Club berdasarkan konsep dan metode yang selama ini telah diajarkan penulis kepada para pengusaha sukses terkenal, CEO dari perusahaan legendaris, bintang olahraga, orang ternama di bidang musik, dan anggota keluarga kerajaan―dengan kesuksesan luar biasa―selama lebih dua puluh tahun. Buku ini membantu Anda melekat pada kebiasaan bangun pagi hari sebagai praktik seumur hidup juga menerapkan The 20/20/20 Formula sebagai rutinitas pagi sehingga Anda mengalami hasil kelas-dunia.', '2021', 8, 'covers/qarOW5pjmEufqZdlAzyh7qxwwksdTC3EW0jkOULo.jpg', NULL, '2026-11-07 21:22:43', '2026-11-09 07:06:29'),
(8, 1, 'The Power Of Habit', 'Charles Duhigg', 'Buku karya Charles Duhigg “The Power of Habit” ada buku yang akan membawa kita pembacanya dalam pengendalian diri dan merubah pola pikir kita pembacanya ketika kita dihadapi dan menyikapi suatu keadaan. Charles Duhigg akan menjabarkan secara sistematis suatu sikap atau kebiasaan seseorang melalui sebuah kejadian yang akan terkait dalam diri orang tersebut.\r\n\r\nDiharapkan dengan membaca buku karya Charles Duhigg kita dapat kembali bersemangat memulai sesuatu dari “small step” untuk membangun kebiasaan baru yang lebih baik lagi. Di dalam buku ini Charles Duhigg menjelaskan pada tahap awal untuk membuat lingkaran kebiasaan yang dapat menjelaskan bagaimana suatu kebiasaan terbentuk menjadi hal yang otomatis dilakukan oleh suatu individu.\r\n\r\nAda 3 tahapan dalam membuatnya yaitu tanda, rutinitas, dan ganjaran. Hal yang paling utama dalam membantu menciptakan sebuah pola pikir yang lebih sistematis pagi kita pembacanya. Charles Duhigg menjelaskan cara membuat pola kebiasaan dengan cara yang sangat mudah untuk kita pembacanya dalam pengaplikasikannya di kehdiupaan sehari-hari.\r\n\r\nMeskipun terlihat seperti buku yang akan berisikan hal-hal yang berat namun pembahasan yang dibawakan oleh Charles Duhigg tidak seberat itu dan mudah untuk kita pahami. Pada akhir buku ini Charles Duhigg akan mempertegas tentang perbedaan antara kebiasaan baik dan buruk dan kebiasaan suatu individu tergantung dari tingkat konsistensi mereka terhadap sebuah perubahan dan kontrol terhadap diri sendiri.', '2019', 2, 'covers/gLD1wGCvavWSuYbfoLzQY92mtH9YwqwVNWcVxR7k.jpg', NULL, '2026-11-07 21:23:53', '2026-11-07 21:23:53'),
(18, 5, 'Cantik Itu Luka', 'Eka Kurniawan', 'Hidup di era kolonialisme bagi para wanita dianggap sudah setara seperti hidup di neraka. Terutama bagi para wanita berparas cantik yang menjadi incaran tentara penjajah untuk melampiaskan hasrat mereka. Itu lah takdir miris yang dilalui Dewi Ayu, demi menyelamatkan hidupnya sendiri Dewi harus menerima paksaan menjadi pelacur bagi tentara Belanda dan Jepang selama masa kedudukan mereka di Indonesia.\r\n\r\nKecantikan Dewi tidak hanya terkenal dikalangan para penjajah saja, seluruh desa pun mengakui pesona parasnya itu. Namun bagi Dewi, kecantikannya ini seperti kutukan, kutukan yang membuat hidupnya sengsara, dan kutukan yang mengancam takdir keempat anak perempuannya yang ikut mewarisi genetik cantiknya.\r\n\r\nTapi tidak dengan satu anak terakhir Dewi, si Cantik, yang lahir dengan kondisi buruk rupa. Tak lama setelah mendatangkan Cantik ke dunia, Dewi harus berpulang. Tapi di satu sore, dua puluh satu tahun kemudian, Dewi kembali, bangkit dari kuburannya. Kebangkitannya menguak kutukan dan tragedi keluarga.\r\n\r\nBagaimana takdir yang akan menghampiri si Cantik? Apa yang membuat Dewi harus kembali ke dunia bak neraka ini? Ungkap rahasia dibalik misteri kisah masa kolonial dalam novel Cantik Itu Luka karya Eka Kurniawan.', '2018', 2, 'covers/TE3N6Tr7m3rVED6KqEgYZ5AmH0lYUdbCQ96kajVz.jpg', NULL, '2026-11-10 18:46:49', '2026-11-10 18:46:49'),
(19, 5, 'Funiculi Funicula', 'Toshikazu Kawaguchi', 'Kafe tua yang berada di gang kecil Tokyo terletak di bawah gedung lain, tidak butuh pendingin untuk mendinginkan Kafe tersebut. Tidak begitu ramai, namun terkenal karena bisa membawa pengunjungnya menjelajahi waktu. Keajaiban kafe itu menarik seorang wanita yang ingin memutar waktu untuk berbaikan dengan kekasihnya, seorang perawat yang ingin membaca surat yang tak sempat diberikan suaminya yang sakit, seorang kakak yang ingin menemui adiknya untuk terakhir kali, dan seorang ibu yang ingin bertemu dengan anak yang mungkin takkan pernah dikenalnya. Namun ada banyak peraturan yang harus diingat. Satu, mereka harus tetap duduk di kursi yang telah ditentukan. Dua, apapun yang mereka lakukan di masa yang didatangi takkan mengubah kenyataan di masa kini. Tiga, mereka harus menghabiskan kopi khusus yang disajikan sebelum kopi itu dingin. Rentetan peraturan lainnya tak menghentikan orang-orang itu untuk menjelajahi waktu. Akan tetapi, jika kepergian mereka tak mengubah satu hal pun di masa kini, layakkah semua itu dijalani?', '2021', 3, 'covers/1RccxPVViwSC7qQus9udEMkVJLAOe4lr5qcb0Hjl.jpg', NULL, '2026-11-10 18:47:52', '2026-11-10 18:47:52'),
(20, 5, 'Laut Bercerita', 'Leila S. Chudori', 'Laut Bercerita, novel terbaru Leila S. Chudori, bertutur tentang kisah keluarga yang kehilangan, sekumpulan sahabat yang merasakan kekosongan di dada, sekelompok orang yang gemar menyiksa dan lancar berkhianat, sejumlah keluarga yang mencari kejelasan makam anaknya, dan tentang cinta yang tak akan luntur.', '2017', 7, 'covers/U9cASg8IsGFTDtGtvf9jAzMvzHBDlW1MRHiEX8hw.jpg', NULL, '2026-11-10 18:48:37', '2026-11-10 18:48:37'),
(21, 5, 'Seporsi Mie Ayam Sebelum Mati', 'Brian Khrisna', 'Seperti malam-malam lain, aku pulang selepas lembur. Orang-orang di kantor yang sudah menikah, mereka akan pulang ke keluarganya masing-masing. Sementara aku yang tidak punya siapa-siapa ini, sekarang masih duduk sendirian di parkiran mobil yang sudah lengang, bersama sebotol bir, rokok murah, dan sepotong kue ulang tahunku sendiri yang kubeli dari toko manisan dekat kantor.\r\n\r\nAku takut kalau ternyata selama ini aku tidak pernah berhasil menjalani hidup seperti sebagaimana seharusnya. Di kepalaku sekarang, pertanyaan ini semakin lama semakin membesar. “Pantaskah hidup ini kulanjutkan?”\r\n\r\nAku berdiri menatap ke langit malam.\r\nKini tekadku sudah bulat.\r\nAku akan bunuh diri 24 jam dari sekarang.\r\n\r\nSetelah satu tahun terbit, Seporsi Mie Ayam Sebelum Mati sudah menemani pembaca di seluruh Indonesia hingga akhirnya mencapai seratus kali cetak ulang.\r\n\r\nEdisi cetakan ke-100 ini hadir sebagai edisi spesial dan terbatas dengan cover jacket dan desain baru. Cetakan spesial ini juga mendapat tambahan chapter dan ilustrasi yang mempertemukan kembali Ale dengan Murad.', '2025', 10, 'covers/Ix1Ih1cIPwlKsUclJnlsVEY7afL2xk1IUHixxwHU.jpg', NULL, '2026-11-10 18:49:33', '2026-11-28 06:58:41'),
(22, 5, 'Sisi Tergelap Surga', 'Brian Khrisna', 'Jakarta kerap menjadi pelabuhan bagi mereka yang datang membawa sekoper harapan. Mereka yang siap bertaruh dengan nasibnya sendiri-sendiri. Namun, kota ini selalu mampu melumat habis harapan dan menukarnya dengan keputusasaan. Pemulung, pengamen, pramuria yang menjajakan tubuh agar anaknya bisa makan, pemimpin-pemimpin kecil yang culas, lelaki tua di balik kostum badut ayam, pencuri motor yang ingin membeli obat untuk ibunya, remaja yang melumuri tubuh dengan cat perak, hingga mereka yang bergelut di terminal setelah terpaksa merelakan impiannya habis digerus kejinya ibu kota. Di Jakarta, semua orang dipaksa bergelut dan bertempur demi bisa hidup dari hari ke hari. Dan di kampung inilah semua itu dimulai. Sebuah cerita tentang kehidupan orang-orang yang hidup di sisi tergelap surga kota bernama Jakarta...', '2023', 1, 'covers/3QNWrRttgmhVruUG0qIKE86xAILZKD0pHVT1J7M1.jpg', NULL, '2026-11-10 18:50:32', '2026-11-10 18:50:32'),
(23, 5, 'Timun Jelita', 'Raditya Dika', 'Setelah ayahnya meninggal dan mewariskan sebuah gitar tua, seorang akuntan berusia 40 tahun menemukan hasrat untuk kembali bermusik.\r\n\r\nBerdua saudaranya, seorang mahasiswi yang susah percaya dengan orang baru, mereka\r\nmembuat sebuah grup.\r\n\r\nTimun Jelita, sebuah cerita panjang dan duo musik.', '2024', 2, 'covers/vj2d78iVcP34XUieB6I61H8mfhygjGj4gOLsOZkd.jpg', NULL, '2026-11-10 18:51:16', '2026-11-10 18:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

DROP TABLE IF EXISTS `borrows`;
CREATE TABLE `borrows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_dikembalikan` date DEFAULT NULL,
  `status` enum('dipinjam','dikembalikan') NOT NULL DEFAULT 'dipinjam',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`id`, `user_id`, `book_id`, `tanggal_pinjam`, `tanggal_kembali`, `tanggal_dikembalikan`, `status`, `created_at`, `updated_at`) VALUES
(13, 3, 6, '2026-11-11', '2026-11-18', '2026-11-25', 'dikembalikan', '2026-11-10 18:31:03', '2026-11-24 18:31:55'),
(14, 8, 4, '2026-11-11', '2026-11-18', '2026-11-11', 'dikembalikan', '2026-11-11 06:37:45', '2026-11-11 06:40:04'),
(15, 8, 21, '2026-11-11', '2026-11-18', '2026-11-28', 'dikembalikan', '2026-11-11 06:43:23', '2026-11-28 06:58:41'),
(16, 8, 5, '2026-11-11', '2026-11-18', '2026-11-28', 'dikembalikan', '2026-11-11 08:08:16', '2026-11-28 08:09:52'),
(17, 8, 6, '2026-11-12', '2026-11-19', NULL, 'dipinjam', '2026-11-11 20:46:10', '2026-11-11 20:46:10'),
(19, 8, 4, '2026-11-12', '2026-11-19', NULL, 'dipinjam', '2026-11-12 02:12:38', '2026-11-12 02:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Pengembangan Diri', NULL, '2026-11-07 21:12:47', '2026-11-07 21:12:47'),
(5, 'Fiksi', NULL, '2026-11-10 18:45:25', '2026-11-10 18:45:25'),
(6, 'Komputer', NULL, '2026-11-11 06:56:05', '2026-11-11 07:21:31'),
(9, 'Filsafat', NULL, '2026-11-11 08:06:09', '2026-11-11 08:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_11_06_010156_create_buku_tabel', 1),
(5, '2026_11_06_072959_rename_buku_tabel_to_books', 1),
(6, '2026_11_06_082431_add_cover_to_books_table', 1),
(7, '2026_11_06_091112_add_role_to_users_table', 1),
(8, '2026_11_06_094802_create_categories_table', 1),
(9, '2026_11_06_121108_add_category_id_to_books_table', 1),
(10, '2026_11_06_131631_create_borrows_table', 1),
(11, '2026_11_07_023409_add_stok_to_books_table', 1),
(12, '2026_11_07_032656_add_sinopsis_to_books_table', 1),
(13, '2026_11_10_131403_add_tanggal_dikembalikan_to_borrows_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('VCvxbqInLht5hmPeN0KHpAzXtci7ezCK2PzCMHaC', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJaZUdoS0FFWWMySjNyc3JnOTJwR2dENmtVdFVhaHpXb3ZJNEdHbmpPIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2FkbWluIiwicm91dGUiOm51bGx9LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwicGFzc3dvcmRfaGFzaF93ZWIiOiJkYmMzZjQwYzUyYTc5NjNhNTc2NzEwMmJiMWIxNzI4NzI4ZGQyNTg0MmI4YmQxZDhkOGI5YjhhN2FlYzNkYTZlIiwiYXV0aCI6eyJwYXNzd29yZF9jb25maXJtZWRfYXQiOjE3OTQ0NzU2MDN9fQ==', 1794475603);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'member',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin', NULL, '$2y$12$HZNBB/9/3Vma9wSBxFTXveGPGRr0b84RMppwRB6J4MsQUQgPBIYju', NULL, '2026-11-07 21:09:31', '2026-11-07 21:09:31'),
(3, 'Fiony', 'fiony@gmail.com', 'pekerja', NULL, '$2y$12$E9P/B.DWYb9JVC8ggrQ40egHgHYpFEnWLcnnrMhO1jzWNAlLFEjgy', NULL, '2026-11-10 07:24:57', '2026-11-11 07:25:16'),
(8, 'Windah Basudara', 'windah@gmail.com', 'member', NULL, '$2y$12$ryf3VxSZx6Q04fA22YYe0OnVA6RADd4VMA9W9LEwx4hfpkk/OnEw6', NULL, '2026-11-11 06:29:57', '2026-11-11 21:15:43'),
(11, 'Gracie', 'gracie@gmail.com', 'member', NULL, '$2y$12$MmvCfskk7udUXP4z0AWOfeWrLHMNWUfwf6RZzqTuPiKXG.uKOI00K', NULL, '2026-11-11 08:06:49', '2026-11-11 21:15:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrows_user_id_foreign` (`user_id`),
  ADD KEY `borrows_book_id_foreign` (`book_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `borrows`
--
ALTER TABLE `borrows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `borrows`
--
ALTER TABLE `borrows`
  ADD CONSTRAINT `borrows_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
