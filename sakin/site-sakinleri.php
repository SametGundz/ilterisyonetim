<?php 

include 'header.php'; 



//Belirli veriyi seçme işlemi
$sakinsor=$db->prepare("SELECT * FROM sakin");
$sakinsor->execute();

$sakincek=$sakinsor->fetch(PDO::FETCH_ASSOC);
$sakin_apartman=$sakincek['sakin_apartman'];
?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
     <div class="row">
            </div>



    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Apartman Sakinleri<small>, <?php echo $sakin_apartman ?>

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

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


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Ad Soyad</th>
                  <th>Numara</th>
                  <th>GSM</th>
                </tr>
              </thead>

              <tbody>

                <?php 

                while($sakincek=$sakinsor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><a href="sakin-sakinleri.php?sakin_id=<?php echo $sakincek['sakin_id'] ?>"><?php echo $sakincek['sakin_adsoyad'] ?></a></td>
                  <td><?php echo $sakincek['sakin_no'] ?></td>
                  <td><?php echo $sakincek['sakin_gsm'] ?></td>



                <?php  }

                ?>


              </tbody>
            </table>

            <!-- Div İçerik Bitişi -->


          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
