<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	//отправляем запрос к БД на добавление заявки от авторизованого пользователя
	$sql = "INSERT INTO `request`(`user_id`, `title`, `description`, `content`, `category_id`, `image`, `cost`, `phone`) VALUES ('" . $_COOKIE["user_id_b"] . "', '" . $_POST["title"] . "', '" . $_POST["description"] . "', '" . $_POST["content"] . "', '" . $_POST["category_id"] . "', '" . $_POST["image"] . "', '" . $_POST["cost"] . "', '" . $_POST["phone"] . "')";
	//если запрос обработан
	if($conn->query($sql)) {//выводим что заказ оформлен и ссылку на главную страницу
		echo "Заявка оформлен</br>
		<a href='/shop/request.php'>В личный кабинет</a>";
	} else {
		echo "EROR";
	}
	
}
?>