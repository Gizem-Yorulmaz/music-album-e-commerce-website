<?php
// Veritabanı bağlantı bilgileri
$host = "localhost";     // Veritabanı sunucusu
$kullanici = "root";     // Veritabanı kullanıcı adı
$parola = "";            // Veritabanı parolası
$vt = "uyelik";          // Veritabanı adı

// Veritabanı bağlantısını kurma
$baglanti = mysqli_connect($host, $kullanici, $parola, $vt);

// Türkçe karakter desteği sağlamak için karakter setini ayarlama
mysqli_set_charset($baglanti, "UTF8");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sepet</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .poppins-semibold {
      font-family: "Poppins", sans-serif;
      font-weight: 800;
      font-style: normal;
    }

    .navbar {
      background-color: #35363a;
      height: 100px;
    }

    .form-center {
      width: 30%;
      margin-left: 0px;
      margin-right: 70px;
      justify-content: flex-end;
      display: flex;
    }

    .navbar .icons {
      display: flex;
      justify-content: flex-end;
      align-items: center;
    }

    .navbar .icons a {
      margin: 0 5px;
    }

    @media (max-width: 992px) {
      .form-center {
        width: auto;
      }
    }

    .nav-item {
      padding-right: 50px;
    }

    .position-relative {
      position: relative;
    }

    .search-image {
      width: 25px;
      height: 25px;
      margin-top: 18px;
      position: absolute;
      right: 20px;
      top: 50%;
      transform: translateY(-50%);
    }

    h3 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      font-weight: 500;
    }


    input.form-control::placeholder {
      color: #aaa;
    }

    button.btn-primary {
      margin-left: 25%;
      width: 50%;
      margin-top: 20px;
    }

    button.btn-primary:hover {
      background-color: #2a9d8f;
      border-color: #2a9d8f;
    }

    .form-check-input {
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <!-- Logo ve anasayfa linki -->
        <a class="navbar-brand" href="anasayfa.php">
          <img src="img2/Çalışma Yüzeyi 1.png" height="100" alt="Logo" loading="lazy" />
        </a>

        <!-- Küçük ekranlar için açılır menü düğmesi -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="metal.php" style="color: #f2f2f2;">METAL</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="thrashalbum.php" style="color: #f2f2f2;">THRASH METAL</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="heavymetal.php" style="color: #f2f2f2;">HEAVY METAL</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="numetal.php" style="color: #f2f2f2;">NU METAL</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="rock.php" style="color: #f2f2f2;">ROCK</a>
            </li>
          </ul>

          <!-- Arama formu -->
          <form class="form-center d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Ara" aria-label="Search">
            <a href="#">
              <div class="position-relative">
                <img src="img2/search-icon.png" alt="Search Image" class="search-image">
              </div>
            </a>
            <button class="btn btn-success" type="submit">Ara</button>
          </form>

          <!-- Sağa hizalanmış ikonlar -->
          <div class="icons">
            <a href="#"><img src="img2/heart-icon.png" alt="" width="40px" height="40px"></a>
            <a href="sepet.php"><img src="img2/basket-icon.png" alt="" width="30px" height="30px"></a>
            <a href="profile.php"><img src="img2/person-icon.png" alt="" width="30px" height="30px"></a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <div class="container">
    <h3>ÖDEMEYİ TAMAMLA</h3>
    <!-- Ödeme formu başlangıcı -->
    <form action="odeme.php" method="POST">
      <!-- Ad input alanı -->
      <div class="mb-3">
        <label for="ad" class="form-label">Adınız</label>
        <input type="text" class="form-control" id="ad" name="ad" placeholder="Adınızı giriniz" required>
      </div>
      <!-- Soyad input alanı -->
      <div class="mb-3">
        <label for="soyad" class="form-label">Soyadınız</label>
        <input type="text" class="form-control" id="soyad" name="soyad" placeholder="Soyadınızı giriniz" required>
      </div>
      <!-- Kredi Kartı Numara input alanı -->
      <div class="mb-3">
        <label for="kartno" class="form-label">Kredi Kartı Numaranız</label>
        <input type="text" class="form-control" id="kartno" name="kartno" placeholder="Kart numaranızı giriniz" required>
      </div>
      <!-- Son Kullanma Tarihi input alanı -->
      <div class="mb-3">
        <label for="sonkullanim" class="form-label">Son Kullanma Tarihi</label>
        <input type="text" class="form-control" id="sonkullanim" name="sonkullanim" placeholder="MM/YY" required>
      </div>
      <!-- CVV input alanı -->
      <div class="mb-3">
        <label for="cvv" class="form-label">CVV</label>
        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV kodunu giriniz" required>
      </div>
      <!-- Bilgilerimi hatırla checkbox -->
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="hatirla">
        <label class="form-check-label" for="hatirla">Bilgilerimi hatırla</label>
      </div>
      <!-- Formu gönderme butonu -->
      <button type="submit" class="btn btn-primary">Ödemeyi Tamamla</button>
    </form>
  </div>
  </div>
</body>
</html>