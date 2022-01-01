-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2022 at 07:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disc_geek`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_web`
--

CREATE TABLE `admin_web` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `jabatan` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_web`
--

INSERT INTO `admin_web` (`id_admin`, `username`, `password`, `nama`, `telepon`, `jabatan`) VALUES
(1, 'admin', 'discgeek', 'admin', '08123456789', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `nama_penerima` varchar(40) NOT NULL,
  `alamat_lengkap` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_kategori` int(4) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_kategori`, `nama`) VALUES
(11, 'Cd_Album'),
(12, 'Vinyl');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_order`
--

CREATE TABLE `daftar_order` (
  `kode_order` varchar(25) NOT NULL,
  `tanggal_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `kode_order` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `jumlah_transfer` varchar(50) NOT NULL,
  `alamat_kirim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `kode_order` varchar(25) NOT NULL,
  `id_akun` int(10) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `email_pembeli` varchar(25) NOT NULL,
  `telepon_pembeli` varchar(25) NOT NULL,
  `alamat_pembeli` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(5) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `artist` varchar(70) NOT NULL,
  `release` date NOT NULL,
  `genre` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` double NOT NULL,
  `stok` varchar(3) NOT NULL,
  `views` int(11) NOT NULL,
  `image` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kategori`, `title`, `artist`, `release`, `genre`, `deskripsi`, `harga`, `stok`, `views`, `image`) VALUES
