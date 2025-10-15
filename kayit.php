<?php
include("baglanti.php");//baglanti.php dosyasını bu dosyaya dahil eder.

$username_err=$email_err="";
$parola_err="";
$parolatkr_err="";

/*Bu değişkenler, kullanıcı adı, e-posta, parola ve parola tekrarı için hata 
  mesajlarını saklamak için kullanılır. 
  Bir hata olduğunda bu değişkenler ilgili hata mesajını içerir.*/

/////////////////////////////////////////////////////////////
if(isset($_POST["kaydet"]))//kaydet düğmesine basıldıysa kod bloğunu çalıştırır.
{
   //kullanıcı adı doğrulama

   /*Bu kod bloğu, kullanıcı adının doğruluğunu kontrol eder. 
     Eğer kullanıcı adı boşsa,"Kullanıcı Adını Boş Bırakamazsınız" hata mesajını verir.
     Eğer kullanıcı adı 6 karakterden azsa,"Kullanıcı Adı En Az 6 Karakterden Oluşmalıdır" 
     hata mesajını verir. 
     Eğer kullanıcı adı istenmeyen karakterler içeriyorsa,
     "Kullanıcı Adı Büyük Küçük Harf Ve Rakamdan Oluşmalıdır" hata mesajını verir.
     Eğer hata yoksa,kullanıcı adı $username değişkenine atanır.*/

    if(empty($_POST["kullaniciadi"]))
    {
        $username_err="Kullanıcı Adını Boş Bırakamazsınız";
    }
    else if(strlen($_POST["kullaniciadi"])<6)
    {
        $username_err="Kullanıcı Adı En Az 6 Karakterden Oluşmalıdır";
    }
    else if (!preg_match('/^[a-z\d_]{5,20}$/i', $_POST["kullaniciadi"])) 
    {
        $username_err="Kullanıcı Adı Büyük Küçük Harf Ve Rakamdan Oluşmalıdır";
    }
    else{
        $username=$_POST["kullaniciadi"];

    }

    //email doğrulama

    /*Bu kod bloğu e-posta adresinin doğruluğunu kontrol eder.
      Eğer e-posta alanı boşsa "Email Alanını Boş Bırakamazsınız" hata mesajını verir.
      Eğer e-posta adresi istenen formatta değilse "Geçersiz Email Formatı" hata mesajını verir. 
      Eğer hata yoksa e-posta adresi $email değişkenine atanır. */

    if(empty($_POST["email"]))
    {
        $email_err="Email Alanını Boş Bırakamazsınız";
    }
    else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
    {
        $email_err = "Geçersiz Email Formatı";
    }
    else{
        $email=$_POST["email"];
    }
  
    //parola doğrulama

    /* Bu kod bloğu parolanın doğruluğunu kontrol eder.
    Parola boşsa "Parola Alanını Boş Bırakamazsınız" hata mesajını verir. 
    Eğer hata yoksa, parola password_hash() fonksiyonu kullanılarak hashlenir ve $parola değişkenine atanır.*/

    if(empty($_POST["parola"]))
    {
        $parola_err="Parola Alanını Boş Bırakamazsınız";
    }
    else{
        $parola=password_hash($_POST["parola"], PASSWORD_DEFAULT);
    }

    //parola tekrar doğrulama

    /* Bu kod bloğu parolanın tekrar alanıyla eşleşip eşleşmediğini kontrol eder. 
       Eğer parola tekrarı boşsa "Parola Tekrar Alanını Boş Bırakamazsınız" hata mesajını verir. 
       Eğer parola ve parola tekrarı eşleşmiyorsa "Eşleşmeyen Parolalar" hata mesajını verir. 
       Eğer hata yoksa, parola tekrarı $parolatkr değişkenine atanır.*/

    if(empty($_POST["parolatkr"]))
    {
        $parolatkr_err="Parola Tekrar Alanını Boş Bırakamazsınız";
    }
    else if($_POST["parola"]!=$_POST["parolatkr"])
    {
        $parolatkr_err="Eşleşmeyen Parolalar";
    }
    else{
        $parolatkr=$_POST["parolatkr"];
    }

//////////////////////////////////////////////////

    if(isset($username)&& isset($email)&& isset($parola)&& isset($parolatkr))//Eğer değişkenler tanımlıysa içindeki kodları çalıştırır.
    {
    
    /*kullanicilar tablosuna yeni kayıt eklemek için SQL sorgusu oluşturur. 
      Bu sorgu $username, $email ve $parola değişkenlerinin değerlerini kullanarak kullanıcı kaydı oluşturur.*/
    $ekle="INSERT INTO kullanicilar (kullanici_adi,email,parola) VALUES ('$username','$email','$parola')";

    $calistirekle = mysqli_query($baglanti,$ekle);//oluşturulan SQL sorgusunu $baglanti veritabanına gönderip sorguyu çalıştırır. 

    /*Bu kod bloğu $calistirekle değişkenini kontrol eder. 
    Eğer değişken doğru ise başarılı bir şekilde kaydedildiğini bildiren mesaj gösterilir. 
    Eğer $calistirekle değişkeni yanlış ise hata olduğunu bildiren bir hata mesajı gösterilir. 
    Sonda da veritabanı bağlantısı kapatılır.*/

    if($calistirekle) {
        echo'<div class="alert alert-success" role="alert">
        Kaydınız Başarıyla Oluşturuldu!
      </div>';
    }
    
    else{
        echo'<div class="alert alert-danger" role="alert">
        Kayıt Oluşturulurken Sorun Yaşandı!
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
  <title>ÜYE KAYIT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-image: url(arkaplan.png);
      background-size: cover; /* Resmi kaplamak için */
      width: 100vw; /* Genişlik ekran genişliği kadar */
      height: 300px;
    }

    .card {
      color: whitesmoke;
      font-size: large;
      font-weight: 500;
      margin-left: 370px;
      width: 500px;
      background-color: transparent;
      border-radius: 20px;
      border: 3px solid rgba(255, 255, 255, .5);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(25px);
    }

    .container {
      margin-left: 145px;
    }

    .mb-3 input {
      background: transparent;
      color: whitesmoke;
    }

    .signup {
      margin-top: -12px;
      margin-bottom: 35px;
      color: whitesmoke;
      font-size: xx-large;
      font-weight: 700;
      text-align: center;
    }

    #kayitol {
      margin-top: 10px;
      margin-left: 180px;
      font-size: medium;
      font-weight: 500;
    }

    .girisyaplink {
      margin-top: 18px;
      margin-left: 85px;
    }

    #logo {
      width: 120px;
      height: 120px;
      align-items: center;
      margin-left: 165px;
      margin-top: -20px;
    }

    @media (max-width: 768px) {
      .card {
        margin-left: 10px;
        width: auto;
      }

      .container {
        margin-left: 10px;
      }
    }
  </style>
