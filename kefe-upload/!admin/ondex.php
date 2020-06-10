<?php
session_start();

// if(!$_SESSION['admin_username'])
// {

//     #header("Location: ../index.php");
// }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
</head>

<body id="page-top">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#page-top">Keefe</a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto mt-0 p-1 text-uppercase">
				    	<!-- <form class="form-inline ml-1 mt-1">
				      		<input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search">
				      		<button class="btn btn-outline-success my-2 my-sm-0 mr-3" type="submit">Search</button>
				    	</form> -->
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
    <body>
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
    	<div class="col-md-10 p-2 pt-5 ">
    		<a class="nav-link text-black mt-2" href="#" ><h3>Dashboard</h3></a><hr class="bg-secondary mt-1"></li>
            <?php
            include("db_conection.php");
            $sql    ="SELECT count(order_id) as total FROM orderdetails";
            $query    =mysqli_query($dbcon,$sql);
            while ($r=mysqli_fetch_array($query)){
                $count=$r['total'];
                $ngitung= 20 - $count;
            };

            $sqli    ="SELECT count(item_id) as jumlah FROM items";
            $querys    =mysqli_query($dbcon,$sqli);
            while ($s=mysqli_fetch_array($querys)){
                $counts=$s['jumlah'];
                };
            ?>
			<div class="row text-center">
                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">Jumlah Pesanan</h4>
                    <p class="text-muted"><?php echo $count; ?></p>
                </div>
            <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">Meja Tersedia</h4>
                    <p class="text-muted"><?php echo $ngitung; ?></p>
                </div>
			<div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">Banyak Menu</h4>
                    <p class="text-muted"><?php echo $counts; ?></p>
                </div>  
        
     </div>

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
     </body>
	              

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>