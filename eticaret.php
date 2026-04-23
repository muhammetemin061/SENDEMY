<?php include "lib/baglanti.php";
session_start();
$_SESSION['page']="eticaret";
?>


<!DOCTYPE html>
<html lang="tr">
<head>
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

</head>
<body>
	<div id="page" class="site" itemscope itemtype="http://schema.org/LocalBusiness">

	<?php include("lib/navbar.php");?>  <!-- navbar çağırma -->
		<!-- Header Close -->
		<div class="banner">
			<div class="owl-four owl-carousel" itemprop="image">
				
				<img src="images/pexels-olly-3756679.jpg" alt="Image of Bannner" >
				<img src="images/pexels-jibarofoto-3695354.jpg" alt="Image of Bannner">
				<img src="images/pexels-august-de-richelieu-4261790.jpg" alt="Image of Bannner">
				<img src="images/pexels-fauxels-3184436.jpg" alt="Image of Bannner">
			</div>
			<div class="container" itemprop="description">
				<h1 style="letter-spacing:10px; font-size:60px;" > 		<?php   if(isset($_SESSION['oturum']) && $_SESSION['oturum'] == "acik")echo "Hoşgeldin Sayın 	".$_SESSION['username'];
				else echo'SENDEMY \' E   HOŞGELDİN ';
				?></h1>
			</div>
			
			 <div id="owl-four-nav" class="owl-nav"></div>   <!--carousel -->
		</div>
		<div class="page-heading">
			<div class="container">
			
				<h2 style="font-family: Bebas Neue, sans-serif;
	font-weight:bolder;
	font-style:normal; font-size:7vh; color: #a200bb ">E-ticaret Kursları </h2>
			</div>
		</div>
		<!-- Popular courses End -->
		<div class="learn-courses">
			<div class="container">
				<div class="courses">
					<div class="owl-one owl-carousel">


					<?php 
$onay = "O";
$kategori = "E-Ticaret";
$user_id = $_SESSION['userid']; // Oturumda bulunan kullanıcının ID'si, örneğin $_SESSION['user_id']

$stmt = $conn->prepare("SELECT v.id, v.user, v.baslik, v.aciklama, v.videookapak, v.fiyat FROM videolar v
                        LEFT JOIN satinalim s ON v.id = s.video_id AND s.user_id = ?
                        WHERE v.onay = ? AND s.id IS NULL AND v.kategori = ?");
$stmt->bind_param("sss", $user_id, $onay, $kategori);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($vid, $user, $baslik, $aciklama, $resimyolu, $fiyat);

while ($stmt->fetch()) {
    echo '<form action="videobilgiler.php" method="GET">';
    echo '    <div class="box-wrap" itemprop="event" itemscope itemtype="http://schema.org/Course">';
    echo '        <div class="img-wrap" itemprop="image"><img src="' . $resimyolu . '" alt="courses picture"></div>';

    if(isset($_SESSION['oturum']) && $_SESSION['oturum'] == "acik") { 
        echo '        <input type="submit" class="learn-desining-banner" name="'.$vid.'" value="Eğitimi İncele">'; 
    } else {
        echo '        <a href="login.php" class="learn-desining-banner" itemprop="name">Eğitimi İncele</a>'; 
    }
    
    echo '        <div class="box-body" itemprop="description">';
    echo '            <p>' . $baslik . '</p>';
    echo '            <section itemprop="time">';
    echo '                <p>' . $aciklama . '</p>';
    echo '                <p>' . $fiyat . ' TL' . '</p>';
    echo '            </section>';
    echo '        </div>';
    echo '    </div>';
    echo '</form>';
}
?>
		
					</div>
				</div>
			</div>
		</div>
		<!-- Learn courses End -->
		
		<footer class="page-footer" itemprop="footer" itemscope itemtype="http://schema.org/WPFooter">
			<div class="footer-first-section">
			<br><br>
			</div>
			<!-- End of box-Wrap -->
			<div class="footer-second-section">
				<div class="container">
					<hr class="footer-line">
					<ul class="social-list">
						<li><a href=""><i class="fab fa-facebook-square"></i></a></li>
						<li><a href=""><i class="fab fa-twitter"></i></a></li>
						<li><a href=""><i class="fab fa-skype"></i></a></li>
						<li><a href=""><i class="fab fa-youtube"></i></a></li>
						<li><a href=""><i class="fab fa-instagram"></i></a></li>
					</ul>
					<hr class="footer-line">
				</div>
			</div>
			<div class="footer-last-section">
				<div class="container">
					<p>Copyright 2018 &copy; educationpro.com <span> | </span> Theme designed and developed by <a href="https://labtheme.com">Lab Theme</a></p>
				</div>
			</div>
		</footer>
	</div>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/lightbox.js"></script>
	<script type="text/javascript" src="js/all.js"></script>
	<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider.js"></script>
	<script type="text/javascript" src="js/jquery.rateyo.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	
</body>
</html>