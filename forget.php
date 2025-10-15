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

       .forgetpassword{
        margin-top: -12px;
        margin-bottom: 35px;
           color: whitesmoke;
           font-size: xx-large;
           font-weight: 700;
           text-align: center;
       }
       #sifredegis{
        margin-top: 10px;
        margin-left:150px;
        font-size: medium;
        font-weight: 500;
       }
       .girisyaplink{
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
        <div class="card p-5"><!-- Bootstrap card class'ı ile içeriği kart şeklinde gösterir -->

            <form action="forget.php" method="POST"><!-- Form verilerini "forget.php" sayfasına post eder -->
                <img src="Çalışma Yüzeyi 1.png" id="logo">
                <div class="forgetpassword">ŞİFRE DEĞİŞTİR</div> 
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
        <input type="text" class="form-control" id="exampleInputUser1" name="kullaniciadi" placeholder="Kullanıcı adınızı giriniz" >
         <div id="validationServer03Feedback" class="invalid-feedback">
         </div>
      </div>

      

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Yeni Parola</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="parola" placeholder="Yeni Parolanızı Giriniz">
         <div id="validationServer03Feedback" class="invalid-feedback">
         
         </div>
      </div>

      


      <button type="submit" name="giris" class="btn btn-success" id="sifredegis">GİRİŞ YAP</button>
                <div class="girisyaplink">
                    <p>Zaten hesabınız var mı? <a href="login.php">Giriş Yap</a></p>
                </div><!-- Giriş yapma linki hesabı olan kullanıcıları giriş yap kısmına yönlendirir. 
                           yani "login.php" sayfasına yönlendirir. -->
            </form>

        </div>

     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>