</head>
<body>
<div class="container p-2">
  <div class="card p-4">
    <form action="kayit.php" method="POST">
      <img src="Çalışma Yüzeyi 1.png" id="logo">
      <div class="signup">KAYIT OL</div>

      <!--kullanıcı adı girişi için bir input alanı oluşturur.
          form-control sınıfı, Bootstrap'in sağladığı stili uygular. 
          Eğer $username_err değişkeninde hata varsa is-invalid sınıfı eklenerek input alanını
          kırmızı renk yapar

          geçersiz giriş durumunda gösterilecek olan hata mesajı için bir bölgeyi gruplar.
        
          Eğer bir hata varsa, bu mesaj kullanıcıya görüntülenir.
           
          Bu özellikler email,parola ve parola tekrar kısmı için de geçerlidir.-->

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
        <input type="text" class="form-control <?php if (!empty($username_err)) echo "is-invalid"; ?>" id="exampleInputUser1"
               name="kullaniciadi" placeholder="Kullanıcı adınızı giriniz"> 
        <div id="validationServer03Feedback" class="invalid-feedback">
          <?php echo $username_err; ?>
        </div>
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">E-Mail</label>
        <input type="text" class="form-control <?php if (!empty($email_err)) echo "is-invalid"; ?>" id="exampleInputEmail1"
               name="email" placeholder="Email adresinizi giriniz" autocomplete="">
        <div id="validationServer03Feedback" class="invalid-feedback">
          <?php echo $email_err; ?>
        </div>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Parola</label>
        <input type="password" class="form-control <?php if (!empty($parola_err)) echo "is-invalid"; ?>"
               id="exampleInputPassword1" name="parola" placeholder="Parolanızı giriniz">
        <div id="validationServer03Feedback" class="invalid-feedback">
          <?php echo $parola_err; ?>
        </div>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Parola Tekrar</label>
        <input type="password" class="form-control <?php if (!empty($parolatkr_err)) echo "is-invalid"; ?>"
               id="exampleInputPassword1" name="parolatkr" placeholder="Parolanızı tekrar giriniz">
        <div id="validationServer03Feedback" class="invalid-feedback">
          <?php echo $parolatkr_err; ?>
        </div>
      </div>

      <button type="submit" name="kaydet" class="btn btn-success" id="kayitol">KAYIT OL</button>

      <div class="girisyaplink">
        <p>Zaten hesabınız var mı? <a href="login.php">Giriş Yap</a></p>
      </div>
    </form>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>











