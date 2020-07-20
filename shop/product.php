<?php
include 'configs/db.php';
$page = "home";
include 'parts/header.php';


if(isset($_COOKIE["user_id_b"])) {
	$sql = "SELECT * FROM products WHERE request_id=" . $_GET['id'];
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
 } else {
 	$sql = "SELECT * FROM products WHERE id=" . $_GET['id'];
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);

	$categoryResult = $conn->query('SELECT * FROM categories WHERE id=' . $row['category_id']);
	$category = mysqli_fetch_assoc($categoryResult);
}

?>


<div class="container">
		<div class="row m-2">
			<?php
			if(isset($_COOKIE["user_id_b"])) { } else { ?>
		  			<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="/shop/">Все</a></li>
					    <li class="breadcrumb-item">
					    	<a href="cat.php?id=<?php echo $category['id']; ?> ">
					    	<?php echo $category['title']; ?>
					    	</a>
					    </li>
					    <li class="breadcrumb-item active" aria-current="page"><?php echo $row['title']; ?></li>
					  </ol>
					</nav>
			<?php } 
			?>
					<div class="col-12">
			            <div class="card border-info mb-3">
			                <div class="card-body">
			                    <h5 class="card-title text-left ml-2">
			                        <?php echo $row['title']; ?>  
			                    </h5>
			                    <div class="col-md-4">
			                        <img src="/shop/images/<?php echo $row['image']; ?>" class="card-img float-left mr-4">
			                    </div>
			                    <div>
			                        <p class="card-text"><?php echo $row['description']; ?></p>
			                        <p class="card-text"><?php echo $row['content']; ?></p>
			                        <p class="card-text">Цена: <?php echo $row['cost']; ?>грн</p>
			                    </div>
			                    <?php
			                    if(isset($_COOKIE["user_id_b"])) { } else { ?>
			                    <a href="#" class="btn btn-primary mt-3" onclick="addToFavorites(this)" data-id='<?php echo $row['id']; ?>'>В избранное</a>
								<?php } ?>
							</div> <!-- закрываем div card-body-->
						</div>  <!-- закрываем div card border-info mb-3-->
					</div> <!-- закрываем div col-12-->
<?php include 'parts/footer.php'; ?>