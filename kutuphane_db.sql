-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Nis 2026, 20:14:06
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kutuphane_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE `kitaplar` (
  `id` int(11) NOT NULL,
  `kitap_adi` varchar(255) NOT NULL,
  `yazar_adi` varchar(255) NOT NULL,
  `tur` varchar(100) DEFAULT NULL,
  `durum` varchar(50) DEFAULT 'Mevcut'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `kitap_adi`, `yazar_adi`, `tur`, `durum`) VALUES
(2, 'Sefiller', 'Victor Hugo', 'Klasik', 'Ödünç Verildi'),
(3, 'Çalıkuşu', 'Reşat Nuri Güntekin', 'Roman', 'Mevcut'),
(4, 'Suç ve Ceza', 'Fyodor Dostoyevski', 'Klasik', 'Mevcut'),
(5, 'Nutuk', 'Mustafa Kemal Atatürk', 'Tarih', 'Mevcut'),
(6, 'Nutuk', 'Mustafa Kemal Atatürk', 'Tarih', 'Mevcut'),
(7, 'Nutuk', 'Mustafa Kemal Atatürk', 'Tarih', 'Mevcut'),
(8, 'Sefiller', 'Victor Hugo', 'Roman', 'Mevcut'),
(9, 'Sefiller', 'Victor Hugo', 'Roman', 'Mevcut'),
(10, 'Sefiller', 'Victor Hugo', 'Roman', 'Mevcut'),
(11, 'Suç ve Ceza', 'Dostoyevski', 'Roman', 'Mevcut'),
(12, 'Suç ve Ceza', 'Dostoyevski', 'Roman', 'Mevcut'),
(13, 'Suç ve Ceza', 'Dostoyevski', 'Roman', 'Mevcut'),
(14, 'Çalıkuşu', 'Reşat Nuri Güntekin', 'Roman', 'Mevcut'),
(15, 'Çalıkuşu', 'Reşat Nuri Güntekin', 'Roman', 'Mevcut'),
(16, 'Çalıkuşu', 'Reşat Nuri Güntekin', 'Roman', 'Mevcut'),
(17, '1984', 'George Orwell', 'Roman', 'Mevcut'),
(18, '1984', 'George Orwell', 'Roman', 'Mevcut'),
(19, '1984', 'George Orwell', 'Roman', 'Mevcut'),
(20, 'Simyacı', 'Paulo Coelho', 'Roman', 'Mevcut'),
(21, 'Simyacı', 'Paulo Coelho', 'Roman', 'Mevcut'),
(22, 'Simyacı', 'Paulo Coelho', 'Roman', 'Mevcut'),
(23, 'Kuyucaklı Yusuf', 'Sabahattin Ali', 'Roman', 'Mevcut'),
(24, 'Kürk Mantolu Madonna', 'Sabahattin Ali', 'Roman', 'Mevcut'),
(25, 'İçimizdeki Şeytan', 'Sabahattin Ali', 'Roman', 'Mevcut'),
(26, 'Hayvan Çiftliği', 'George Orwell', 'Edebiyat', 'Mevcut'),
(27, 'Fahrenheit 451', 'Ray Bradbury', 'Bilim Kurgu', 'Mevcut'),
(28, 'Cesur Yeni Dünya', 'Aldous Huxley', 'Roman', 'Mevcut'),
(29, 'Yüz Yıllık Yalnızlık', 'Gabriel Garcia Marquez', 'Roman', 'Mevcut'),
(30, 'Kırmızı ve Siyah', 'Stendhal', 'Roman', 'Mevcut'),
(31, 'Vadideki Zambak', 'Balzac', 'Roman', 'Mevcut'),
(32, 'Madame Bovary', 'Gustave Flaubert', 'Roman', 'Mevcut'),
(33, 'Don Kişot', 'Cervantes', 'Edebiyat', 'Mevcut'),
(34, 'İlahi Komedya', 'Dante', 'Edebiyat', 'Mevcut'),
(35, 'Faust', 'Goethe', 'Edebiyat', 'Mevcut'),
(36, 'Savaş ve Barış', 'Tolstoy', 'Roman', 'Mevcut'),
(37, 'Anna Karenina', 'Tolstoy', 'Roman', 'Mevcut'),
(38, 'İnsan Ne İle Yaşar', 'Tolstoy', 'Felsefe', 'Mevcut'),
(39, 'Karamazov Kardeşler', 'Dostoyevski', 'Roman', 'Mevcut'),
(40, 'Budala', 'Dostoyevski', 'Roman', 'Mevcut'),
(41, 'Yeraltından Notlar', 'Dostoyevski', 'Roman', 'Mevcut'),
(42, 'Ölü Canlar', 'Gogol', 'Roman', 'Mevcut'),
(43, 'Babalar ve Oğullar', 'Turgenyev', 'Roman', 'Mevcut'),
(44, 'Dönüşüm', 'Franz Kafka', 'Edebiyat', 'Mevcut'),
(45, 'Dava', 'Franz Kafka', 'Roman', 'Mevcut'),
(46, 'Şato', 'Franz Kafka', 'Roman', 'Mevcut'),
(47, 'Satranç', 'Stefan Zweig', 'Roman', 'Mevcut'),
(48, 'Amok Koşucusu', 'Stefan Zweig', 'Roman', 'Mevcut'),
(49, 'Olağanüstü Bir Gece', 'Stefan Zweig', 'Roman', 'Mevcut'),
(50, 'Bilinmeyen Bir Kadının Mektubu', 'Stefan Zweig', 'Roman', 'Mevcut'),
(51, 'Momo', 'Michael Ende', 'Edebiyat', 'Mevcut'),
(52, 'Küçük Prens', 'Antoine de Saint-Exupéry', 'Edebiyat', 'Mevcut'),
(53, 'Simyacı', 'Paulo Coelho', 'Roman', 'Mevcut'),
(54, 'On Küçük Zenci', 'Agatha Christie', 'Polisiye', 'Mevcut'),
(55, 'Doğu Ekspresinde Cinayet', 'Agatha Christie', 'Polisiye', 'Mevcut'),
(56, 'Sherlock Holmes: Akıl Oyunlarının Gölgesinde', 'Sir Arthur Conan Doyle', 'Polisiye', 'Mevcut'),
(57, 'Dracula', 'Bram Stoker', 'Korku', 'Mevcut'),
(58, 'Frankenstein', 'Mary Shelley', 'Korku', 'Mevcut'),
(59, 'Yüzüklerin Efendisi: Yüzük Kardeşliği', 'J.R.R. Tolkien', 'Fantastik', 'Mevcut'),
(60, 'Hobbit', 'J.R.R. Tolkien', 'Fantastik', 'Mevcut'),
(61, 'Harry Potter ve Felsefe Taşı', 'J.K. Rowling', 'Fantastik', 'Mevcut'),
(62, 'Da Vinci Şifresi', 'Dan Brown', 'Gerilim', 'Mevcut'),
(63, 'Melekler ve Şeytanlar', 'Dan Brown', 'Gerilim', 'Mevcut'),
(64, 'Olasılıksız', 'Adam Fawer', 'Gerilim', 'Mevcut'),
(65, 'Empati', 'Adam Fawer', 'Gerilim', 'Mevcut'),
(66, 'Uçurtma Avcısı', 'Khaled Hosseini', 'Roman', 'Mevcut'),
(67, 'Bin Muhteşem Güneş', 'Khaled Hosseini', 'Roman', 'Mevcut'),
(68, 'İnce Memed 1', 'Yaşar Kemal', 'Roman', 'Mevcut'),
(69, 'İnce Memed 2', 'Yaşar Kemal', 'Roman', 'Mevcut'),
(70, 'Tutunamayanlar', 'Oğuz Atay', 'Edebiyat', 'Mevcut'),
(71, 'Tehlikeli Oyunlar', 'Oğuz Atay', 'Edebiyat', 'Mevcut'),
(72, 'Eylül', 'Mehmet Rauf', 'Roman', 'Mevcut'),
(73, 'Aşk-ı Memnu', 'Halid Ziya Uşaklıgil', 'Roman', 'Mevcut'),
(74, 'Mai ve Siyah', 'Halid Ziya Uşaklıgil', 'Roman', 'Mevcut'),
(75, 'Araba Sevdası', 'Recaizade Mahmut Ekrem', 'Roman', 'Mevcut'),
(76, 'Taaşşuk-ı Talat ve Fitnat', 'Şemsettin Sami', 'Roman', 'Mevcut'),
(77, 'Dokuzuncu Hariciye Koğuşu', 'Peyami Safa', 'Roman', 'Mevcut'),
(78, 'Fatih-Harbiye', 'Peyami Safa', 'Roman', 'Mevcut'),
(79, 'Yaban', 'Yakup Kadri Karaosmanoğlu', 'Roman', 'Mevcut'),
(80, 'Kiralık Konak', 'Yakup Kadri Karaosmanoğlu', 'Roman', 'Mevcut'),
(81, 'Sodom ve Gomore', 'Yakup Kadri Karaosmanoğlu', 'Roman', 'Mevcut'),
(82, 'Anayurt Oteli', 'Yusuf Atılgan', 'Roman', 'Mevcut'),
(83, 'Aylak Adam', 'Yusuf Atılgan', 'Roman', 'Mevcut'),
(84, 'Saatleri Ayarlama Enstitüsü', 'Ahmet Hamdi Tanpınar', 'Edebiyat', 'Mevcut'),
(85, 'Huzur', 'Ahmet Hamdi Tanpınar', 'Edebiyat', 'Mevcut'),
(86, 'Beş Şehir', 'Ahmet Hamdi Tanpınar', 'Tarih', 'Mevcut'),
(87, 'Devlet Ana', 'Kemal Tahir', 'Tarih', 'Mevcut'),
(88, 'Yorgun Savaşçı', 'Kemal Tahir', 'Tarih', 'Mevcut'),
(89, 'Şu Çılgın Türkler', 'Turgut Özakman', 'Tarih', 'Mevcut'),
(90, 'Diriliş', 'Turgut Özakman', 'Tarih', 'Mevcut'),
(91, 'Cumhuriyet', 'Turgut Özakman', 'Tarih', 'Mevcut'),
(92, 'Kozmos', 'Carl Sagan', 'Bilim', 'Mevcut'),
(93, 'Sapiens', 'Yuval Noah Harari', 'Bilim', 'Mevcut'),
(94, 'Homo Deus', 'Yuval Noah Harari', 'Bilim', 'Mevcut'),
(95, 'Zamanın Kısa Tarihi', 'Stephen Hawking', 'Bilim', 'Mevcut'),
(96, 'Büyük Tasarım', 'Stephen Hawking', 'Bilim', 'Mevcut'),
(97, 'Gençlerle Baş Başa: Yapay Zeka', 'Kolektif', 'Bilim', 'Mevcut'),
(98, 'Semerkant', 'Amin Maalouf', 'Roman', 'Mevcut'),
(99, 'Afrikalı Leo', 'Amin Maalouf', 'Roman', 'Mevcut'),
(100, 'Doğunun Limanları', 'Amin Maalouf', 'Roman', 'Mevcut'),
(101, 'Beyaz Kale', 'Orhan Pamuk', 'Edebiyat', 'Mevcut'),
(102, 'Benim Adım Kırmızı', 'Orhan Pamuk', 'Roman', 'Mevcut'),
(103, 'Kara Kitap', 'Orhan Pamuk', 'Roman', 'Mevcut'),
(104, 'Masumiyet Müzesi', 'Orhan Pamuk', 'Roman', 'Mevcut'),
(105, 'İstanbullu Gelin', 'Gülseren Budayıcıoğlu', 'Roman', 'Mevcut'),
(106, 'Camdaki Kız', 'Gülseren Budayıcıoğlu', 'Roman', 'Mevcut'),
(107, 'Kardeşimin Hikayesi', 'Zülfü Livaneli', 'Roman', 'Mevcut'),
(108, 'Serenad', 'Zülfü Livaneli', 'Roman', 'Mevcut'),
(109, 'Mutluluk', 'Zülfü Livaneli', 'Roman', 'Mevcut'),
(110, 'Konstantiniyye Oteli', 'Zülfü Livaneli', 'Roman', 'Mevcut'),
(111, 'Od', 'İskender Pala', 'Edebiyat', 'Mevcut'),
(112, 'Babil’de Ölüm İstanbul’da Aşk', 'İskender Pala', 'Edebiyat', 'Mevcut'),
(113, 'Şah ve Sultan', 'İskender Pala', 'Edebiyat', 'Mevcut'),
(114, 'Leyla ile Mecnun', 'Burak Aksak', 'Edebiyat', 'Mevcut'),
(115, 'Kafamda Bir Tuhaflık', 'Orhan Pamuk', 'Roman', 'Mevcut'),
(116, 'Veba Geceleri', 'Orhan Pamuk', 'Roman', 'Mevcut'),
(117, 'Gece Yarısı Kütüphanesi', 'Matt Haig', 'Roman', 'Mevcut'),
(118, 'Zamanı Durdurmanın Yolları', 'Matt Haig', 'Roman', 'Mevcut'),
(119, 'İnsanlar', 'Matt Haig', 'Roman', 'Mevcut'),
(120, 'Kiraz Mevsimi', 'Kolektif', 'Roman', 'Mevcut'),
(121, 'Gülün Adı', 'Umberto Eco', 'Roman', 'Mevcut'),
(122, 'Foucault Sarkacı', 'Umberto Eco', 'Roman', 'Mevcut'),
(123, 'Sofie’nin Dünyası', 'Jostein Gaarder', 'Felsefe', 'Mevcut'),
(124, 'Böyle Buyurdu Zerdüşt', 'Nietzsche', 'Felsefe', 'Mevcut'),
(125, 'Devlet', 'Platon', 'Felsefe', 'Mevcut'),
(126, 'Ütopya', 'Thomas More', 'Felsefe', 'Mevcut'),
(127, 'Prens', 'Machiavelli', 'Felsefe', 'Mevcut'),
(128, 'Toplum Sözleşmesi', 'Rousseau', 'Felsefe', 'Mevcut'),
(129, 'Türlerin Kökeni', 'Charles Darwin', 'Bilim', 'Mevcut'),
(130, 'İzafiyet Teorisi', 'Albert Einstein', 'Bilim', 'Mevcut'),
(131, 'Yabancı', 'Albert Camus', 'Roman', 'Mevcut'),
(132, 'Veba', 'Albert Camus', 'Roman', 'Mevcut'),
(133, 'Sisifos Söyleni', 'Albert Camus', 'Felsefe', 'Mevcut'),
(134, 'Körlük', 'Jose Saramago', 'Roman', 'Mevcut'),
(135, 'Görmek', 'Jose Saramago', 'Roman', 'Mevcut'),
(136, 'Bülbülü Öldürmek', 'Harper Lee', 'Roman', 'Mevcut'),
(137, 'Muhteşem Gatsby', 'F. Scott Fitzgerald', 'Roman', 'Mevcut'),
(138, 'Gazap Üzümleri', 'John Steinbeck', 'Roman', 'Mevcut'),
(139, 'Fareler ve İnsanlar', 'John Steinbeck', 'Roman', 'Mevcut'),
(140, 'İnci', 'John Steinbeck', 'Roman', 'Mevcut'),
(141, 'Yaşlı Adam ve Deniz', 'Ernest Hemingway', 'Roman', 'Mevcut'),
(142, 'Çanlar Kimin İçin Çalıyor', 'Ernest Hemingway', 'Roman', 'Mevcut'),
(143, 'Silahlara Veda', 'Ernest Hemingway', 'Roman', 'Mevcut'),
(144, 'Sineklerin Tanrısı', 'William Golding', 'Roman', 'Mevcut'),
(145, 'Çavdar Tarlasında Çocuklar', 'J.D. Salinger', 'Roman', 'Mevcut'),
(146, 'Moby Dick', 'Herman Melville', 'Roman', 'Mevcut'),
(147, 'Oliver Twist', 'Charles Dickens', 'Roman', 'Mevcut'),
(148, 'İki Şehrin Hikayesi', 'Charles Dickens', 'Roman', 'Mevcut'),
(150, 'Robinson Crusoe', 'Daniel Defoe', 'Roman', 'Mevcut'),
(151, 'Gulliver’in Gezileri', 'Jonathan Swift', 'Roman', 'Mevcut'),
(152, 'Görünmez Kentler', 'Italo Calvino', 'Roman', 'Mevcut');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odunc`
--

CREATE TABLE `odunc` (
  `id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `kitap_id` int(11) NOT NULL,
  `verilis_tarihi` date NOT NULL,
  `iade_tarihi` date NOT NULL,
  `durum` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `odunc`
