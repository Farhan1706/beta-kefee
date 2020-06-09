<?php
session_start();

// if(!$_SESSION['admin_username'])
// {

//     #header("Location: ../index.php");
// }

?>

<?php

	require_once 'config.php';
	
	if(isset($_GET['delete_id']))
	{
		
		$stmt_select = $DB_con->prepare('SELECT item_image FROM items WHERE item_id =:item_id');
		$stmt_select->execute(array(':item_id'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("item_images/".$imgRow['item_image']);
		
	
		$stmt_delete = $DB_con->prepare('DELETE FROM items WHERE item_id =:item_id');
		$stmt_delete->bindParam(':item_id',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: items.php");
	}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
	<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/admin.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
	<script src="js/datatables.min.js"></script>
</head>
<body>
    <div id="wrapper">
	<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#page-top">Keefe</a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto mt-0 p-1 text-uppercase">
				    <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          ADMIN
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" href="logout.php">log out</a>
			        </div>
			        </li>
                </ul>
            </div>
        </div>
	</div>
    </nav>
    <header class="masthead" style="background-image:url('assets/img/header-bg.jpg');">
        <div class="container"></div>
    </header>
        <div class="row mt-5 pt-5 mr-5">
        <div class="col-md-2 bg-dark op-4 p-5 pt-5">
			<ul class="nav flex-column ml-1 mb-5 md-3">
			  
			  <li class="nav-item">
			    <a class="nav-link text-white" href="ondex.php">Dashboard</a><hr class="bg-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" data-toggle="modal" href="#portfolioModal1">Tambah Item</a><hr class="bg-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="items.php">Kelola Item</a><hr class="bg-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="customers.php">Status Pemesanan</a><hr class="bg-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="orderdetails.php">Detail Pemesanan</a><hr class="bg-secondary">
			  </li>
			  <li class="nav-item">
			    <hr class="bg">
			  </li>
              <li class="nav-item">
			    <hr class="bg">
			  </li>
              <li class="nav-item">
			    <hr class="bg">
			  </li>
              <li class="nav-item">
			    <hr class="bg">
			  </li>
			</ul>
        </div>
    	<div class="col-md-10 p-3 pt-5 pl-5">
        <div id="page-wrapper">	
			 <div class="alert alert-danger">
                        
                          <center> <h3><strong>Item Management</strong> </h3></center>
						  
						  </div>
						  
						  <br />
						  
						  <div class="table-responsive">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Name</th>
				  <th scope="col">Harga</th>
				  <th scope="col">Info Barang</th>
				  <th scope="col">Tanggal Penambahan</th>
                  <th scope="col">Aksi</th>
                 
                </tr>
              </thead>
			  <tbody>
				  <?php
	include("config.php");
		$stmt = $DB_con->prepare('SELECT * FROM items');
		$stmt->execute();
		
		if($stmt->rowCount() > 0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				extract($row);
				
				
				?>
                <tr>
                  <td>
				<center> <img src="item_images/<?php echo $item_image; ?>" class="img img-rounded"  width="50" height="50" /></center>
				 </td>
                 <td><?php echo $item_name; ?></td>
				 <td>Rp <?php echo $item_price; ?></td>
				 <td><?php echo $item_explain; ?></td>
				 <td><?php echo $item_date; ?></td>
				 
				 <td>
				
				 
				
				 <a class="btn btn-info col" href="edititem.php?edit_id=<?php echo $row['item_id']; ?>" title="click for edit" onclick="return confirm('Are you sure edit this item?')"><span class='glyphicon glyphicon-pencil'></span> Edit Item</a> 
				
                  <a class="btn btn-danger col" href="?delete_id=<?php echo $row['item_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to remove this item?')"><span class='glyphicon glyphicon-trash'></span> Remove Item</a>
				
                  </td>
                </tr>
               
              <?php
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
		echo "<br />";	
        		echo "</div>";
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Belum Terdapat Item...
            </div>
        </div>
        <?php
	}
	
?>
<!-- Mediul Modal -->
<div class="modal fade portfolio-modal text-center" role="dialog" tabindex="-1" id="portfolioModal1">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-body">
	                <div class="container">
	                    <div class="row">
	                        <div class="col-lg-8 mx-auto">
	                            <div class="modal-body">
								<form enctype="multipart/form-data" method="post" action="additem.php">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="item_name" class="form-control" placeholder="Masukan Nama Barang">
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Harga</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="item_price" class="form-control" placeholder="Masukan Harga">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Penjelasan</label>
                                            <div class="col-sm-10">
                                            <textarea class="form-control" name="item_explain" id="exampleFormControlTextarea1" rows="3" placeholder="Penjelasan Mengenai Item Yang Ditambahkan"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                            <label for="inputEmail4">Gambar Barang</label>
                                            <input type="file" name="item_image" class="form-control-file" id="exampleFormControlFile1">
                                            </div>
                                            <div class="col">
                                            <label for="inputEmail4">Tanggal Penambahan</label>
                                            <input type="date" name="item_date" class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d'); ?>" placeholder="Tanggal Penambahan">
                                            </div>
                                        </div>           
                                      </div>
                                      <div class="modal-footer">
                                       
                                        <button class="btn btn-success btn-md" name="item_save">Save</button>
                                        
                                         <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
                                        
                                        
                                        </form>
	                            </div>    
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
   	</div>	              
        <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
      $('#example').dataTable();
    });
    </script>
          <script>
   
    $(document).ready(function() {
        $('#priceinput').keypress(function (event) {
            return isNumber(event, this)
        });
    });
  
    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&      
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }    
</script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/script.min.js"></script>
	<!-- <script src="js/jquery-3.3.1.min.js"></script> -->
	<script src="js/dataTables.bootstrap4.min.js"></script>
	<!-- <script src="js/jquery.dataTables.min.js"></script> -->
</body>
</html>
