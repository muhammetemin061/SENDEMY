-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Nis 2026, 16:57:22
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `uyelik`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `parola` text NOT NULL,
  `kayit_tarihi` datetime NOT NULL DEFAULT current_timestamp(),
  `yetki` varchar(10) NOT NULL DEFAULT 'uye'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kullanici_adi`, `email`, `parola`, `kayit_tarihi`, `yetki`) VALUES
(18, 'ibadullah', 'ibo@gmail.com', '12345678', '2024-05-29 16:24:51', 'uye'),
(33, 'Emrah', 'emrahcukur10@gmail.com', '12345678', '2024-05-29 16:28:13', 'admin'),
(35, 'burak', 'burak@burak', '$2y$10$CxrFgZCHTw7.1s6tj2WAr.xK1yfbEYXtUHlnjiWAmnaPzpPOXXQrK', '2024-05-29 20:22:48', 'uye'),
(36, 'Mamiley61', 'muhammetemin061@outlook.com', '$2y$10$LCRFDQnF6T/b0EQ1ZP5RCO6RPw5oJapk3YsK3D5n2WmhGv6MwILQu', '2024-05-29 23:03:18', 'uye'),
(37, 'furkan', 'furkan@gmail.com', '$2y$10$siMzTMjeijjBlMvLtA9DKuHSaD2Fx1ZlKTozvc9jeuVH8VmVUpp1m', '2024-05-30 00:33:24', 'uye'),
(38, 'ahmad', 'admad@ahmad.com', '$2y$10$D6cbIaZaMp2Pn5j/Gq6H5Oez2449DbZofFv8j1kZ08ZOQMkKkbe3G', '2024-05-30 00:57:58', 'uye'),
(41, 'mhmhmm', 'asdasd@asd', '$2y$10$8owzGYuthCm33XgdEKppfO1OKEO958CT/OH3/m.hT67JH0opfPrcC', '2024-05-30 03:11:56', 'uye'),
(42, 'asdfasdf', 'qwerqwer@qwer', '$2y$10$1Jmi2e8nX4PtzljXDJ7BruR8VzQ7w2liWftBboFWAm4KIGoSEsIOy', '2024-05-30 03:13:40', 'uye'),
(43, 'musa', 'musa10@gmail.com', '$2y$10$5s4dVluT8AnSX6NsNjCUTOrxuJ3rjslaAoB0FMPOOifkMRRNBC1ye', '2024-05-30 13:31:13', 'uye'),
(44, 'ozan', 'ozansensoy44@gmail.com', '$2y$10$ewsm1DKpjLf5CFUcnA8eOuTjc5njpS/OH1JiaWHfdkrKwaThar7Xi', '2024-05-30 13:56:12', 'uye'),
(45, 'canrosso', 'umutkesim97@gmail.com', '$2y$10$hcp61e762RCgzXSohstusOUfSf9.b.Lsn6oRNBTWALkm7hRoEbYO.', '2024-05-30 14:06:49', 'uye'),
(46, 'Enes006', 'enestaskiran0606@gmail.com', '$2y$10$K7OP7YqViRKMj0ZXgjtEp.fi0l4SM0pWzOOAtNrHAxN7SHT0Z.sH.', '2024-05-30 14:10:28', 'uye'),
(47, 'samet', 'samet@gmail.com', '$2y$10$6kmGs6YLnxo0HhzEJTm5EuNrAapx42wpcvx3UOlLiUHNCWEdMwfCS', '2024-06-05 14:34:55', 'uye');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satinalim`
--

CREATE TABLE `satinalim` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `tarih` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `satinalim`
--

