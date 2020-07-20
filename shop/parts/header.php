<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/settings.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<title><?php echo $nameSite?></title>
</head>
<body>
	<nav class="navbar navbar-expand-lg" style="border-radius: 15px; background-color:#e9ecef;">
		<?php
		if (isset($_COOKIE["user_id_b"])) {
			?>
			<a class="navbar-brand" href="/"><?php echo $nameSite?></a>
			<?php
		} else {
			?>
        	<a class="navbar-brand" href="/"><?php echo $nameSite?></a>
			<?php
		}
		?>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="border-radius: 20px; background-color: white;">
		    <ul class="navbar-nav mr-auto">
		    	<li class="nav-item <?php if($page == "home"){ ?> active <?php } ?>">
		    	<?php
				if (isset($_COOKIE["user_id_b"])) {
					?>
		        	<a class="nav-link" href="/shop/product_map.php">Подписки</a>
					<?php
				} else {
					?>
		        	<a class="nav-link" href="/shop/">Продукты</a>
					<?php
				}
				?>
				</li>
		        <li class="nav-item <?php if($page == "about"){ ?> active <?php } ?>">
		        	<a class="nav-link" href="../shop/about.php">Про нас</a>
		        </li>
		        <li class="nav-item <?php if($page == "contacts"){ ?> active <?php } ?>">
		        	<a class="nav-link" href="../shop/contacts.php">Контакты</a>
		        </li>
		    </ul>

		    <?php 
	        if (isset($_COOKIE["user_id"])) {
	        	?>
	        	<a href="favorites.php" class="btn btn-primary" id="go-favorites" style="border-radius: 30px; background-color: #36c9;">
			        Избранное
			        <span></span>
			    </a>
			    <a class="btn btn-primary ml-2" id="go-favorites" style="border-radius: 30px; background-color: #36c9;" href="../shop/account.php">Кабинет</a> 
	        	<?php
	        } else if (isset($_COOKIE["user_id_b"])) { 
	        	?> <a class="btn btn-primary" style="border-radius: 30px; background-color: #36c9;" href="../shop/account_b.php">Кабинет</a> <?php
	        } else { 
	        	?>
			    <form class="form-inline my-2 my-lg-0">
			        <a href="favorites.php" class="btn btn-primary" id="go-favorites" style="border-radius: 30px; background-color: #36c9;">
			        Избранное
			        <span></span>
			        </a>
					<a class="btn btn-primary ml-2" href="../shop/authorization.php" style="border-radius: 30px; background-color: #36c9;">Войти</a>
					<a class="btn btn-primary ml-2" href="../shop/authorization_b.php" style="border-radius: 30px; background-color: #36c9;">Войти (бизнес)</a>
			    </form>
			    <?php
			}
				?>
	    </div>
	</nav>