<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>İlteriş Yönetim | Site Sakini Girişi</title>

  <!-- Bootstrap -->
  <link href="nedmin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="nedmin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="nedmin/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="nedmin/vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="nedmin/build/css/custom.min.css" rel="stylesheet">
</head>

<body  class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
         

          <form action="nedmin/netting/islem.php" method="POST">


            <h1 style="letter-spacing: 1px;">Site Sakini Girişi</h1>
            
            <div>
              <input type="text" name="sakin_username" class="form-control" placeholder="Kullanıcı Adınız" required="" />
            </div>
            <div>
              <input type="password" name="sakin_password" class="form-control" placeholder="Şifreniz" required="" />
            </div>
            <div>
              <input type="hidden" value="1"name="sakin_yetki" class="form-control" placeholder="Şifreniz" required="" />
            </div>
            <div>
            <button style="width: 100%; background-color: #73879C; color:white;" type="submit" name="sakingiris" class="btn btn-default"> Giriş Yap</button>
            <label><a href="index.php"style="font-size: 16px;">Anasayfaya Dön</a></label>

          </form>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">

             <?php 

             if ($_GET['user-control-panel-access']=="denied") {
             
             echo "Giriş bilgileri hatalı .Tekrar deneyiniz.";

             } elseif ($_GET['durum']=="exit") {
             
             echo "Başarıyla Çıkış Yaptınız.";

             }
             elseif ($_GET['ilteris-yonetim-user-update-process']=="ok") {
               echo "<b>Hesap bilgileriniz başarıyla değiştirildi.</b><br>";
               echo "<b>Yeni bilgilerinizle giriş yapabilirsiniz.</b>";
             }

             ?>
               
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-home"style="margin-right: 5px;"></i>İlteriş Yönetim</h1>
                <p>©Shyft Software</p>
              </div>
            </div>
          </form>



        </section>
      </div>

    </div>
  </div>
</body>
</html>
