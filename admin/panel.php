 <?php session_start();?>
 <?php 

include "../lib/baglanti.php"; 

if ($conn->connect_error) {
  die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}

// Videoları veritabanından seçme
$sql = "SELECT video FROM videolar";
$result = $conn->query($sql);

// Videoları gösterme
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      $videoYolu = $row["video"];
      $videoAdi = basename($videoYolu); // Sadece dosya adını alıyoruz
      ?>
          <?php

  }
}



$onay ="";
$stmt = $conn->prepare("SELECT id,user,baslik, aciklama FROM videolar WHERE onay = ?");
$stmt->bind_param("s", $onay);
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($vid,$user,$baslik, $aciklama);

// Verileri çekmek için fetch() kullanımı



// Bağlantıyı kapat

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>SENDE'MY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../style/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../style/anasayfanın.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="anasayfanın.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

 


  <div id="text" class="sendemy">
        <br>  SENDEMY ' ye <br> HOŞGELDİN !<br> <?php echo $_SESSION['username']; ?>




        
 </div>
 
 <table class="table">
  <thead>
    <tr>
      <th scope="col">Kullanıcı Adı</th>
      <th scope="col">Kullanıcı Mail</th>
      <th scope="col">Video Başlığı</th>
      <th scope="col">Video Açıklama</th>
      <th scope="col">Video</th>
      <th scope="col">Durumu </th>
    </tr>
  </thead>
  <tbody>
 
  <table>
  <?php 
while ($stmt->fetch()) {
    $stmt2 = $conn->prepare("SELECT kullanici_adi, email FROM kullanicilar WHERE id = ?");
    $stmt2->bind_param("i", $user);
    $stmt2->execute();
    $stmt2->store_result();
    $stmt2->bind_result($kadi, $kmail);
    $stmt2->fetch();
    echo  "<form method='GET' action='#'>";
    echo "<tr>";
    echo "<td>$kadi</td>";
    echo "<td>$kmail</td>";
    echo "<td>$baslik</td>";
    echo "<td>$aciklama</td>";
    echo "<td><video src='../videolar/$videoAdi' width='320' height='240' controls></video></td>";
    echo "<td>";
    // Butonlara farklı isimler ve değerler vererek tıklanma durumunu belirleyebilirsiniz
    echo "<input type='hidden' name='vid' value='$vid'>"; // Videonun ID'sini gizli bir giriş olarak ekleyin
    echo "<input type='submit' name='onayla_$vid' value='Onayla'>";
    echo "<input type='submit' name='reddet_$vid' value='Reddet'>";
    echo "</td>";
    echo "</tr>";
    echo '</form>';
} 
foreach ($_GET as $key => $value) {
    if (strpos($key, 'onayla_') !== false) {
      $secilen_vid = str_replace('onayla_', '', $key);
      $stmt2 = $conn->prepare("UPDATE videolar SET onay = 'O' WHERE id =?");

      $stmt2->bind_param("s", $secilen_vid); // s: string, i: integer
      if($stmt2->execute()){

        echo "onaylandı";
      }

    }
    if (strpos($key, 'reddet_') !== false) {
      $secilen_vid = str_replace('reddet_', '', $key);
      $stmt2 = $conn->prepare("UPDATE videolar SET onay = 'R' WHERE id =?");

      $stmt2->bind_param("s", $secilen_vid); // s: string, i: integer
      if($stmt2->execute()){

        echo "reddedildi";
      }

    }
}
?>
  </table>1

  </tbody>
</table>

  <!-- Carousel -->
  <!-- Carousel -->
  <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->






  <!--  KARTLAR -->








































  </div>






</div>



</body>

</html>









<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="anasayfanın.css">
  <style>
    #box {
        max-width: 300px;
        position: relative;
        left: 400px;
    }

    #box .fa-search {
        position: absolute;
        top: 14px;
        left: 12px;
        font-size: 20px;
        color: cornflowerblue;
    }

    #search {
        width: 600px;
        box-sizing: border-box;
        border: 2px solid cornflowerblue;
        border-radius: 23px;
        font-size: 18px;
        padding: 12px 20px 12px 40px;
        transition: width 0.4s ease-in-out;
        position: absolute;
    }

    #search:focus {
        width: 100%;
    }
</style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> 
        <form>
          <div id="box">
              <input type="text" id="search" placeholder="Ara..">
              <i class="fa fa-search"></i>
          </div>
      </form>
        
        <li class="nav-item">
          
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>  
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Dropdown</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Link</a></li>
            <li><a class="dropdown-item" href="#">Another link</a></li>
            <li><a class="dropdown-item" href="#">A third link</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


</body>
</html>  -->