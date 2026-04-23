<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../style/styless.css">
</head>
<body>
  <div class="login-container">
    <div class="logo">
      <img src="https://png.pngtree.com/png-clipart/20230124/original/pngtree-elegant-m-letter-logo-png-image_8928765.png" alt="Udemy Logo">
    </div>
    <h2>********** HOŞGELDİN ! *********</h2>
    
    <form action="#" method="POST">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Şifre</label>
        <input type="password" name="password" required>
      </div>
      <button type="submit" name="giris">Giriş yap </button>
    </form>
    <p class="signup-link">Hala Üye Değil Misin ? <a href="kayıt.php">Üye Ol</a></p>
  </div>
</body>
</html>

<?php
include "../lib/baglanti.php"; // Veritabanı bağlantısı

if (isset($_POST["giris"])) {
    $kullanicimail = $_POST["email"];
    $kullanicipass = $_POST["password"];

    // Kullanıcıyı veritabanında arama
    $stmt = $conn->prepare("SELECT id, kullanici_adi, parola,yetki FROM kullanicilar WHERE email = ?");
    $stmt->bind_param("s", $kullanicimail);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $kullaniciadi, $hashedPassword,$yetki);
        $stmt->fetch();

        if ($kullanicipass==$hashedPassword && $yetki=="admin") {
           
            session_start();
            $_SESSION['userid'] = $id;
            $_SESSION['username'] = $kullaniciadi;
            header("Location: panel.php"); // Başarılı giriş sonrası yönlendirme
            exit();
        } else if($kullanicipass==$hashedPassword){
            echo "panele girmek için yetkiniz yok.";

        }else{
            echo "Yanlış parola. Lütfen tekrar deneyin.";
        }
    } else {
        echo "Bu e-posta ile kayıtlı bir kullanıcı bulunamadı.";
    }

    // İfade ve bağlantıyı kapat
    $stmt->close();
    $conn->close();
}
?>