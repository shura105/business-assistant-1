<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" href="http://business-assistant.local/services/assets/css/bootstrap.min.css" />
	<title>Бизнес-ассистент</title>
</head>
<body>
	<!-- Хедер, панель навигации -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://business-assistant.local">Бизнес-Ассистент</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

	<!-- Хедер, навигационные ссылки слева -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="/services/allServices.php">Услуги<span class="sr-only">(current)</span></a>
	      </li>
		 <!-- навигационная панель сверху -->
	     <li class="nav-item">
	        <a class="nav-link" href="/services/about.php">О нас</a>
	     </li>
	     <li class="nav-item">
	        <a class="nav-link" href="/services/contacts.php">Контакты</a>
	     </li>
	    </ul>

		<!-- Хедер, логин справа -->
		<?php
		// если кука существует - пишем "Выход", если нет - "Вход"

			if(isset($_COOKIE['user'])){
		?>
				 <!-- ссылка на logout.php (там будем удалять куку) -->
				<a class="text-secondary mr-3" href="/services/modules/logout.php">Выйти</a> 
		<?php
			}else{
		?>
				<a class="text-secondary mr-3" href="/services/modules/login.php">Войти</a>
		<?php
			}
		?>
		
    </div>
</nav>

<!-- Тело контента страницы -->
<div class="container">

	<!-- Тело контента страницы, навигация слева -->
	<div class="row m-2">
		<div class="col-3">
	  		
			<?php
				// подключаем боковую панель с категориями
				include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/cat_nav.php";
			?>

		</div>
		
		<!-- Тело контента страницы, секция товаров, справа от навигации -->
		<div class="col-9">  

<!-- начинаем перечень товаров -->
			<div class="container">