INSERT INTO `satinalim` (`id`, `user_id`, `video_id`, `tarih`) VALUES
(10, 18, 58, '2024-05-29'),
(11, 33, 58, '2024-05-29'),
(12, 36, 61, '2024-05-29'),
(13, 36, 64, '2024-05-29'),
(14, 36, 58, '2024-05-29'),
(15, 36, 69, '2024-05-29'),
(16, 36, 69, '2024-05-29'),
(17, 36, 55, '2024-05-29'),
(18, 36, 62, '2024-05-29'),
(19, 36, 59, '2024-05-30'),
(20, 36, 59, '2024-05-30'),
(21, 36, 59, '2024-05-30'),
(22, 36, 59, '2024-05-30'),
(23, 36, 59, '2024-05-30'),
(24, 37, 55, '2024-05-30'),
(25, 37, 65, '2024-05-30'),
(26, 37, 69, '2024-05-30'),
(27, 37, 58, '2024-05-30'),
(28, 38, 55, '2024-05-30'),
(29, 38, 55, '2024-05-30'),
(30, 38, 55, '2024-05-30'),
(31, 38, 55, '2024-05-30'),
(32, 38, 55, '2024-05-30'),
(33, 38, 55, '2024-05-30'),
(34, 38, 56, '2024-05-30'),
(35, 38, 58, '2024-05-30'),
(36, 38, 64, '2024-05-30'),
(37, 38, 71, '2024-05-30'),
(38, 33, 55, '2024-05-30'),
(39, 33, 59, '2024-05-30'),
(40, 33, 61, '2024-05-30'),
(41, 33, 56, '2024-05-30'),
(42, 33, 60, '2024-05-30'),
(43, 33, 62, '2024-05-30'),
(44, 33, 65, '2024-05-30'),
(45, 33, 66, '2024-05-30'),
(46, 41, 55, '2024-05-30'),
(47, 41, 71, '2024-05-30'),
(48, 41, 56, '2024-05-30'),
(49, 41, 60, '2024-05-30'),
(50, 45, 56, '2024-05-30'),
(51, 46, 62, '2024-05-30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `videolar`
--

CREATE TABLE `videolar` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `video` longblob NOT NULL,
  `baslik` varchar(256) NOT NULL,
  `aciklama` varchar(1024) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `kategori` varchar(30) DEFAULT NULL,
  `onay` varchar(1) NOT NULL,
  `videookapak` longblob NOT NULL,
  `fiyat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `videolar`
--

INSERT INTO `videolar` (`id`, `user`, `video`, `baslik`, `aciklama`, `tarih`, `kategori`, `onay`, `videookapak`, `fiyat`) VALUES
(55, 33, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f452d746963617265742028456c656b74726f6e696b20546963617265742029204e656469725f20452d74696361726574696e2054616ec4b16dc4b12e6d7034, 'E-ticaretin Tanımı', 'E-Ticaret ile ilgili herkesin bilmesi gereken püf noktalar.', '2024-05-29 19:13:33', 'E-Ticaret', 'O', 0x75706c6f6164732f65746963617265312e6a7067, 1000),
(56, 33, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f452d54696361726574205961706d616b2069c3a7696e204e656c657220476572656b6c695f20f09f949120c4b06e7465726e657474656e20536174c4b1c59f205961706d616b20c4b0c3a7696e2042696c6d656e697a20476572656b656e6c657221f09f92a12e6d7034, 'E-Ticaret Yapmak için Neler Gerekli ?', 'Günümüz çağında E-Ticaret çok önemli bir yere sahip peki E-ticaret yapmak için nelere ihtiyacımız var ?', '2024-05-29 19:14:43', 'E-Ticaret', 'O', 0x75706c6f6164732f6574696361726574322e6a7067, 2500),
(58, 33, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f452d746963617265742028456c656b74726f6e696b20546963617265742029204e656469725f20452d74696361726574696e2054616ec4b16dc4b1202831292e6d7034, 'E-Ticaret Nedir?', 'E-ticaret işine giriş yaparken bilinmesi gereken temel unsurlar neler? Hangi lisanslara ihtiyacınız var, nasıl bir ekip kurmalısınız? Hepsini anlatıyoruz. ', '2024-05-29 19:16:17', 'E-Ticaret', 'O', 0x75706c6f6164732f6574696361726574332e6a7067, 3000),
(59, 33, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f5f59617ac4b16cc4b16d20c3b6c49f72656e6d656e696e2074656b20796f6c752e2e2e5f202d2047656f72676520486f747a2e6d7034, 'Yazılım öğrenmenin tek yolu', 'Günümüzün En önemli etkenlerinden olan yazılımı öğrenmek ne kadar zor ? tabii ki göründüğü gibi zor değil ve bu dersimizde size bunlardan bahsedeceğiz.', '2024-05-29 19:18:24', 'Yazılım', 'O', 0x75706c6f6164732f79617a696c696d312e6a7067, 5000),
(60, 33, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f5f59617ac4b16cc4b16d20c3b6c49f72656e6d656e696e2074656b20796f6c752e2e2e5f202d2047656f72676520486f747a202831292e6d7034, 'Yazılım öğrenmenin tek yolu...', 'Programlamayı asla \"Programlama öğren\" adında bir video ile öğrenemezsin. Bence programlama öğrenmenin tek yolu, iyi programlama yapabilen eğitmenler.', '2024-05-29 19:21:50', 'Yazılım', 'O', 0x75706c6f6164732f79617a696c696d322e6a7067, 3000),
(61, 33, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f59617ac4b16cc4b16d63c4b1204164616d20c4b0c59f73697a204b616cc4b172204dc4b15f205f20566964656f79756e2e6d7034, 'Yazılımcı Adam İşsiz Kalır Mı? ', 'Video Batuhan Bozkan adlı Bilgisayar Mühendisinden videonun konusu \"Bilgisayar Mühendisi Adam İşsiz Kalır Mı?\"', '2024-05-29 19:23:41', 'Yazılım', 'O', 0x75706c6f6164732f79617a696c696d332e6a7067, 2000),
(62, 33, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f452d746963617265742028456c656b74726f6e696b20546963617265742029204e656469725f20452d74696361726574696e2054616ec4b16dc4b1202831292e6d7034, 'Elektrik-Elektronik Bölümü', 'Elektrik-Elektronik Bölümü kolaymı ?', '2024-05-29 19:29:14', 'Elektronik', 'O', 0x75706c6f6164732f656c656b726f6e696b312e6a7067, 1250),
(64, 33, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f454c454b54524f4e494b2054454b4e4f4c4f4a49534920424f4c554d55204655524b414e2059414743492e6d7034, 'ELEKTRONIK TEKNOLOJISI BOLUMU FURKAN YAGCI', 'ELEKTRONIK TEKNOLOJISI BOLUMU FURKAN YAGCI', '2024-05-29 19:33:21', 'Elektronik', 'O', 0x75706c6f6164732f656c656b74726f6e696b332e6a7067, 2500),
(65, 33, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f5975727464c4b1c59fc4b12044696c2045c49f6974696d692e6d7034, 'Yurtdışı Dil Eğitimi', 'Merhaba arkadaşlar,\r\nYÖKDİL, IELTS, TOEFL gibi sınavlara hazırlanan arkadaşlar; İngiltere, Amerika, Kanada gibi resmi dilin İngilizce olduğu yerlerde eğitim aldığınızda “İngilizce öğreniyorum” demek nasıl bir şeymiş göreceksiniz.', '2024-05-29 19:38:47', 'Dil Eğitimi', 'O', 0x75706c6f6164732f64696c2065c49f6974696d69312e6a7067, 750),
(66, 33, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f5975727464c4b1c59fc4b12044696c2045c49f6974696d69202831292e6d7034, 'Dİl Öğren', 'Onlarca dil okulu arasından bireysel olarak tercih yapmakta zorlanırsanız Draft Yurtdışı Eğitim’den profesyonel destek alabilirsiniz. K', '2024-05-29 19:47:43', 'Dil Eğitimi', 'O', 0x75706c6f6164732f64696c2065c49f6974696d69322e6a7067, 750),
(67, 33, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f4e6564656e205975727464c4b173cca7c4b16e64612044696c204567cc866974696d695f2e6d7034, 'Neden Yurtdışında Dil Eğitimi?', 'Yurtdışında dil okulları, üniversite, sertifika, yaz okulu ve lise değişim programları için ücretsiz yurtdışı eğitim danışmanlığı.', '2024-05-29 19:48:56', 'Dil Eğitimi', 'O', 0x75706c6f6164732f64696c2065c49f6974696d69332e77656270, 1250),
(68, 33, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f45746b696c6920c4b06c657469c59f696d696e2050c3bc66204e6f6b74616c6172c4b12e6d7034, 'Etkili İletişimin Püf Noktaları', 'İletişim, ilk insandan itibaren günümüze şekil değiştirerek, gelişerek ve başka türler kazanarak gelmiştir. Etkili bir iletişim sağlıklı ilişkiler için gerekmektedir. Fakat bu komplike kendini ifade ediş sisteminde, yanlış ifadeler de kaçınılmaz bir şekilde büyük yer kaplar. Bu bariyerleri ortadan kaldırabilmek için bu eğitim, karşılıklı etkili bir iletişim sağlanması konusunda güçlü ipuçları vererek İletişimi tüm yönleriyle ele alıyor.', '2024-05-29 19:52:04', 'İletişim Becerileri', 'O', 0x75706c6f6164732f696c65746973696d312e61766966, 1500),
(69, 33, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f45746b696c6920c4b06c657469c59f696d20204265636572696c6572692e6d7034, 'Etkili İletişim Becerileri', 'İlkokul öğrencilerine yönelik etkili iletişim sunumu.\r\nYaşamımız boyunca insanlarla iletişim halinde olmak durumundayız.', '2024-05-29 19:55:06', 'İletişim Becerileri', 'O', 0x75706c6f6164732f696c65746973696d322e6a7067, 250),
(70, 33, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f45746b696c6920c4b06c657469c59f696d204265636572696c65726920766520596170c4b16c616e20486174616c61722045c49f6974696d69202d2054616ec4b174c4b16d20566964656f73752e6d7034, 'Etkili İletişim Becerileri ve Yapılan Hatalar Eğitimi', 'Hayatın kaynağı iletişim kurabilmektir ve her insan bir başkası tarafından anlaşılmayı, iletişimi sayesinde de saygı görebilmeyi ve herkes tarafından dinlenmeyi ister. Ancak bu istek başkalarının yaşamı, kültürü, eğitimi, anlama biçimi göz önünde bulundurulmadığında hatalı iletişim ortaya çıkar. Bunun önüne geçebilmenin bazı yöntemleri elbette ki var. ', '2024-05-29 19:55:56', 'İletişim Becerileri', 'O', 0x75706c6f6164732f696c657469c59f696d332e77656270, 1600),
(71, 38, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f452d746963617265742028456c656b74726f6e696b20546963617265742029204e656469725f20452d74696361726574696e2054616ec4b16dc4b1202832292e6d7034, 'E-TİCARET', 'E-TİCARET internetten asatışa son adım', '2024-05-30 02:01:15', 'E-Ticaret', 'O', 0x75706c6f6164732f6574696361726574332e6a7067, 1000),
(72, 44, 0x433a2f78616d70702f6874646f63732f6d616d6970726f6a65732f6564756c61622f766964656f6c61722f452d746963617265742028456c656b74726f6e696b20546963617265742029204e656469725f20452d74696361726574696e2054616ec4b16dc4b1202832292e6d7034, 'deneme', 'deneme', '2024-05-30 13:57:35', 'Yazılım', 'R', 0x75706c6f6164732f79617a696c696d332e6a7067, 1000);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kullanici_adi` (`kullanici_adi`);

--
-- Tablo için indeksler `satinalim`
--
ALTER TABLE `satinalim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_satinalim` (`id`),
  ADD KEY `idx_videoid` (`video_id`),
  ADD KEY `idx_userid` (`user_id`);

--
-- Tablo için indeksler `videolar`
--
ALTER TABLE `videolar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videoindex` (`user`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `satinalim`
--
ALTER TABLE `satinalim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Tablo için AUTO_INCREMENT değeri `videolar`
--
ALTER TABLE `videolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `satinalim`
--
ALTER TABLE `satinalim`
  ADD CONSTRAINT `satinalim_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videolar` (`id`),
  ADD CONSTRAINT `satinalim_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `kullanicilar` (`id`);

--
-- Tablo kısıtlamaları `videolar`
--
ALTER TABLE `videolar`
  ADD CONSTRAINT `videolar_ibfk_1` FOREIGN KEY (`user`) REFERENCES `kullanicilar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
