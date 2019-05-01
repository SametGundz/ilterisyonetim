<?php
include 'header.php';

    $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
    $kullanicisor->execute(array(
        'id' => $_GET['kullanici_id']
    ));
    $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
        ?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kullanıcı Bilgisi Düzenleme<small>
                      <?php 

                      if ($_GET['durum']=="ok") { ?>
                        <b style="color:green;">Düzenleme Başarılı</b> <?php
                      }
                      else if($_GET['durum']=="no") { ?>
                        <b style="color:red;">Düzenleme Başarısız</b>
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
                    <form action="../netting/islem.php" method="POST"
                    id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <?php 

                    $zaman=explode(" ",$kullanicicek['kullanici_zaman']);
                     ?>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kayıt Tarihi<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input disabled="" type="date" name="kullanici_zaman"id="first-name" required="required" class="form-control col-md-7 col-xs-12"value="<?php echo $zaman[0]?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kayıt Saati<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input disabled="" type="time" name="kullanici_zaman"id="first-name" required="required" class="form-control col-md-7 col-xs-12"value="<?php echo $zaman[1]?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad Soyad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="kullanici_adsoyad"id="first-name" required="required" class="form-control col-md-7 col-xs-12"value="<?php echo $kullanicicek['kullanici_adsoyad']?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail Adresi<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="email"value="<?php echo $kullanicicek['kullanici_mail']?>" name="kullanici_mail"id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şifre<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="password"value="<?php echo $kullanicicek['kullanici_password']?>" name="kullanici_password"id="password" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yeni Şifre Onay<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="password"id="confirm_password" required="required"class="form-control col-md-7 col-xs-12">

                          <script>
                            
                            var password = document.getElementById("password")
                              , confirm_password = document.getElementById("confirm_password");

                            function validatePassword(){
                                if(password.value != confirm_password.value) {
                                         confirm_password.setCustomValidity("Şifreler birbirleriyle aynı değil!");
                                  } else {
                                         confirm_password.setCustomValidity('');
                                   }
                                }

                                      password.onchange = validatePassword;
                                      confirm_password.onkeyup = validatePassword;

                          </script>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="kullanici_gsm"id="first-name" required="required" class="form-control col-md-7 col-xs-12"value="<?php echo $kullanicicek['kullanici_gsm']?>">
                        </div>
                      </div>


                      <!--<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12"><select id="heard" class="form-control" name="kullanici_durum" required="">-->



                         <!-- KISA IF KULLANIMI -->

                         <!--<option value="1" <?php echo $kullanicicek['kullanici_durum']=='1' ? ' selected="" ' : '' ; ?>>Aktif</option>


                         <option value="0" <?php echo $kullanicicek['kullanici_durum']==0 ? ' selected="" ' : '' ; ?>>Pasif</option>


                         </select>
                        </div>-->


                        <input type="hidden" name="kullanici_id"value="<?php echo $kullanicicek['kullanici_id'] ?>">
                        <div class="form-group"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"align="right">
                          <button type="submit" class="btn btn-success"name="kullaniciduzenle">Kaydet</button>
                        </div>
                      </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>




            
            


            
          </div>
        </div>
        <!-- /page content -->

       <?php include 'footer.php'; ?>