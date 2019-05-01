<?php
try {
	$db=new PDO("mysql:host=localhost;dbname=ilterisyonetim;charset=utf8",'root','sako1234567');
//	echo "basarili";
} catch (Exception $e) {
	$e -> getMessage();
}

?>