<?php
include "lib/baglanti.php"; // Veritabanı bağlantısı
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Yükle</title>
    <link rel="stylesheet" href="style/video.css">
   
</head>
<body>





    <h2>Video Yükle</h2>
    <form method="POST" enctype="multipart/form-data" >
        <label for="title">Video Başlığı:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="description">Açıklama:</label>
        <textarea id="description" name="description" rows="4" required></textarea><br><br>
        <label for="kategori">Kategori:</label>
        <select name="kategori" id="kategori" required>
            <option value="">Kategori Seçiniz</option>
            <option value="Yazılım">Yazılım</option>
            <option value="Elektronik">Elektronik</option>
            <option value="E-Ticaret">E-Ticaret</option>
            <option value="Dil Eğitimi">Dil Eğitimi</option>
            <option value="İletişim Becerileri">İletişim Becerileri</option>
        </select><br><br>
        <label for="video_file">Video :</label>
        <input type="file" id="video_file" name="video" accept="video/*" required><br><br>
        <label for="video_file">Kapak Fotoğrafı</label>
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        <label for="title">Videonun Fiyatı:</label>
        <input type="text" id="title" name="fiyat" required><br><br>
        <button type="submit" name="submit">Videoyu Yükle</button>
    </form>

    <?php 
    if ($conn->connect_error) {
        die("Veritabanına bağlanılamadı: " . $conn->connect_error);
    }

    // Video dosyasını yükleme
    if (isset($_POST["submit"])) {
        session_start(); // Oturum başlatma, user id'yi almak için gerekli
        $id = $_SESSION['userid']; // Kullanıcı kimliğini oturumdan alma
        $kategori = $_POST['kategori'];
        $videobasligi = $_POST["title"];
        $fiyat = $_POST["fiyat"];
        $videoaciklama = $_POST["description"];
        $videoDosyasi = $_FILES["video"]["name"];
        $videoDosyasiGecici = $_FILES["video"]["tmp_name"];
                $file_name = $_FILES['fileToUpload']['name'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_error = $_FILES['fileToUpload']['error'];
        $hedefKlasor = "C:/xampp/htdocs/mamiprojes/edulab/videolar/"; // Yüklenen videoların saklanacağı klasör
        $hedefYol = $hedefKlasor . $videoDosyasi;

        // Videoyu sunucuya kaydetme
        if (move_uploaded_file($videoDosyasiGecici, $hedefYol)) {

            if($file_error === 0){
                $file_path = 'uploads/' . $file_name; // Dosyanın kaydedileceği yol
                if(move_uploaded_file($file_tmp, $file_path)){
                    // Dosya yolu veritabanına kaydet
            // Veritabanına dosya yolunu ekleme
            $sql = "INSERT INTO videolar (user, video, baslik, aciklama, kategori, videookapak,fiyat) VALUES ('$id', '$hedefYol', '$videobasligi', '$videoaciklama', '$kategori','$file_path',$fiyat)";
            if ($conn->query($sql) === TRUE) {
                echo "Video başarıyla yüklendi.";
            } else {
                echo "Hata: " . $sql . "<br>" . $conn->error;
            }
        } 
        } 
    }
        
        
        else {
            echo "Dosya yükleme hatası.";
        }
    
        
    }


    // Veritabanı bağlantısını kapatma
    $conn->close();
    ?>

</body>
</html>