(1101, 'Cd_Album', 'Happier Than Ever', 'Billie Eilish', '2021-07-30', 'Alternative/Indie', 'awikwok', 380000, '3', 50, 'billie.jpg'),
(1102, 'Cd_Album', 'THE ALBUM', 'BLACKPINK', '2020-10-02', 'K-Pop', 'The Album adalah album studio Korea pertama yang akan datang (kedua secara keseluruhan) oleh grup vokal wanita asal Korea Selatan Blackpink, yang dijadwalkan akan dirilis pada tanggal 2 Oktober 2020, lewat YG Entertainment. Merupakan album artis wanita Korea terlaris sepanjang sejarah dengan penjualan Gaon yang menyentuh angka 1,2 juta salinan album dalam 1 bulan penjualannya', 495000, '5', 233, 'blackpink.jpg'),
(1103, 'Cd_Album', 'Roadrunner : New light, New machine', 'BROCKHAMPTON', '2021-04-09', 'Hip-Hop', 'During the COVID-19 pandemic, Brockhampton released songs on their YouTube channel every weekend, and would sometimes livestream on Twitch and Instagram. During these streams, Brockhampton would play unreleased music, with some songs releasing shortly after the end of some streams.', 175000, '12', 32, 'brockhampton.jpg'),
(1104, 'Cd_Album', 'My Universe', 'BTS, Coldplay', '2021-10-15', 'Alternative/Indie', 'The title of the song was first announced as part of the track listing release of Music of the Spheres in July 2021 without any mention of the song featuring BTS. A snippet of the song was included in a trailer titled \"Overtura\", also omitting any evidence of the Korean group being involved.[9] On 13 September 2021, the song was revealed to be a collaboration between Coldplay and BTS. The single was announced through a coded message on Coldplay\'s Alien Radio FM social media account.[', 200000, '10', 629, 'coldplaybts.png'),
(1105, 'Cd_Album', 'Dream', 'Jung Eun Ji', '2016-04-18', 'K-Pop', 'On April 7, 2016, Plan A Entertainment confirmed that Apink\'s Eunji will be releasing her first solo mini-album on April 18. This was confirmed on April 11 by A Plan Entertainment, with the announcement that Eunji would debut as a solo artist with the mini album \"Dream\" on April 18, with a title track \"Hopefully Sky\".\r\n\r\nThe title track \"Hopefully', 470000, '6', 123, 'eunji.png'),
(1106, 'Cd_Album', '5', 'Mrs. GREEN APPLE', '2021-07-08', 'J-Pop', 'Five-member Japanese rock band from Tokyo that made its major debut in 2015 with EMI Records. They are known for performing the ending theme to the anime series Yu-Gi-Oh! Arc-V as well as their first full album, Twelve, which placed 10th on the Japanese national Oricon charts.', 740000, '12', 83, 'greenapple.png'),
(1107, 'Cd_Album', 'Beerbongs & Bentleys', 'Post Malone', '2018-04-27', 'Hip-Hop', 'Beerbongs & Bentleys is the second studio album by American rapper and singer Post Malone, released by Republic Records on April 27, 2018. The album features guest appearances from Swae Lee, 21 Savage, Ty Dolla Sign, Nicki Minaj, G-Eazy, and YG. It includes production from frequent collaborators Louis Bell and Frank Dukes, alongside London on da Track, Andrew Watt, Tank God, Twice as Nice, Teddy Walton, Scott Storch, and PartyNextDoor, among others.', 145000, '23', 153, 'postmalone.jpg'),
(1108, 'Cd_Album', 'THE ALBUM', 'Shang-Chi and the Legend of the Ten Rings : The Album', '2021-09-01', 'Film Score', 'The soundtrack for the 2021 American superhero film Shang-Chi and the Legend of the Ten Rings, based on the Marvel Comics character Shang-Chi and produced by Marvel Studios, consists of an original score composed by Joel P. West and a soundtrack album on which Sean Miyashiro and 88rising serve as executive producers that features original songs performed by various artists. The film score was released by Marvel Music and Hollywood Records on September 1, 2021, while the soundtrack album was released by Marvel Music, Hollywood Records, and Interscope Records on September 3, 2021, with four singles from the soundtrack released in August 2021.', 485000, '16', 245, 'shangchi.png'),
(1109, 'Cd_Album', 'The Book', 'YOASOBI', '2021-01-06', 'J-Pop', 'The Book (stylized in all caps) is the debut extended play (EP) and first physical release recorded by Yoasobi. It was released on January 6, 2021, the same day with their seventh single \"Kaibutsu\", through Sony Music Entertainment Japan. \"Encore\" serves as a promotional single of the EP.', 2500000, '6', 100, 'yoasobi.png'),
(1110, 'Vinyl_Album', 'Nectar', 'Joji', '2021-09-20', 'Alternative R&B', 'Nectar is the second studio album by Japanese-Australian singer-songwriter Joji, released on 25 September 2020 via 88rising. It features the singles \"Sanctuary\", \"Run\", \"Gimme Love\" and \"Daylight\" with Diplo, as well as collaborations with Benee, Lil Yachty, Omar Apollo, Yves Tumor and Rei Brown', 510000, '8', 432, 'jojivinyl.png'),
(1111, 'Vinyl_Album', 'HEAD IN THE CLOUDS', '88rising', '2021-07-20', 'R&B', 'Head in the Clouds is a compilation album by musical collective 88rising. It was released through 88rising and 12Tone Music on July 20, 2018. Guest appearances include Yung Bans, Yung Pinch, 03 Greedo, BlocBoy JB, Vory, Phum Viphurit, Playboi Carti, Famous Dex, Verbal, Goldlink and Harikiri.', 445000, '8', 203, '88rising.png'),
(1112, 'Vinyl_Album', 'JACK U (With Justin Bieber) - Where Are U Now?', 'JACK Ü, Justin Bieber', '2015-02-27', 'EDM', '\"Where Are Ü Now\" is a song produced by American EDM artists Skrillex and Diplo under their collaborative effort Jack Ü, with vocals from Canadian singer Justin Bieber. The song was released as the second single from the duo\'s debut studio album, Skrillex and Diplo Present Jack Ü (2015), on their respective labels OWSLA and Mad Decent, and is also included on Bieber\'s fourth studio album Purpose (2015). It was released simultaneously with the album on February 27, 2015, later sent to mainstream radio on April 21, 2015.', 645000, '9', 352, 'jacku (3).jpg'),
(1113, 'Vinyl_Album', 'FOUR', 'ONE DIRECTION', '2014-11-17', 'Pop', 'Four (stylized as all caps) is the fourth studio album by English-Irish boy band One Direction, released on 17 November 2014 by Columbia Records and Syco Music. The album was preceded by two singles, \"Steal My Girl\" and \"Night Changes\", both achieving platinum status in the US, and scoring the band their tenth and eleventh UK top-ten hits. The album was also One Direction\'s last with member Zayn Malik, who announced he was leaving the band on 25 March 2015.', 3845000, '7', 79, '1d.jpg'),
(1114, 'Vinyl_Album', 'SOUR', 'Olivia Rodrigo', '2021-05-21', 'Pop', 'Sour (stylized in all caps) is the debut studio album by American singer-songwriter Olivia Rodrigo. It was released on May 21, 2021, via Geffen Records. The album was written by Rodrigo and her producer Dan Nigro, recorded in isolation during the COVID-19 lockdown. Originally planned as an EP, Rodrigo expanded Sour into a full-length album following the viral success of her debut single, \"Drivers License\".', 350000, '16', 414, 'sour.png'),
(1115, 'Vinyl_Album', 'Your Name.', 'Radwimps', '2016-08-24', 'J-Pop', 'Your Name. (Kimi no Na wa.) is the eighth studio album by Japanese rock band Radwimps and the soundtrack for the 2016 Japanese animated film Your Name, released on August 24, 2016, by EMI Records and Universal Music Japan. It debuted at #1 on Oricon\'s weekly album rankings on September 5, 2016, with 58,000 copies sold. It received an album certification of Double Platinum from the Recording Industry Association of Japan for sales of 250,000 in 2017. The album also charted on US Billboard. It peaked at #16 on Billboard Heatseekers Albums, #15 on Billboard Soundtracks Albums, and #2 on Billboard World Albums chart. The vocal tracks were re-recorded in English and became available digitally on January 27, 2017, with a CD release on March 10, 2017', 920000, '3', 55, 'yourname.png'),
(1116, 'Vinyl_Album', 'A Flower Bookmark', 'IU', '2014-05-16', 'K-Pop', 'A Flower Bookmark (Korean: ???; RR: Kkotgalpi) is the first cover extended play by South Korean singer-songwriter IU. It is also her fourth Korean-language extended play. The EP was released on May 16, 2014, the singer\'s birthday, by LOEN Entertainment under its imprint LOEN Tree. Unlike her previous works, A Flower Bookmark features cover versions of nostalgic K-pop songs popularized from 1980s to 1990s.', 260000, '5', 41, 'iu.png'),
(1117, 'Vinyl_Album', 'One of a kind', 'G-Dragon', '2012-09-15', 'K-Pop', 'One of a Kind adalah album mini pertama dari rapper Korea Selatan sekaligus leader grup Big Bang, G-Dragon. Album mini ini dirilis secara digital pada 15 September dan album fisik dirilis pada 18 September. Album ini terdiri dari tujuh lagu yang semuanya ikut disusun dan ditulis oleh G-Dragon sendiri', 8340000, '2', 88, 'gdragon.png');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `komentar` text NOT NULL,
  `commentDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_akun` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_akun`, `username`, `email`, `password`) VALUES
(6969, 'ilham ganteng', 'ilham@example.com', '3030');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_web`
--
ALTER TABLE `admin_web`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `daftar_order`
--
ALTER TABLE `daftar_order`
  ADD KEY `kode_order` (`kode_order`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`kode_order`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`kode_order`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`,`id_akun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_web`
--
ALTER TABLE `admin_web`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_kategori` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1118;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
