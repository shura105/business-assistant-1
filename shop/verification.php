<?php
//функция для определения рандомной строки
function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
	    $randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';

if(isset($_GET['user_code'])) {
	$sql = "SELECT * FROM users WHERE  `confirm_mail`='" . $_GET['user_code'] . "'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$user = mysqli_fetch_assoc($result);
		$sql = "UPDATE `users` SET `verifided` = '1' WHERE `id` =" . $user['id'];
		if($conn->query($sql)) {
			echo "Пользователь верифицирован!";
		} else {
			echo "Пользователь не верифицирован!";
		} 
	}else {
			echo "EROR";
		}
}

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	
	$user_code = generateRandomString(20);
	$link = "<a href='http://business-assistant.local/shop/verification.php?user_code=$user_code'>Confirm</a>";
	$sql = "UPDATE `users` SET `confirm_mail` = '$user_code' WHERE `id`=" . $_GET["id"];
	$result = $conn->query($sql);
	mail($_POST['email'], 'Registration', $link);

	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Verification</title>
</head>
<body>
	<form method="POST">
		<p>Email</br>
			<input type="text" name="email">
		</p>
		<button type="submit">OK</button>
	</form>
</body>
</html>