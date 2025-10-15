<?php
// Veritabanı bağlantı bilgileri
$host = "localhost"; // Veritabanı sunucusu
$kullanici = "root"; // Veritabanı kullanıcı adı
$parola = ""; // Veritabanı parolası
$vt = "products"; // Veritabanı adı

// Veritabanı bağlantısını kurma
$baglanti = mysqli_connect($host, $kullanici, $parola, $vt);
mysqli_set_charset($baglanti, "UTF8");

// URL'den ürün ID'sini al
$urun_id = $_GET['id'];

// Veritabanından ürünü al
$sorgu = "SELECT * FROM product WHERE id = $urun_id";
$sonuc = mysqli_query($baglanti, $sorgu);
$row = mysqli_fetch_assoc($sonuc);

// Veritabanı bağlantısını kapat
mysqli_close($baglanti);

// Arama formundan gelen veriyi al
if (isset($_POST['search'])) {
  $aranan = $_POST['search'];

  // Veritabanında arama yap
  $sorgu = "SELECT id FROM product WHERE product_name LIKE '%$aranan%'";
  $sonuc = mysqli_query($baglanti, $sorgu);

  // Sonuç varsa, ilk ürünü göstermek için sayfayı yönlendir
  if (mysqli_num_rows($sonuc) > 0) {
    $row = mysqli_fetch_assoc($sonuc);
    $urun_id = $row['id'];
    header("Location: urun.php?id=$urun_id");
    exit();
  } else {
    // Sonuç bulunamazsa mesaj göster
    echo "Ürün bulunamadı.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $row['product_name']; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
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
      transition: transform 0.3s;
    }

    .navbar .icons a:hover {
      transform: scale(1.2);
      /* Büyütme efekti */
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

    /* Kart içeriğini sağa hizala */
    .card-body {
      text-align: right;
    }

    /* Kart başlığı için stillendirme */
    .card-title {
      margin-top: 20px;
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 0.5rem;
    }

    .card-text {
      margin-top: 30px;
      font-size: 1rem;
      margin-bottom: 1rem;
    }

    .card-body .btn {
      margin-top: 20px;
      padding: 5px 70px;
      font-size: 1rem;
    }

    @media (max-width: 768px) {
      .card {
        width: 100%;
        /* Kartın genişliğini mobil cihazlara göre ayarlar */
        max-width: 100%;
      }
    }

    .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      /* Büyüme ve gölge efektleri için geçiş süresi ve türü */
      margin: 0 auto;
      max-width: 900px;
      max-height: 900px;
      margin-top: 100px;
    }

    .card:hover {
      transform: scale(1.05);
      /* Kartı %5 büyütür */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      /* Kartın altına hafif gölge ekler */
    }

    .card-body {
      text-align: center;
      /* Kart içeriğini ortalar */
    }

    footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: #333;
      color: #fff;
      padding: 20px 0;
      text-align: center;
      font-size: 14px;
    }

    .footer-links a {
      color: #fff;
      text-decoration: none;
      margin-right: 20px;
    }

    .copyright {
      margin-top: 20px;
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

  <section class="urun">

    <div class="card mb-3">
      <div class="row g-0">
        <!-- Ürün resmi -->
        <div class="col-md-4">
          <img src="<?php echo $row['product_url']; ?>" class="img-fluid rounded-start" alt="...">
        </div>

        <!-- Ürün detayları -->
        <div class="col-md-8">
          <div class="card-body">
            <!-- Ürün adı -->
            <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
            <!-- Ürün açıklaması -->
            <p class="card-text"><?php echo $row['product_explain']; ?></p>
            <!-- Ürün fiyatı -->
            <h3 class="card-text2"><?php echo $row['product_price']; ?>$</h3>
            <div class="input-group">
            </div>
            <!-- Sepete ekle formu -->
            <form method="post" action="sepet.php">
              <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
              <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
              <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
              <input type="hidden" name="product_url" value="<?php echo $row['product_url']; ?>">
              <button type="submit" name="addToCart" class="btn btn-success">Sepete Ekle</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="footer-links">
      <!-- Alt menü bağlantıları -->
      <a href="kayit.php">Kayıt Ol</a>
      <a href="login.php">Giriş Yap</a>
      <a href="forget.php">Şifremi Unuttum</a>
      <a href="#">Gizlilik Politikası</a>
      <a href="#">Kullanım Koşulları</a>
    </div>

    <div class="copyright">
      &copy; 2024 Plak Plak E-ticaret Sitesi. Tüm hakları saklıdır.
    </div>
  </footer>
</body>
</html>