<?php
// Oturumu başlat
session_start();
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
                <!-- Navbar içerikleri -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Sol tarafa hizalanmış menü öğeleri -->
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

    <section>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            // Kullanıcı oturumu kontrolü
                            if (isset($_SESSION["kullanici_adi"])) {
                                // Kullanıcı oturumu varsa, hoş geldiniz mesajı ve e-posta adresi gösterilir
                                echo "<h3>" . $_SESSION["kullanici_adi"] . "HOŞGELDİN</h3>";
                                echo "<h3>" . $_SESSION["email"] . "</h3>";
                                // Çıkış yap butonu
                                echo "<a href='cikis.php' class='btn btn-danger' style='color:white; text-decoration:none; margin-top: 30px; margin-left:43%;'>ÇIKIŞ YAP</a>";
                            } else {
                                // Kullanıcı oturumu yoksa, erişim reddedilir
                                echo "Bu sayfayı görüntüleme yetkiniz bulunmamaktadır";
                            }
                            ?>
                        </div>
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