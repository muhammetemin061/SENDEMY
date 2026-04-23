
<?php include "baglanti.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="../style/styless.css">
</head>
<body>
  <div class="login-container">
    <div class="logo">
      <img src="https://png.pngtree.com/png-clipart/20230124/original/pngtree-elegant-m-letter-logo-png-image_8928765.png" alt="Udemy Logo">
    </div>
    <h2>SENDEMY'e Katıl </h2>
    <form action="#" method="POST">
      <div class="form-group">
        <label for="name">Kullanıcı Adı </label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email"> Email adresi  </label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Bir Şifre Oluşturun </label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" name="uyeol">Üye ol </button>
      
    </form>
    <p class="signup-link">Zaten Bir Hesaba Sahip Misin ? <a href="../login.php">Giriş Yap</a></p>
  </div>
</body>
</html>
<?php


if (isset($_POST["uyeol"])) {
    $kullaniciadi = $_POST["name"];
    $kullanicipass = $_POST["password"];
    $kullanicimail = $_POST["email"];


    // Mevcut kullanıcı adı veya e-posta kontrolü
    $stmt = $conn->prepare("SELECT id FROM kullanicilar WHERE kullanici_adi = ? OR email = ?");
    $stmt->bind_param("ss", $kullaniciadi, $kullanicimail);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Aynı kullanıcı adı veya e-posta varsa hata mesajı göster
        echo "Bu kullanıcı adı veya email zaten kullanılıyor. Lütfen başka bir tane deneyin.";
    } else {
        // Parolayı şifreleme
        $hashedPassword = password_hash($kullanicipass, PASSWORD_DEFAULT);

        // Hazırlanan ifade ile güvenli veri ekleme
        $stmt = $conn->prepare("INSERT INTO kullanicilar (kullanici_adi, email, parola) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $kullaniciadi, $kullanicimail, $hashedPassword);

        if ($stmt->execute()) {
            echo "Kayıt Başarıyla Oluşturuldu";
            header("Location: ../index.php");
            exit(); // Yönlendirme sonrası betiğin çalışmasını durdur
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // İfade ve bağlantıyı kapat
    $stmt->close();
    $conn->close();
}
?>
