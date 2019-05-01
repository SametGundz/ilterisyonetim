<?php
ob_start();
session_start();

include 'baglan.php';



// YÖNETİCİ GİRİŞİ


if (isset($_POST['admingiris'])) {


	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $_POST['kullanici_mail'],
		'password' => md5($_POST['kullanici_password']),
		'yetki' => 5
		));

	$say=$kullanicisor->rowCount();

	if ($say==1) {

		$_SESSION['kullanici_mail']=$_POST['kullanici_mail'];
		$_SESSION['kullanici_password']=$_POST['kullanici_password'];

		if (isset($_POST['rememberme'])) {
			setcookie("kullanici_mail",$_POST['kullanici_mail'],strtotime("+1 day"));
			setcookie("kullanici_password",$_POST['kullanici_password'],strtotime("+1 day"));
		}
		else{
			setcookie("kullanici_mail",$_POST['kullanici_mail'],strtotime("-1 day"));
			setcookie("kullanici_password",$_POST['kullanici_password'],strtotime("-1 day"));

		}

		header("Location:../production/index.php");
		exit;



	} else {

		header("Location:../production/login.php?durum=no");
		exit;
	}
	

}



// MUHASEBECİ GİRİŞİ

if (isset($_POST['accountant_login'])) {


	$accountantsor=$db->prepare("SELECT * FROM muhasebeci where accountant_mail=:mail and accountant_password=:password and accountant_yetki=:yetki");
	$accountantsor->execute(array(
		'mail' => $_POST['accountant_mail'],
		'password' => $_POST['accountant_password'],
		'yetki' => 3
		));

	$say=$accountantsor->rowCount();

	if ($say==1) {

		$_SESSION['accountant_mail']=$_POST['accountant_mail'];

		header("Location:../production/accountant/index.php");
		exit;



	} else {

		header("Location:../production/accountant/accountant-login.php?durum=no");
		exit;
	}
	

}






// SİTE SAKİNİ GİRİŞİ


if (isset($_POST['sakingiris'])) {

	$sakin_username=$_POST['sakin_username'];
	$sakin_password=$_POST['sakin_password'];

	$sakinsor=$db->prepare("SELECT * FROM sakin where sakin_username=:sakin_username and sakin_password=:sakin_password and sakin_yetki=:sakin_yetki");
	$sakinsor->execute(array(
		'sakin_username' => $sakin_username,
		'sakin_password' => $sakin_password,
		'sakin_yetki' => 1
		));

	$say=$sakinsor->rowCount();

	if ($say==1) {
				
		$_SESSION['sakin_username']=$sakin_username;
		header("Location:../../sakin/index.php?user-control-panel-access-accepted");
		exit;



	} else {

		header("Location:../../login.php?user-control-panel-access=denied");
		exit;
	}
	

}






// SİTE GENEL AYAR BİLGİLERİ KAYDETME


