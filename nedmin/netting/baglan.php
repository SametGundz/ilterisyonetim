<?php
try {
	$db=new PDO("mysql:host=localhost;dbname=ilterisyonetim;charset=utf8",'root',password);
//	echo "basarili";
} catch (Exception $e) {
	$e -> getMessage();
}

?>
