<?php
$page = "authorization";
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
include 'parts/header.php';

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	//зашифровуем пароль
	$password = md5($_POST['password']);
	//делаем запрос в БД - выбираем пользователя
	$sql = "SELECT * FROM users WHERE  `login`='" . $_POST["login"] . "' AND `password`='" . $password . "'";
	//получаем результат
	$result = $conn->query($sql);
	//если пользователь существует
	if($result->num_rows > 0) {
		//очищаем куки с избраным
		setcookie("favorites", "", 0);
		//выбираем пользователя
		$user = mysqli_fetch_assoc($result);
		//проверяем верифицирован ли он
		if($user['verifided'] == '1') {
			//создаем куки для хранения данных пользователя
			setcookie("user_id", $user["id"]);
			header("Location: /");
		} else {
			//если нет, то выводим ссылку на повторную верификацию
			?>
			<a class="btn btn-primary" href="verification.php?id=<?php echo $user['id']; ?>" role="button">Подтвердите свою почту!</a>	
			<?php
		}	
	} else {
		echo "Такого пользователя не существует!";
		var_dump($password);
	}
}
?>

<div class="card col-5 mt-3 mx-auto">
	<div class="card-header">
		<h5>Авторизация</h5>
	</div>	
	<form class="mx-2" method="POST" id="login">
	  <div class="form-group mt-3">
	    <label for="login">Логин</label>
	    <input type="text" class="form-control" name="login" placeholder="Введите логин">
	  </div>

	  <div class="form-group">
	    <label for="password">Пароль</label>
	    <input type="password" class="form-control" required name="password" placeholder="Введите пароль">
	  </div>

	  <button type="submit" class="btn btn-primary mb-2">Авторизоваться</button>
	  <a href="register.php" class="btn btn-primary mb-2">Регистрация</a>
	</form>
</div>
<?php include 'parts/footer.php'; ?>