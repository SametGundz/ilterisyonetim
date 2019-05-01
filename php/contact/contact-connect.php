<?php 

include '../db-connect.php';

if(isset($_POST['gonder'])) {
    $mesaj=$db -> prepare("INSERT into iletisim set
    
    iletisim_ad=:iletisim_ad,
    iletisim_email=:iletisim_email,
    iletisim_konu=:iletisim_konu,
    iletisim_mesaj=:iletisim_mesaj

    ");
    $kontrol =$mesaj -> execute(array(

        'iletisim_ad' => $_POST['iletisim_ad'],
        'iletisim_email' => $_POST['iletisim_email'],
        'iletisim_konu' => $_POST['iletisim_konu'],
        'iletisim_mesaj' => $_POST['iletisim_mesaj']
    ));
}
if($kontrol) {
    header("Location:../../contact.php?durum=sentok");
    exit;
}
else{

    header("Location:../../contact.php?durum=sentno");
    exit;
}



?>