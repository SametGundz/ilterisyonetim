<?php
include 'header.php';


// HAKKIMIZDA KISMI VERİ ÇEKME İŞLEMİ
$hakkimizdasor=$db -> prepare("SELECT * from hakkimizda where hakkimizda_id=:id");
$hakkimizdasor -> execute(array(
  'id' => 0

));
$hakkimizdacek=$hakkimizdasor ->fetch(PDO::FETCH_ASSOC);

?>

<head>
  <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
</head>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Hakkımızda Ayarlar<small>
                      <?php 

                      if ($_GET['durum']=="ok") { ?>
                        <b style="color:green;">Güncelleme Başarılı</b> <?php
                      }
                      else if($_GET['durum']=="no") { ?>
                        <b style="color:red;">Güncelleme Başarısız</b>
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

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hakkımızda Başlık<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $hakkimizdacek['hakkimizda_baslik']?>"type="text" name=" hakkimizda_baslik"id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>



                      <!-- CK EDITOR BAŞLANGIÇ ALANI -->

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"for="first-name">İçerik <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="ckeditor" id="editor1"name="hakkimizda_icerik"><?php echo $hakkimizdacek['hakkimizda_icerik']?></textarea>
                          </div>
                        </div>
                        <script type="text/javascript">
                          CKEDITOR.replace('editor1' ,
                              {
                                filebrowserBrowserUrl : 'ckfinder/ckfinder.html',

                                filebrowserBrowserUrl : 'ckfinder/ckfinder.html?type=Images',

                                filebrowserBrowserUrl : 'ckfinder/ckfinder.html?type=Flash',

                                filebrowserBrowserUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                                filebrowserBrowserUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                filebrowserBrowserUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                forcePasteAsPlainText: true

                              }

                            )
                          

                        </script>

                        <!-- CK EDITOR BİTİŞ ALANI --> 



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hakkımızda Video<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $hakkimizdacek['hakkimizda_video']?>"type="text" name=" hakkimizda_video"id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hakkımızda Vizyon<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $hakkimizdacek['hakkimizda_vizyon']?>"type="text" name=" hakkimizda_vizyon"id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hakkımızda Misyon<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $hakkimizdacek['hakkimizda_misyon']?>"type="text" name="hakkimizda_misyon"id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"align="right">
                          <button type="submit" class="btn btn-success"name="hakkimizdakaydet">Güncelle</button>
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