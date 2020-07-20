<?php
	// подключаем базу данных
	include $_SERVER['DOCUMENT_ROOT'] . '/services/configs/db.php';
	// подключаем хеадер
	include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/header.php";
	
		// запрос в БД, выбираем продукты по id
		$sql = "SELECT * FROM serv_orders WHERE id=" . $_GET['id'] . " ";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);

		// запрос в БД, выбираем категорию по id товара
		$categoryResult = $conn->query('SELECT * FROM serv_category WHERE serv_cat_id =' . $row['cat_id'] . '');
		$category =  mysqli_fetch_assoc($categoryResult);
?>
<!-- хлебные крошки -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Услуги</a></li>
    <li class="breadcrumb-item active">
    	<a href="/services/cat.php?id=<?php echo $category['serv_cat_id'] ?>">
    		<?php echo $category['serv_cat_name'];?>
    	</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $row['title']?></li>
  </ol>
</nav>

<div class="row">
	
	<div class="col-12">
		<div class="card">
			<div class="card-body">
		   		<h5 class="card-title">
		   			<?php echo $row['title']; ?>
		   			<a href="/services/servReview.php?id=<?php echo $row['id']?>" type="button" class="btn btn-outline-success btn-sm float-right">Оставить отзыв</a>
		   		</h5>
		   		<div class="col-md-4">
			    	<img src="/services/images/<?php echo $row['image']; ?>" class="card-img float-left mr-4">
			    </div>
		   		<p class="card-text"><?php echo $row['description']; ?></p>
		   		<p class="card-text"><?php echo $row['content']; ?></p>
		   		<p class="card-text">Телефон: <?php echo $row['phone']; ?></p>

		   			<!-- если забит адрес - выводим ссылку на мапсы -->
		   			<?php
		   				if($row['addr_town'] != '' && $row['addr_street'] != '' && $row['addr_house'] != ''){
		   					?>
		   						<p class="card-text">Адрес: <?php echo $row['addr_town'] . " " . $row['addr_street'] . " " . $row['addr_house'] . "/" . $row['addr_flat']; ?>
		   						<a href="https://www.google.com/maps/place/<?php echo $row['addr_town'] . "+" . $row['addr_street'] . "+" . $row['addr_house']?>"  type="button" class="btn btn-outline-info btn-sm ml-3">Google maps</a>
		   						</p>
					<?php
		   				}
		   				// выведем отзывы потребителей
		   				echo "<hr><p><i class='text-info'>Отзывы</i><p>";
		   				
		   				// формируем запрос 3 последних отзыва
		   				$sql = "SELECT * FROM review WHERE user_id='" . $_GET['id'] . "' LIMIT 5";

						// реализуем запрос
						$result = $conn->query($sql);

						// в цикле выводим результат (отзывы потребителей)
						while ($row = mysqli_fetch_assoc($result)){
							echo $row['date_time'] . "<br>";
							echo "<i class='card-text'>" . $row['reviewText'] . "</i><br><br>";
						}
		   			?>
	  		</div>
		</div>
	</div>
</div>

<?php
	// подключаем футер
	include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/futer.php";
?>