<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videolar - SENDEMY</title>
    <?php include("lib/navbar.php");?> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
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
            background-color: white;
            color: #000000;
            font-family: Arial, sans-serif;
        }
        .video-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }
        .video-container video {
            width: 100%;
            height: auto;
            border: 2px solid #800080;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .card-body {
            background-color: #000000;
            border: 2px solid #800080;
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
            height: 40vh;   
        }
        .card-title {
            color: #ff00ff;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .card-text {
            color: #d3d3d3;
            font-size: 16px;
        }
        button {
            width: 20vh;
            height: 8vh;
            font-size: 30px;
            margin-top: 10px;
        }
        .success-message {
            color: #00ff00;
            font-size: 20px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
<?php
session_start();
$_SESSION['page'] = "videobilgi";
include "lib/baglanti.php"; // Veritabanı bağlantısını sağlayan dosya

$successMessage = "";

if (!empty($_GET)) {
    foreach ($_GET as $parametre => $deger) {
        // Veritabanı sorgusunu hazırlayın
        $stmt = $conn->prepare("SELECT user, video, baslik, aciklama, videookapak FROM videolar WHERE id = ?");
        $stmt->bind_param("s", $parametre);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user, $video, $baslik, $aciklama, $resimyolu);
            while ($stmt->fetch()) {
                $videoAdi = basename(htmlspecialchars($video));
                ?>
                <div class="video-container">
                    <video src="videolar/<?php echo $videoAdi;?>" id="myVideo" width="720" height="480" controls></video>
                </div>
                <div class="card-body">
                    <?php if ($successMessage): ?>
                        <div class="success-message"><?php echo $successMessage; ?></div>
                    <?php endif; ?>
                    <form method="POST">
                        <h4 class="card-title"><?php echo htmlspecialchars($baslik); ?></h4>
                        <p class="card-text"><?php echo htmlspecialchars($aciklama); ?></p>
                        <button type="submit" name="deneme" id="buy">Satın Al</button>
                    </form>
                    <?php
                    if (isset($_POST['deneme'])) {
                        $sql = "INSERT INTO satinalim (user_id, video_id) VALUES (?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ss", $_SESSION['userid'], $parametre);

                        if ($stmt->execute()) {
                            $successMessage = "Satın alma işlemi başarılı!";
                            echo "<script>window.location.href='index.php?satinalim=success';</script>";
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

        $stmt->free_result();
        $stmt->close();
    }
} else {
    echo "GET parametresi bulunamadı.";
}

$conn->close();
?>
<script>
    var video = document.getElementById('myVideo');
    video.addEventListener('loadedmetadata', function() {
        this.currentTime = 0;
        this.controls = false;
        this.play();
    });

    video.addEventListener('timeupdate', function() {
        if (this.currentTime >= 10) {
            this.pause();
        }
    });

    document.getElementById('buy').addEventListener('click', function() {
        document.forms[0].submit();
    });
</script>
</body>
</html>