if(isset($_POST['genelayarkaydet'])){

$ayarkaydet=$db -> prepare("UPDATE ayar SET 
	ayar_title=:title,
	ayar_description=:description,
	ayar_keywords=:keywords,
	ayar_author=:author
	WHERE ayar_id=0");

$update=$ayarkaydet -> execute(array(
	'title' => $_POST['ayar_title'],
	'description' => $_POST['ayar_description'],
	'keywords' => $_POST['ayar_keywords'],
	'author' => $_POST['ayar_author'],
));

if($update) {
	header("Location:../production/genel-ayarlar.php?durum=ok");
	exit;
}
else {
	header("Location:../production/genel-ayarlar.php?durum=no");
	exit;
}
}






// 	SİTEYLE İLETİŞİME GEÇME 


if(isset($_POST['iletisimayarkaydet'])){

$ayarkaydet=$db -> prepare("UPDATE ayar SET 
	ayar_tel=:tel,
	ayar_gsm=:gsm,
	ayar_faks=:faks,
	ayar_mail=:mail,
	ayar_il=:il,
	ayar_ilce=:ilce,
	ayar_adres=:adres,
	ayar_mesai=:mesai
	WHERE ayar_id=0");

$update=$ayarkaydet -> execute(array(
	'tel' => $_POST['ayar_tel'],
	'gsm' => $_POST['ayar_gsm'],
	'faks' => $_POST['ayar_faks'],
	'mail' => $_POST['ayar_mail'],
	'il' => $_POST['ayar_il'],
	'ilce' => $_POST['ayar_ilce'],
	'adres' => $_POST['ayar_adres'],
	'mesai' => $_POST['ayar_mesai'],
));

if($update) {
	header("Location:../production/iletisim-ayarlar.php?durum=ok");
	exit;
}
else {
	header("Location:../production/iletisim-ayarlar.php?durum=no");
	exit;
}
}






// SİTE APİ AYARLARI KAYDETME 


if(isset($_POST['apiayarkaydet'])){

$ayarkaydet=$db -> prepare("UPDATE ayar SET 
	ayar_analystic=:analystic,
	ayar_maps=:maps,
	ayar_zopim=:zopim

	WHERE ayar_id=0");

$update=$ayarkaydet -> execute(array(
	'analystic' => $_POST['ayar_analystic'],
	'maps' => $_POST['ayar_maps'],
	'zopim' => $_POST['ayar_zopim']

));

if($update) {
	header("Location:../production/api-ayarlar.php?durum=ok");
	exit;
}
else {
	header("Location:../production/api-ayarlar.php?durum=no");
	exit;
}
}






// SOSYAL MEDYA HESAPLARINI KAYDETME


if(isset($_POST['sosyalayarkaydet'])){

$ayarkaydet=$db -> prepare("UPDATE ayar SET 
	ayar_facebook=:facebook,
	ayar_youtube=:youtube,
	ayar_twitter=:twitter

	WHERE ayar_id=0");

$update=$ayarkaydet -> execute(array(
	'facebook' => $_POST['ayar_facebook'],
	'youtube' => $_POST['ayar_youtube'],
	'twitter' => $_POST['ayar_twitter']

));

if($update) {
	header("Location:../production/sosyal-ayarlar.php?durum=ok");
	exit;
}
else {
	header("Location:../production/sosyal-ayarlar.php?durum=no");
	exit;
}
}






// SMTP AYARLARI 


if(isset($_POST['mailayarkaydet'])){

$ayarkaydet=$db -> prepare("UPDATE ayar SET 
	ayar_smtpuser=:smtpuser,
	ayar_smtphost=:smtphost,
	ayar_smtppassword=:smtppassword,
	ayar_smtpport=:smtpport

	WHERE ayar_id=0");

$update=$ayarkaydet -> execute(array(
	'smtpuser' => $_POST['ayar_smtpuser'],
	'smtphost' => $_POST['ayar_smtphost'],
	'smtppassword' => $_POST['ayar_smtppassword'],
	'smtpport' => $_POST['ayar_smtpport']

));

if($update) {
	header("Location:../production/sosyal-ayarlar.php?durum=ok");
	exit;
}
else {
	header("Location:../production/sosyal-ayarlar.php?durum=no");
	exit;
}
}






// ŞİRKET HAKKINDA AYARLARINI KAYDETME


if(isset($_POST['hakkimizdakaydet'])){

$hakkimizdakaydet=$db -> prepare("UPDATE hakkimizda SET 
	hakkimizda_baslik=:baslik,
	hakkimizda_icerik=:icerik,
	hakkimizda_video=:video,
	hakkimizda_vizyon=:vizyon,
	hakkimizda_misyon=:misyon
	WHERE hakkimizda_id=0");

$update=$hakkimizdakaydet -> execute(array(
	'baslik' => $_POST['hakkimizda_baslik'],
	'icerik' => $_POST['hakkimizda_icerik'],
	'video' => $_POST['hakkimizda_video'],
	'vizyon' => $_POST['hakkimizda_vizyon'],
	'misyon' => $_POST['hakkimizda_misyon']
));

if($update) {
	header("Location:../production/hakkimizda.php?durum=ok");
	exit;
}
else {
	header("Location:../production/hakkimizda.php?durum=no");
	exit;
}
}





// MUHASEBECİ EKLEME


if(isset($_POST['add_accountant'])) {

	$kaydet=$db -> prepare("INSERT INTO muhasebeci set 

		accountant_ad=:accountant_ad,
		accountant_soyad=:accountant_soyad,
		accountant_mail=:accountant_mail,
		accountant_password=:accountant_password
		");
	$insert=$kaydet -> execute(array(

		'accountant_ad' => $_POST['accountant_ad'],
		'accountant_soyad' =>$_POST['accountant_soyad'],
		'accountant_mail' => $_POST['accountant_mail'],
		'accountant_password' => $_POST['accountant_password']
	));

	if($insert) {
		header("Location:../production/accountants.php?add_accountant=ok");
		exit;
	}
	else {
		header("Location:../production/accountants.php?apartman_ekleme=no");
		exit;
	}
}




//	YÖNETİM PANELİ YENİ APARTMAN EKLEME


if(isset($_POST['apartmanekle'])) {

	$kaydet=$db -> prepare("INSERT INTO apartman set 

		apartman_ad=:apartman_ad,
		apartman_no=:apartman_no,
		apartman_ilce=:apartman_ilce,
		apartman_il=:apartman_il
		");
	$insert=$kaydet -> execute(array(

		'apartman_ad' => $_POST['apartman_ad'],
		'apartman_no' =>$_POST['apartman_no'],
		'apartman_ilce' => $_POST['apartman_ilce'],
		'apartman_il' => $_POST['apartman_il']
	));

	if($insert) {
		header("Location:../production/apartman-tablo.php?apartman_ekleme=ok");
		exit;
	}
	else {
		header("Location:../production/apartman-tablo.php?apartman_ekleme=no");
		exit;
	}
}





//	YÖNETİM PANELİ KULLANICISI BİLGİSİ DÜZENLEME


if (isset($_POST['kullaniciduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db-> prepare("UPDATE kullanici SET
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_mail=:kullanici_mail,
		kullanici_password=:kullanici_password,
		kullanici_gsm=:kullanici_gsm,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet-> execute(array(
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_mail' => $_POST['kullanici_mail'],
		'kullanici_password' => md5($_POST['kullanici_password']),
		'kullanici_gsm' => $_POST['kullanici_gsm'],
		'kullanici_durum' => $_POST['kullanici_durum'],
	));

	if ($update) {
		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");
		exit;
	}
	else{
		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
		exit;
	}
}






// APARTMAN SİLME 


	if ($_GET['apartmansil']=="ok") {
		
		$sil=$db->prepare("DELETE FROM apartman where apartman_id=:id");
		$kontrol=$sil-> execute(array(

			'id' => $_GET['apartman_id']
		));

		if ($kontrol) {
			header("Location:../production/apartman-tablo.php?durum=ok");
			exit;

		}
		else {
			header("Location:../production/apartman-tablo.php?durum=no");
			exit;
		}
	}






//	APARTMAN BİLGİLERİ DÜZENLEME


if (isset($_POST['apartmanduzenle'])) {

	$apartman_id=$_POST['apartman_id'];

	$ayarkaydet=$db->prepare("UPDATE apartman SET
		apartman_ad=:apartman_ad,
		apartman_no=:apartman_no,
		apartman_ilce=:apartman_ilce,
		apartman_il=:apartman_il
		WHERE apartman_id={$_POST['apartman_id']}");

	$update=$ayarkaydet->execute(array(
		'apartman_ad' => $_POST['apartman_ad'],
		'apartman_no' => $_POST['apartman_no'],
		'apartman_ilce' => $_POST['apartman_ilce'],
		'apartman_il' => $_POST['apartman_il']
		));


	if ($update) {

		Header("Location:../production/apartman-duzenle.php?apartman_id=$apartman_id&durum=ok");

	} else {

		Header("Location:../production/apartman-duzenle.php?apartman_id=$apartman_id&durum=no");
	}

}






//	SİTE SAKİNİ HESABI EKLEME


if(isset($_POST['sitesakiniekle'])) {

	$sakinekle=$db -> prepare("INSERT INTO sakin set 

		sakin_adsoyad=:sakin_adsoyad,
		sakin_username=:sakin_username,
		sakin_password=:sakin_password,
		sakin_gsm=:sakin_gsm,
		sakin_yetki=:sakin_yetki,
		sakin_apartman=:sakin_apartman     
		");
	$insert=$sakinekle -> execute(array(

		'sakin_adsoyad' => $_POST['sakin_adsoyad'],
		'sakin_username' =>$_POST['sakin_username'],
		'sakin_password' =>$_POST['sakin_password'],
		'sakin_gsm' => $_POST['sakin_gsm'],
		'sakin_yetki' => $_POST['sakin_yetki'],
		'sakin_apartman' => $_POST['sakin_apartman'] 
	));

	if($insert) {
		header("Location:../production/sakin-ekle.php?sakin-ekleme=ok");
		exit;
	}
	else {
		header("Location:../production/sakin-ekle.php?sakin-ekleme=no");
		exit;
	}
}






//	SİTE SAKİNİ SİLME	


	if ($_GET['sakinsil']=="ok") {
		
		$sil=$db->prepare("DELETE FROM sakin where sakin_id=:id");
		$kontrol=$sil-> execute(array(

			'id' => $_GET['sakin_id']
		));

		if ($kontrol) {
			header("Location:../production/site-sakinleri.php?durum=ok");
			exit;

		}
		else {
			header("Location:../production/site-sakinleri.php?durum=no");
			exit;
		}
	}






//	SİTE SAKİNİ BİLGİLERİ DÜZENLEME


if (isset($_POST['sakinduzenle'])) {

	$sakin_id=$_POST['sakin_id'];

	$ayarkaydet=$db-> prepare("UPDATE sakin SET
		sakin_adsoyad=:sakin_adsoyad,
		sakin_username=:sakin_username,
		sakin_password=:sakin_password,
		sakin_gsm=:sakin_gsm,
		sakin_apartman=:sakin_apartman
		WHERE sakin_id={$_POST['sakin_id']}");

	$update=$ayarkaydet-> execute(array(
		'sakin_adsoyad' => $_POST['sakin_adsoyad'],
		'sakin_username' => $_POST['sakin_username'],
		'sakin_password' => $_POST['sakin_password'],
		'sakin_gsm' => $_POST['sakin_gsm'],
		'sakin_apartman' => $_POST['sakin_apartman']
	));

	if ($update) {
		header("Location:../production/site-sakinleri.php?sakin_id=$sakin_id&ilteris-yonetim-user-update-process=ok");
		exit;
	}
	else{
		header("Location:../production/site-sakinleri.php?sakin_id=$sakin_id&ilteris-yonetim-user-update-process=no");
		exit;
	}
}






//	SİTE SAKİNİ KENDİ HESABINI DÜZENLEME


if (isset($_POST['hesapduzenle'])) {

	$sakin_id=$_POST['sakin_id'];

	$ayarkaydet=$db-> prepare("UPDATE sakin SET
		sakin_adsoyad=:sakin_adsoyad,
		sakin_username=:sakin_username,
		sakin_password=:sakin_password,
		sakin_gsm=:sakin_gsm
		WHERE sakin_id={$_POST['sakin_id']}");

	$update=$ayarkaydet-> execute(array(
		'sakin_adsoyad' => $_POST['sakin_adsoyad'],
		'sakin_username' => $_POST['sakin_username'],
		'sakin_password' => $_POST['sakin_password'],
		'sakin_gsm' => $_POST['sakin_gsm']
	));

	if ($update) {
		header("Location:../../sakin/duzenle-logout.php?sakin_id=$sakin_id&guncelleme=ok");
		exit;
	}
	else{
		header("Location:../../sakin/hesap-guvenlik.php?sakin_id=$sakin_id&guncelleme=no");
		exit;
	}
}






//	YENİ YÖNETİM PANELİ KULLANICISI EKLEME


if(isset($_POST['kullaniciekle'])) {

	$yoneticiekle=$db -> prepare("INSERT INTO kullanici set 

		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_mail=:kullanici_mail,
		kullanici_password=:kullanici_password,
		kullanici_gsm=:kullanici_gsm,
		kullanici_yetki=:kullanici_yetki   
		");
	$insert=$yoneticiekle -> execute(array(

		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_mail' =>$_POST['kullanici_mail'],
		'kullanici_password' =>md5($_POST['kullanici_password']),
		'kullanici_gsm' => $_POST['kullanici_gsm'],
		'kullanici_yetki' => $_POST['kullanici_yetki']
	));

	if($insert) {
		header("Location:../production/managers.php?sakin-ekleme=ok");
		exit;
	}
	else {
		header("Location:../production/managers.php?sakin-ekleme=no");
		exit;
	}
}




?>