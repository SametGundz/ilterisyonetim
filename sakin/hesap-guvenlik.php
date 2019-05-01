<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$sakinsor=$db->prepare("SELECT * FROM sakin");
$sakinsor->execute();

    $sakinsor=$db->prepare("SELECT * FROM sakin where sakin_id=:id");
    $sakinsor->execute(array(
        'id' => $_GET['sakin_id']
    ));
    $sakincek=$sakinsor->fetch(PDO::FETCH_ASSOC);
        ?>


<!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Site Sakini Bilgileri Düzenleme<small>
                      <?php 

                      if ($_GET['guncelleme']=="ok") { ?>
                        <b style="color:green;">Yeni hesap bilgileriniz başarıyla kaydedildi!</b> <?php
                      }
                      else if($_GET['guncelleme']=="no") { ?>
                        <b style="color:red;">Yeni hesap bilgileriniz kaydedilirken bir sorunla karşılaşıldı! Lütfen sonra tekrar deneyiniz. Sorun devam ederse bizimle iletişime geçiniz.</b>
                      <?php
                      }

                      ?>





                    </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="../nedmin/netting/islem.php" method="POST"
                    id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad Soyad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="sakin_adsoyad"id="first-name" required="required" class="form-control col-md-7 col-xs-12"value="<?php echo $sakincek['sakin_adsoyad'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Adı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="sakin_username"id="first-name" required="required" class="form-control col-md-7 col-xs-12"value="<?php echo $sakincek['sakin_username'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sifre<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" name="sakin_password"id="first-name" required="required" class="form-control col-md-7 col-xs-12"value="<?php echo $sakincek['sakin_password'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon Numarası<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="sakin_gsm"id="first-name" required="required" class="form-control col-md-7 col-xs-12"value="<?php echo $sakincek['sakin_gsm'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="sakin_id"id="first-name" required="required" class="form-control col-md-7 col-xs-12"value="<?php echo $sakincek['sakin_id'] ?>">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"align="right">
                          <button type="submit" class="btn btn-success"name="hesapduzenle">Güncelle</button>
                        </div>
                      </div>
                      <blockquote style="font-size: 16px;color: black;"><b style="color: red;">DİKKAT:</b> Kullanıcı adı veya şifre değişikliği yaptığınız takdirde tekrar giriş yapmanız gerekecek.</blockquote>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php include 'footer.php' ?>