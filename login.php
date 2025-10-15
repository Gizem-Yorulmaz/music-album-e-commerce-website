<?php
include("baglanti.php");//baglanti.php dosyasını dahil ediyoruz.

$username_err="";
$parola_err="";
// Kullanıcı adı ve parola hata mesajları için boş bir string tanımlanıyor.
//Bir hata olduğunda bu değişkenler ilgili hata mesajını içerir.

/////////////////////////////////////////////////////////////
if(isset($_POST["giris"]))// "giris" butonuna basıldığında form gönderildiğini kontrol ediyoruz.
{
   //kullanıcı adı doğrulama

    if(empty($_POST["kullaniciadi"]))
    {
        // Eğer kullanıcı adı boşsa hata mesajı verir
        $username_err="Kullanıcı Adını Boş Bırakamazsınız";
    }
    
    else{
        // Eğer kullanıcı adı doluysa kullanıcı adı değişkenine değer atanır
        $username=$_POST["kullaniciadi"];

    }

  
    //parola doğrulama

    if(empty($_POST["parola"]))//Eğer parola boşsa hata mesajı verir
    {
        $parola_err="Parola Alanını Boş Bırakamazsınız";
    }
    else{
        $parola=$_POST["parola"];//Eğer parola doluysa parola değişkenine değer atanır
    }


///////////////////////////////////////////////////////////////////



    if(isset($username)&& isset($parola))// Kullanıcı adı ve parola POST edildiyse devam eder
    {
        $secim= "SELECT * FROM kullanicilar WHERE kullanici_adi= '$username'";// Veritabanından kullanıcı adına göre kaydı seçer
        $calistir=mysqli_query($baglanti,$secim);// Sorguyu çalıştırır
        $kayitsayisi=mysqli_num_rows($calistir);// ya 1 ya 0 olmalı Kaç tane kayıt döndüğünü sayar

        if($kayitsayisi>0){//Eğer en az bir kayıt varsa

            $ilgilikayit=mysqli_fetch_assoc($calistir);//Eğer en az bir kayıt döndüyse
            $hashlisifre=$ilgilikayit["parola"]; //Kayıttaki şifreyi alır

            if(password_verify($parola,$hashlisifre))//Girilen şifre veritabanındaki hashlenmiş şifreyle eşleşiyorsa
            {
                session_start();
                $_SESSION["kullanici_adi"]=$ilgilikayit["kullanici_adi"];// Kullanıcı adını session'a atar
                $_SESSION["email"]=$ilgilikayit["email"];// E-postayı session'a atar
                header("location:profile.php");// Profil sayfasına yönlendirir

            }
            else{// Şifre eşleşmediyse
                echo'<div class="alert alert-danger" role="alert">
                  Hatalı Parola Girişi
                 </div>';

            }
        }

        else{// Kullanıcı adı bulunamadıysa
            echo'<div class="alert alert-danger" role="alert">
                  Hatalı Kullanıcı Adı Girişi
                 </div>';
        }

    
    mysqli_close($baglanti);
}
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ÜYE GİRİŞ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
              
              background-image: url(arkaplan.png);
              background-size: cover; /* Resmi kaplamak için */
              width: 100vw; /* Genişlik ekran genişliği kadar */
              height: 300px;
           }

      .card 
        {
            color: whitesmoke;
            font-size: large;
            font-weight: 500;
            
            margin-left: 370px;
            width: 500px;
            background-color: transparent;
            border-radius: 20px;
            border: 3px solid rgba(255, 255, 255, .5);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            backdrop-filter:blur(25px);
        }

        .container{
            margin-top:0px;
        }
        
       .mb-3 input
       {
        background: transparent;
        color: whitesmoke;
       }

       .signup{
        margin-top: -12px;
        margin-bottom: 35px;
           color: whitesmoke;
           font-size: xx-large;
           font-weight: 700;
           text-align: center;
       }
       #kayitol{
        margin-top: 10px;
        margin-left:150px;
        font-size: medium;
        font-weight: 500;
       }
       .kayitlink{
        margin-top: 18px;
        margin-left: 60px;
       }
       .sifremiunuttumlink{
        margin-left: 125px;
       }
    #logo{
        width: 120px;
        height: 120px;
        align-items: center;
        margin-left: 140px;
        margin-top: -20px;
    }


    </style>

  </head>
  <body>
     <div class="container p-5">
        <div class="card p-5">

            <form action="login.php" method="POST">
                <img src="Çalışma Yüzeyi 1.png" id="logo">
                <div class="signup">GİRİŞ YAP</div> 
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
        <input type="text" class="form-control 
        
        <?php /*kullanıcı adı girişi için input kullanılıyor. 
                Eğer $username_err değişkeni boş değilse alanın yanlış girildiğini belirten bir class eklenir.*/
        if(!empty($username_err))
        {
            echo "is-invalid";
        }
        ?>
        
        " id="exampleInputUser1" name="kullaniciadi" placeholder="Kullanıcı adınızı giriniz" >
        
         
         <div id="validationServer03Feedback" class="invalid-feedback"><!--Eğer kullanıcı adı hatalıysa, hata mesajını göstermek için kullanılan bir div.-->
         <?php
        echo $username_err;
         ?>
         </div>
      </div>

      

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Parola</label>
        <input type="password" class="form-control 
        
        <?php /*parola girişi için input kullanılıyor. 
                Eğer $parola_err değişkeni boş değilse alanın yanlış girildiğini belirten bir class eklenir.*/
        if(!empty($parola_err))
        {
            echo "is-invalid";
        }
        ?>
        
        " id="exampleInputPassword1" name="parola" placeholder="Parolanızı giriniz">
         <div id="validationServer03Feedback" class="invalid-feedback"><!--Eğer parola hatalıysa, hata mesajını göstermek için kullanılan bir div.-->
          <?php
            echo $parola_err;
          ?>
         </div>
      </div>

      


      <button type="submit" name="giris" class="btn btn-success" id="kayitol">GİRİŞ YAP</button>
                <div class="kayitlink">
                    <p>Henüz hesabınız yok mu? <a href="kayit.php">Kayıt Ol</a></p>
                </div>

                <div class="sifremiunuttumlink">
                    <p> <a href="forget.php">Şifremi Unuttum</a></p>
                </div>
            </form>

        </div>

     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>
