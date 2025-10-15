<?php
// Veritabanı bağlantı bilgileri
$host = "localhost"; // Veritabanı sunucusu
$kullanici = "root"; // Veritabanı kullanıcı adı
$parola = ""; // Veritabanı parolası
$vt = "uyelik"; // Veritabanı adı

// Veritabanı bağlantısını kurma
$baglanti = mysqli_connect($host, $kullanici, $parola, $vt);
mysqli_set_charset($baglanti, "UTF8");
?>

<?php
session_start(); // Session'ları başlat
// Sepete ekle butonuna basıldığında
if (isset($_POST['addToCart'])) {
  // Session kontrolü ve oluşturma
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }

  // Ürünü sepete ekle
  $product_id = $_POST['product_id']; // Ürün ID'si
  $product_name = $_POST['product_name']; // Ürün adı
  $product_price = $_POST['product_price']; // Ürün fiyatı
  $quantity = 1; // Varsayılan olarak adet 1

  // Eğer ürün daha önce sepete eklenmişse, adedini arttır
  if (array_key_exists($product_id, $_SESSION['cart'])) {
    $_SESSION['cart'][$product_id]['quantity'] += 1;
  } else {
    // Yeni ürünü sepete ekle
    $_SESSION['cart'][$product_id] = array(
      'product_name' => $product_name,
      'product_price' => $product_price,
      'quantity' => $quantity
    );
  }
  header("Location: sepet.php"); // Sayfayı yenile
  exit();
}

// Adet arttırma
if (isset($_POST['increaseQuantity'])) {
  $product_id = $_POST['product_id']; // Ürün ID'si

  if (array_key_exists($product_id, $_SESSION['cart'])) {
    $_SESSION['cart'][$product_id]['quantity'] += 1;
  }
}

// Adet azaltma
if (isset($_POST['decreaseQuantity'])) {
  $product_id = $_POST['product_id']; // Ürün ID'si

  if (array_key_exists($product_id, $_SESSION['cart'])) {
    $_SESSION['cart'][$product_id]['quantity'] -= 1;

    if ($_SESSION['cart'][$product_id]['quantity'] <= 0) {
      unset($_SESSION['cart'][$product_id]); // Ürünü sepetten kaldır
    }
  }
}

// Ürünü sepetten kaldırma
if (isset($_POST['removeFromCart'])) {
  $product_id = $_POST['product_id']; // Ürün ID'si

  if (array_key_exists($product_id, $_SESSION['cart'])) {
    unset($_SESSION['cart'][$product_id]); // Ürünü sepetten kaldır
  }
}
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

    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    .sepet-listesi {
      list-style-type: none;
      padding: 0;
    }

    .sepet-urun {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #ddd;
      padding: 10px 0;
    }

    .sepet-urun .urun-ad {
      flex-grow: 1;
    }

    .sepet-urun .urun-fiyat {
      margin-left: 20px;
    }

    .toplam-tutar {
      text-align: right;
      margin-top: 20px;
      font-weight: bold;
    }

    .sepet-butonlar {
      display: flex;
      align-items: center;
    }

    .sepet-butonlar button {
      margin-right: 5px;
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
    <h1>Sepet</h1>
    <ul class="sepet-listesi">
      <?php
      // Session kontrolü
      if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $product_id => $product) {
          $product_name = $product['product_name'];
          $quantity = $product['quantity'];
          $product_price = $product['product_price'];
          $total_price = $quantity * $product_price;

          // Ürün bilgilerini ekrana yazdır
          echo "<li class='sepet-urun'>";
          echo "<span class='urun-ad'>$product_name</span>";
          echo "<span class='sepet-butonlar'>";
          echo "<form method='post' action='sepet.php'>";
          echo "<input type='hidden' name='product_id' value='$product_id'>";
          echo "<button type='submit' name='increaseQuantity' class='btn btn-primary'>+</button>";
          echo "</form>";
          echo "<form method='post' action='sepet.php'>";
          echo "<input type='hidden' name='product_id' value='$product_id'>";
          echo "<button type='submit' name='decreaseQuantity' class='btn btn-primary'>-</button>";
          echo "</form>";
          echo "<form method='post' action='sepet.php'>";
          echo "<input type='hidden' name='product_id' value='$product_id'>";
          echo "<button type='submit' name='removeFromCart' class='btn btn-danger'>Sil</button>";
          echo "</form>";
          echo "</span>";
          echo "<span class='urun-fiyat'>$quantity adet - Toplam Fiyat: $total_price $</span>";
          echo "</li>";
        }
      } else {
        // Sepet boşsa mesaj göster
        echo "<p>Sepetinizde ürün bulunmamaktadır.</p>";
      }
      ?>
    </ul>
    <?php
    // Sepet toplamını hesapla
    $toplam_tutar = 0;
    if (isset($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $product_id => $product) {
        $toplam_tutar += $product['quantity'] * $product['product_price'];
      }
    }
    ?>
    <p class="toplam-tutar">Toplam Tutar: <?php echo $toplam_tutar; ?> $</p>

    <?php
    // Kullanıcı girişi kontrolü
    if (isset($_SESSION['kullanici_adi'])) {
      // Kullanıcı girişi yapılmışsa, ödeme yap butonunu göster
      echo '<a href="odeme.php" class="btn btn-primary">Ödeme Yap</a>';
    } else {
      // Kullanıcı girişi yapılmamışsa, login sayfasına yönlendir
      echo '<a href="login.php" class="btn btn-primary">Ödeme Yap</a>';
    }
    ?>
  </div>
</body>
</html>