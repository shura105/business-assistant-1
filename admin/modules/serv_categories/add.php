<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/configs/db.php";
$page = "serv_categories";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";

if (isset($_POST["submit"])) {
	$sql = "Insert into serv_category (serv_cat_name) VALUES ('" . $_POST["serv_cat_name"] . "')";
	if ($conn->query($sql)) {
		header("Location: /admin/serv_categories.php");
	} else {
		echo "Error!";
	}
}
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item"><a href="/admin/serv_categories.php">Service categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
  </ol>
</nav>


<div class="row">
	<div class="col-md-8">
	    <div class="card">
		    <div class="card-header card-header-primary">
		      <h4 class="card-title">Add Category</h4>
		    </div>
		    <div class="card-body">
		        <form method="POST">
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">Name</label>
			              <input name="serv_cat_name" type="text" class="form-control">
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