--

INSERT INTO `odunc` (`id`, `uye_id`, `kitap_id`, `verilis_tarihi`, `iade_tarihi`, `durum`) VALUES
(1, 1, 2, '2026-04-23', '2026-04-23', 0),
(2, 3, 3, '2026-04-23', '2026-04-23', 0),
(3, 2, 2, '2026-04-23', '2026-04-22', 0),
(4, 1, 3, '2026-04-23', '2026-04-20', 1),
(5, 4, 75, '2026-04-23', '2026-05-23', 0),
(6, 5, 99, '2026-04-23', '2026-05-30', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(100) NOT NULL,
  `telefon` varchar(15) DEFAULT NULL,
  `eposta` varchar(100) DEFAULT NULL,
  `kayit_tarihi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `ad_soyad`, `telefon`, `eposta`, `kayit_tarihi`) VALUES
(1, 'Merve KARA', '0531 695 35 13', 'aysemerve4343@gmail.com', '2026-04-23 16:21:19'),
(2, 'Kasım KARA', '0533 339 67 45', 'kasimkara401@gmail.com', '2026-04-23 16:58:55'),
(3, 'Sude KAYA', '0532 321 12 34', 'sudekaya34@gmail.com', '2026-04-23 18:18:27'),
(4, 'Dila YILMAZ', '0598 789 12 47', 'dilayilmaz@gmail.com', '2026-04-23 18:52:15'),
(5, 'Deniz DUMAN', '05684567896', 'denizduman@gmail.com', '2026-04-23 19:09:00'),
(6, 'Zülal AKIN', '05785568656', 'zulalakin@gmail.com', '2026-04-23 19:36:58');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `odunc`
--
ALTER TABLE `odunc`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- Tablo için AUTO_INCREMENT değeri `odunc`
--
ALTER TABLE `odunc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
