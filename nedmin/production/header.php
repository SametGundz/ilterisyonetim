<?php
ob_start();
session_start();
include '../netting/baglan.php';

//Belirli veriyi seçme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id' => 0
  ));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");

$kullanicisor->execute(array('mail' => $_SESSION['kullanici_mail'] ));

$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

if ($say==0) {

  Header("Location:../../index.php?durum=izinsiz");
  exit;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>İlteriş Yönetim | Admin Panel</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Ck Editör -->
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>


  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>İlteriş Yönetim</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Hoşgeldin</span>
              <h2><?php echo $kullanicicek['kullanici_adsoyad'] ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Başlıklar</h3>
                <ul class="nav side-menu">
                   <li><a href="index.php"><i class="fa fa-home"></i>Anasayfa</a></li>
                   <li><a href="hakkimizda.php"><i class="fa fa-info"></i>Hakkımızda Ayarları</a></li>
                   <li><a href="menu.php"><i class="fa fa-list"></i>Menü Ayarları</a></li>
                  <li><a><i class="fa fa-building"></i>Apartman Ayarları<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="apartman-tablo.php">Apartmanlar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i>Site Sakinleri Ayarlar<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="site-sakinleri.php">Site Sakinleri</a></li>
                      <li><a href="sakin-ekle.php">Manuel Site Sakini Ekleme</a></li>
                    </ul>
                  </li> 
                  <li><a><i class="fa fa-user"></i>Website Ayarları<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="managers.php">Yöneticiler</a></li>
                      <li><a href="accountants.php">Muhasebeciler</a></li>
                      <li><a href="staff.php">Personeller</a></li>
                      <li><a href="api-ayarlar.php">Api Ayarlar</a></li>
                      <li><a href="mail-ayarlar.php">Mail Ayarlar</a></li>
                      <li><a href="sosyal-ayarlar.php">Sosyal Ayarlar</a></li>
                    </ul>
                  </li>                       
                </ul>
              </div>
            </div>
       <!-- /sidebar menu -->

       <!-- /menu footer buttons -->
       <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
    </div>
  </div>

  <!-- top navigation -->
  <div class="top_nav">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png" alt=""><?php echo $kullanicicek['kullanici_adsoyad'] ?>
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="javascript:;"> Profil Bilgilerim</a></li>

              
              <li><a href="../netting/logout.php"><i class="fa fa-sign-out pull-right"></i> Güvenli Çıkış</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
        <!-- /top navigation -->