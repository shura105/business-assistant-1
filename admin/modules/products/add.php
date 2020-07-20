<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/configs/db.php";
$page = "products";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";

if (isset($_POST["submit"])) {
	$sql = "Insert into products (title, description, content, category_id, cost, image) VALUES ('" . $_POST["title"] . "', '" . $_POST["description"] . "', '" . $_POST["content"] . "', '" . $_POST["cost"] . "', '" . $_POST["cat_id"] . "', '" . $_POST["image"] . "')";
	if ($conn->query($sql)) {
		header("Location: /admin/products.php");
	} else {
		echo "Error!";
	}
}
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item"><a href="/admin/products.php">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
  </ol>
</nav>


<div class="row">
	<div class="col-md-8">
	    <div class="card">
		    <div class="card-header card-header-primary">
		      <h4 class="card-title">Add Product</h4>
		    </div>
		    <div class="card-body">
		        <form method="POST">
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">TITLE</label>
			              <input name="title" type="text" class="form-control">
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">DESCRIPTION</label>
			              <textarea name="description" type="text" class="form-control"></textarea>
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">CONTENT</label>
			              <textarea name="content" type="text" class="form-control"></textarea>
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">COST</label>
			              <input name="cost" type="text" class="form-control">
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">IMAGE</label>
			              <input name="image" type="text" class="form-control">
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-md-12">
			              <div class="form-group">
			                <label>CATEGORY</label>
			                  <select class="form-control" name="cat_id">
			                  	<option value="0">Не выбрано</option>
			                  	<?php
			                  	    $sql = "SELECT * FROM categories";
			                  	    $result = $conn->query($sql);
			                  	    while ($row = mysqli_fetch_assoc($result)) {
			                  	    	echo "<option value='" . $row["id"] . "'>" . $row["title"] . "</option>";
			                  	    }
			                  	?>
			                  </select>
			              </div>
			          </div>
			        </div>
		        
		          <button name="submit" value="1" type="submit" class="btn btn-success pull-right">SAVE</button>
		          <div class="clearfix"></div>
		        </form>
		    </div>
	    </div>
	</div>
</div>
<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?> 