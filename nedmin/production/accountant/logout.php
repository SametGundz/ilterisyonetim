<?php 
session_start();
session_destroy();
header("Location:accountant-login.php?durum=exit");




 ?>