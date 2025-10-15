<?php
// Veritabanı bağlantı bilgileri
$host = "localhost";  // Veritabanı sunucusu
$kullanici = "root";  // Veritabanı kullanıcı adı
$parola = "";         // Veritabanı parolası
$vt = "products";     // Veritabanı adı
// Veritabanı bağlantısını kurma
$baglanti = mysqli_connect($host, $kullanici, $parola, $vt);
mysqli_set_charset($baglanti, "UTF8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Müzik Mağazası</title>
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
    .best-sellers {
      padding: 20px;
    }
    #coksatanlar {
      padding: 20px;
      color: #f2f2f2;
      background-color: #35363a;
      max-width: 415px;
      border-radius: 70px;
      margin-left: 550px;
      margin-top: 20px;
      margin-bottom: 50px;
    }
    .carousel-item img {
      max-width: 70%;
      margin-left: 20px;
      max-height: 400px;
      object-fit: cover;
      margin: auto;
      margin-top: 35px;
      margin-bottom: 10px;
      border-radius: 10px;
    }
    .products {
      padding: 20px;
    }
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
    }
    /* Müzik Türleri */
    .music-genres {
      display: flex;
      justify-content: space-between;
      padding: 20px;
    }
    .genre {
      flex-grow: 1;
      padding: 10px;
      margin-right: 10px;
      background-color: #f0f0f0;
    }
    .product-grid {
      margin-left: 0px;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(18rem, 1fr));
      grid-gap: 20px;
      justify-content: center;
    }
    .card {
      max-width: 450px;
      max-height: 600px;
      margin: 5px;
      padding: 20px;
    }
    .card-img-top {
      border-radius: 10px;
      height: 390px;
    }
    .card-title {
      text-align: center;
      margin-top: 2px;
    }
    .card-title a {
      color: black;
      text-decoration: none;
      /*Alttaki çizgiyi kaldırır*/
    }
    .card-text {
      text-align: center;
    }
    .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      margin-right: 0px;
    }
    .card:hover {
      transform: scale(1.05);
      /*Kartı %5 büyütür*/
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      /*Kartın altına hafif gölge ekler*/
    }
    .card-body {
      text-align: center;
    }
    .card-body .btn {
      width: 300px;
      margin-top: 10px;
      background-color: #198754;
    }
    footer {
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
            <a href=""><img src="img2/heart-icon.png" alt="" width="40px" height="40px"></a>
            <a href="sepet.php"><img src="img2/basket-icon.png" alt="" width="30px" height="30px"></a>
            <a href="profile.php"><img src="img2/person-icon.png" alt="" width="30px" height="30px"></a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <section class="best-sellers">
    <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <!-- Carousel içeriği -->
      <div class="carousel-inner">
        <!-- İlk slide-->
        <div class="carousel-item active">
          <img src="img2/sld1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <!-- İkinci slide -->
        <div class="carousel-item">
          <img src="img2/sld2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <!-- Üçüncü slide -->
        <div class="carousel-item">
          <img src="img2/sld3.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      <!-- Önceki slide'a geçiş düğmesi -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <!-- Sonraki slide'a geçiş düğmesi -->
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>


  <section class="products">
    <h2 id="coksatanlar">BU AY EN ÇOK SATANLAR</h2>

    <div class="product-grid" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
      <?php
      // Veritabanı bağlantı bilgileri
      $host = "localhost";
      $kullanici = "root";
      $parola = "";
      $vt = "products";

      // Veritabanı bağlantısı kurma
      $baglanti = mysqli_connect($host, $kullanici, $parola, $vt);
      mysqli_set_charset($baglanti, "UTF8");

      // Ürünleri çekmek için SQL sorgusu
      $sorgu = "SELECT * FROM product WHERE product_type = 'Ana Sayfa'";
      $sonuc = mysqli_query($baglanti, $sorgu);

      // Her bir ürün için bir card oluşturur
      while ($row = mysqli_fetch_assoc($sonuc)) {
        echo '<div class="card" style="width: calc(33.33% - 20px); margin-bottom: 20px;">';
        echo '  <a href="urun.php?id=' . $row['id'] . '">';
        // Ürün resmi
        echo '    <img src="' . $row['product_url'] . '" class="card-img-top" alt="...">';
        echo '    <div class="card-body">';
        // Ürün adı
        echo '      <h5 class="card-title"><a href="urun.php?id=' . $row['id'] . '">' . $row['product_name'] . '</a></h5>';
        // Ürün fiyatı
        echo '      <h3 class="card-text">' . $row['product_price'] . '$</h3>';
        // Sepete ekle formu
        echo '      <form method="post" action="sepet.php">';
        echo '        <input type="hidden" name="product_id" value="' . $row['id'] . '">';
        echo '        <input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
        echo '        <input type="hidden" name="product_price" value="' . $row['product_price'] . '">';
        echo '        <button type="submit" name="addToCart" class="btn btn-primary">Sepete Ekle</button>';
        echo '      </form>';
        echo '    </div>';
        echo '  </a>';
        echo '</div>';
      }

      // Veritabanı bağlantısını kapatır
      mysqli_close($baglanti);
      ?>
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