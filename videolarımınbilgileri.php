<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videolar</title>
    <?php include("lib/navbar.php");?> 
    <title>SENDEMY</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.css">
	<link rel="stylesheet" type="text/css" href="css/flexslider.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.rateyo.css"/>
	<link rel="stylesheet" type="text/css" href="inner-page-style.css">
	<link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            background-color: white; /* Koyu gri arka plan */
            color: #ffffff; /* Beyaz metin rengi */
            font-family: Arial, sans-serif;
        }

        .video-container {
            width: 100%; /* Genişliği %100 yap */
            max-width: 1200px; /* Maksimum genişlik */
            margin: 0 auto; /* Ortala */
        }

        .video-container video {
            width: 100%; /* Videonun genişliğini %100 yap */
            height: auto; /* Yüksekliği otomatik olarak ayarla */
            border: 2px solid #800080; /* Mor kenarlık */
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .card-body {
            background-color: #800080; 
            border: 2px solid #800080; /* Mor kenarlık */
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;

        }

        .card-title {
            color: #ff00ff; /* Açık mor başlık rengi */
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card-text {
            color: #d3d3d3; /* Açık gri metin rengi */
            font-size: 16px;
        }
    </style>
</head>
<body>

<?php
$_SESSION['page']="videobilgi";
include "lib/baglanti.php"; // Veritabanı bağlantınızı sağlayan dosya
session_start();

if (!empty($_GET)) {
    foreach ($_GET as $parametre => $deger) {
        // Gelen GET parametrelerinin ismini ve değerini yazdırın

        // Veritabanı sorgusunu hazırlayın
        $stmt = $conn->prepare("SELECT user, video, baslik, aciklama, videookapak FROM videolar WHERE id = ?");
        $stmt->bind_param("s", $parametre);
        $stmt->execute();
        $stmt->store_result();

        // Sonuçlar varsa bunları değişkenlere bağlayın
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user, $video, $baslik, $aciklama, $resimyolu);
            while ($stmt->fetch()) {
                $videoAdi = basename(htmlspecialchars($video)); // Sadece dosya adını alıyoruz
                ?>
                <div class="video-container">
                    <video src="videolar/<?php echo $videoAdi;?>" controls="false" id="myVideo" width="720" height="480" controls></video>
                </div>
                <div class="card-body">
                <form method="POST">
    <h4 class="card-title"><?php echo htmlspecialchars($baslik);?></h4>
    <p class="card-text"><?php echo htmlspecialchars($aciklama);?></p>
</form>

<?php 
// Form gönderildi mi diye kontrol ediyoruz
if(isset($_POST['deneme'])){
    $sql = "INSERT INTO satinalim (user_id, video_id) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $parametre);
    
    // Sorguyu çalıştır
    if ($stmt->execute()) {
        header("Location: index.php"); 
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }



}


?>  
                </div>
                <?php   
            }
        } else {
            echo "Sonuç bulunamadı.<br>";
        }

        // Sorgu sonucunu serbest bırakın
        $stmt->free_result();
        $stmt->close();
    }
} else {
    echo "GET parametresi bulunamadı.";
}

$conn->close();
?>
</body>
</html>
