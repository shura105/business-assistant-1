<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/configs/db.php";
$page = "serv_orders";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";

//создаём запрос на вывод данных выбранного в таблицу редактирования
$sql = "SELECT * FROM serv_orders WHERE id=" . $_GET["id"];
//посылаем запрос   
$result = $conn->query($sql);
//возвращаем выбранный из БД в виде массива элементов
$row = mysqli_fetch_assoc($result);

//если есть елик по кнопке 
if(isset($_POST['submit'])) {
    //запрос в БД на редактирование 
    $sql = "UPDATE serv_orders SET 
                status= '" . $_POST["status"] . "',
                  data_start= '" . $_POST["data_start"] . "',
                    data_stop= '" . $_POST["data_stop"] . "' 
                      WHERE serv_orders.id = '" . $_POST["id"] . "'"; 

        
        //если выполнился запрос то...
        if($conn->query($sql)) {
              //перход на главную страницу админ-панели
              header("Location: /admin/serv_orders.php");
     
        } else {
          //в ином случае выводим Ошибку
          echo "Error!";
        }
  }
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item"><a href="/admin/serv_orders.php">Service orders</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>


<div class="row">
	<div class="col-md-12">
	    <div class="card">
		    <div class="card-header card-header-primary">
		      <h4 class="card-title">Edit status</h4>
		    </div>
		    <div class="card-body">
		        <form method="POST">
		        	<div class="row">
		                <div class="col-md-12">
		                  <div class="form-group">
		                    <label class="bmd-label-floating">Status</label>
		                    <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
		                    <input name="status" value="<?php echo $row["status"] ?>" type="text" class="form-control" >
		                  </div>
		                </div>
		             </div>
		             <div class="row">
		                <div class="col-md-12">
		                  <div class="form-group">
		                    <label class="bmd-label-floating">Data start</label>
		                    <input name="data_start" value="<?php echo $row["data_start"] ?>" type="text" class="form-control" >
		                  </div>
		                </div>
		             </div>
		             <div class="row">
		                <div class="col-md-12">
		                  <div class="form-group">
		                    <label class="bmd-label-floating">Data stop</label>
		                    <input name="data_stop" value="<?php echo $row["data_stop"] ?>" type="text" class="form-control" >
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