<?php
if(isset($_COOKIE['user'])){
	// очищаем cookie
	setcookie("user", '', '', "/");
	header('Location: http://business-assistant.local/services/allServices.php');
}else{
	echo "user non set";
	header('Location: http://business-assistant.local/allServices.php');
}
?>